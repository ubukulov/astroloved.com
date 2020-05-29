<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\BaseController;
use App\Payment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Artisan;
use Illuminate\Support\Str;
use Esputnik;

class SubscriptionController extends BaseController
{
    public function buy_subscription()
    {
        return view('subscription.payment');
    }

    public function buy(Request $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $name = $data['name'];
        $tariff = $data['tariff'];

        $user = User::where(['email' => $email])->first();
        if ($user) {
            //
        } else {
            // Пользовател не найден
            $password = Str::random(6);
            $data['birth_date'] = strtotime($data['birth_date']);
            $data['password'] = bcrypt($password);
            $data['confirmation_token'] = User::generateToken();
            $data['free_count'] = 1;
            $user = User::create($data);
            if ($user) {
                $data['confirmation_link'] = route('confirm.email', ['user' => $user->id, 'token' => $user->confirmation_token]);
                Esputnik::createUserInES($user);
                Esputnik::sendEmail(2191643, $data);
            }
        }

        switch ($tariff){
            case 1:
                $sum = 990;
                $pg_description = 'Подписка: неделя';
                $tariff_plan = 'week';
                break;
            case 2:
                $sum = 2440;
                $pg_description = 'Подписка: месяц';
                $tariff_plan = 'month';
                break;
            case 3:
                $sum = 19440;
                $pg_description = 'Подписка: год';
                $tariff_plan = 'year';
                break;
            default:
                $sum = 990;
                $pg_description = 'Подписка: неделя';
                $tariff_plan = 'week';
                break;
        }

        $payment = Payment::create([
            'user_id' => $user->id, 'sum' => $sum, 'tariff' => $tariff_plan
        ]);

        $request = [
            'pg_merchant_id'=> $this->merchant_id,
            'pg_amount' => $sum,
            'pg_salt' => $this->salt,
            'pg_order_id' => $payment->id,
            'pg_description' => $pg_description,
            'pg_success_url' => env('APP_URL').'/buy-subscription-success',
            'pg_failure_url' => env('APP_URL').'/buy-subscription-error',
        ];

        $request['pg_testing_mode'] = 1; //add this parameter to request for testing payments

        //if you pass any of your parameters, which you want to get back after the payment, then add them. For example:
        $request['client_name'] = $name;
        $request['client_email'] = $email;
        // $request['client_address'] = 'Earth Planet';

        //generate a signature and add it to the array
        ksort($request); //sort alphabetically
        array_unshift($request, 'payment.php');
        array_push($request, $this->salt); //add your secret key (you can take it in your personal cabinet on paybox system)


        $request['pg_sig'] = md5(implode(';', $request));

        unset($request[0], $request[1]);

        $query = http_build_query($request);

        //redirect a customer to payment page
//        header('Location:https://api.paybox.money/payment.php?'.$query);
//        exit();
        $pay_url = 'https://api.paybox.money/payment.php?'.$query;
        return response($pay_url);
    }

    public function buy_success(Request $request)
    {
        $previous_url = $request->session()->previousUrl();
        $current_url  = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $arr = $request->query();
        if (isset($arr['pg_order_id']) && isset($arr['pg_payment_id']) && isset($arr['pg_salt']) && isset($arr['pg_sig'])) {
            $pg_order_id = $arr['pg_order_id'];
            $pg_payment_id = $arr['pg_payment_id'];
            $pg_salt = $arr['pg_salt'];
            $pg_sig = $arr['pg_sig'];
            $payment = Payment::findOrFail($pg_order_id);
            $today = Carbon::now();
            switch ($payment->tariff) {
                case 'week':
                    $actived_at = $today->addWeek();
                    $period = 'недели';
                    break;
                case 'month':
                    $actived_at = $today->addMonth();
                    $period = 'месяца';
                    break;
                case 'year':
                    $actived_at = $today->addYear();
                    $period = 'года';
                    break;
            }
            $payment->update([
                'pg_payment_id' => $pg_payment_id, 'pg_salt' => $pg_salt, 'pg_sig' => $pg_sig, 'status' => 'paid', 'actived_at' => $actived_at
            ]);

            Artisan::call('send-pdc:one', [
                'user' => $payment->user_id
            ]);
        } else {
            $period = 'месяца';
        }
        return view('subscription.payment-success', compact('period'));
    }

    public function buy_error()
    {
        dd("Ошибка при оплате");
    }
}
