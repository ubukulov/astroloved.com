<?php

namespace App\Http\Controllers\Payment;

use App\Payment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;
use Artisan;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class ConsultationController extends BaseController
{
    public function show_consultation(Request $request)
    {
        if ($request->exists('signature') && !empty($request->input('signature'))) {
            $signature = $request->input('signature');
            try {
                $user_id = Crypt::decrypt($signature);
                $user = User::find($user_id);
                if ($user) {
                    return view('consultation.payment', compact('user'));
                } else {
                    return view('consultation.payment-new');
                }
            } catch (DecryptException $decryptException) {
                return view('consultation.payment-new');
            }
        } else {
            return view('consultation.payment-new');
        }
    }

    public function buy_consultation(Request $request)
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
            $data['free_count'] = 0;
            $user = User::create($data);
            if ($user) {
                $data['confirmation_link'] = route('confirm.email', ['user' => $user->id, 'token' => $user->confirmation_token]);
                Esputnik::createUserInES($user);
                Esputnik::sendEmail(2191643, $data);
            }
        }

        switch ($tariff){
            case 1:
                $sum = 38212;
                $pg_description = 'Покупка консультацию за 1 час';
                break;
            case 2:
                $sum = 64960;
                $pg_description = 'Покупка консультацию за 2 час';
                break;
            default:
                $sum = 38212;
                $pg_description = 'Покупка консультацию за 1 час';
                break;
        }

        $payment = Payment::create([
            'user_id' => $user->id, 'sum' => $sum, 'tariff' => 'consul'
        ]);

        $request = [
            'pg_merchant_id'=> $this->merchant_id,
            'pg_amount' => $sum,
            'pg_salt' => $this->salt,
            'pg_order_id' => $payment->id,
            'pg_description' => $pg_description,
            'pg_success_url' => env('APP_URL').'/buy-consultation-success',
            'pg_failure_url' => env('APP_URL').'/buy-consultation-error',
        ];

        //$request['pg_testing_mode'] = 1; //add this parameter to request for testing payments

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

    public function buy_consultation_success(Request $request)
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

            $payment->update([
                'pg_payment_id' => $pg_payment_id, 'pg_salt' => $pg_salt, 'pg_sig' => $pg_sig, 'status' => 'paid'
            ]);

            switch ($payment->sum){
                case 38212:
                    $route_name = 'consul.one';
                    break;
                case 64960:
                    $route_name = 'consul.two';
                    break;
                default:
                    $route_name = 'consul.one';
                    break;
            }

            return redirect()->route($route_name);
        }
    }

    public function buy_error()
    {
        dd("Ошибка при оплате");
    }

    public function consul_one()
    {
        return view('consultation.payment-success1');
    }

    public function consul_two()
    {
        return view('consultation.payment-success2');
    }
}
