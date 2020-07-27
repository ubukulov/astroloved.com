<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends BaseController
{
    public function subscription(Request $request)
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
}
