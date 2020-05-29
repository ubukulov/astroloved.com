<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class CourseController extends BaseController
{
    public function show_course()
    {
        return view('course.payment');
    }

    public function buy_course(Request $request)
    {
        $data = $request->all();
        $user = User::where(['email' => $data['email']])->first();
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
//                Esputnik::createUserInES($user);
//                Esputnik::sendEmail(2191643, $data);
            }
        }

        $payment = Payment::create([
            'user_id' => $user->id, 'sum' => 8220
        ]);
        $request = [
            'pg_merchant_id'=> $this->merchant_id,
            'pg_amount' => 8220,
            'pg_salt' => $this->salt,
            'pg_order_id' => $payment->id,
            'pg_description' => 'Приобрести курс',
            'pg_success_url' => env('APP_URL').'/buy-subscription-success',
            'pg_failure_url' => env('APP_URL').'/buy-subscription-error',
        ];

        $request['pg_testing_mode'] = 1; //add this parameter to request for testing payments

        //if you pass any of your parameters, which you want to get back after the payment, then add them. For example:
        $request['client_name'] = $data['name'];
        $request['client_email'] = $data['email'];
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

    public function buy_course_success()
    {
        return view('course.payment-success');
    }
}
