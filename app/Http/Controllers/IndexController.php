<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Esputnik;
use Crypt;

class IndexController extends BaseController
{
    public function welcome()
    {
        return view('welcome');
    }

    public function subscribe(Request $request)
    {
        $data = $request->all();
        $password = Str::random(6);
        $data['birth_date'] = strtotime($data['birth_date']);
        $data['password'] = bcrypt($password);
        $data['confirmation_token'] = User::generateToken();
        $data['free_count'] = 1;
        if (User::exists($data['email'])) {
            $user = User::create($data);
            if ($user) {
                $data['confirmation_link'] = route('confirm.email', ['user' => $user->id, 'token' => $user->confirmation_token]);
                Esputnik::createUserInES($user);
                Esputnik::sendEmail(2191643, $data);
                return response("На Ваш почтовый ящик отправлено сообщение, содержащее ссылку для подтверждения правильности e-mail адреса. Пожалуйста, перейдите по ссылке для завершения подписки.");
            } else {
                return response('Ошибка! Не переживайте это со стороны сервера :(');
            }
        } else {
            $user = User::where(['email' => $data['email']])->first();
            $signature = Crypt::encrypt($user->id);
            $hash = Crypt::encrypt(Carbon::now());
            return response("Такой пользователь уже зарегистрирован. <a href=\"/buy-subscription?signature=$signature&exist_user=$hash\">Посмотрите наши тарифы</a>");
        }
    }

    public function confirm($user_id, $token) {
        $user = User::findOrFail($user_id);
        if ($user->confirm($token)) {
            $pdc_Number = Esputnik::getPDCNumber($user->birth_date);
            $pdc = Esputnik::value_lists($pdc_Number);
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['pdc'] = $pdc;
            $data['number'] = 'первый';
            $data['date'] = date('d.m.Y');
            $signature = Crypt::encrypt($user->id);
            $data['buy_subscription_link'] = route('buy.subscription')."?signature=".$signature;
            $data['buy_course_link'] = route('show.course')."?signature=".$signature;
            $data['buy_consultation_link'] = route('show.consultation')."?signature=".$signature;
            Esputnik::sendEmail(2188363, $data, 2);
            $message = 'Вы успешно подтвердили свой адрес электронной почты.';
        } else {
            $message = 'Ваш адрес электронной почты уже подтвержден или неверный токен подтверждения.';
        }

        return redirect()->route('confirmation')->withMessage($message);
    }

    public function confirmation()
    {
        return view('email.confirmation');
    }
}
