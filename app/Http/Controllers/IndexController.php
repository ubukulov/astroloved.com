<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Esputnik;
use Crypt;
use Location;
use Artisan;

class IndexController extends BaseController
{
    public function welcome()
    {
		//$payments = Payment::where(['status' => 'paid'])->where('actived_at', '>=', Carbon::now())->get();
		//dd($payments);
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

            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['number'] = 'первый';
            $data['date'] = date('d.m.Y');
            $signature = Crypt::encrypt($user->id);
            $data['buy_subscription_link'] = route('buy.subscription')."?signature=".$signature;
            $data['buy_course_link'] = route('show.course')."?signature=".$signature;
            $data['buy_consultation_link'] = route('show.consultation')."?signature=".$signature;

            if ($user->round == 18) {
                $user->round = 1;
            } else {
                $user->round++;
            }
            $user->save();

            $pdc_Number = Esputnik::getPDCNumber($user->birth_date);
            $pdc = Esputnik::value_lists($pdc_Number, $user);
            $data['pdc'] = $pdc;

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

    public function my_ip()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $position = Location::get($ip);
        dd($position);
    }
	
	public function send_me_pdc($user_id)
	{
		$user = User::findOrFail($user_id);
		Esputnik::createUserInES($user);
		Artisan::call('send-pdc:one', [
			'user' => $user_id
		]);
		echo "Ok";
	}

    public function es_create_user()
    {
        return view('user.create');
    }

    public function es_store_user(Request $request)
    {
        $data = $request->all();
        $data['birth_date'] = strtotime($data['birth_date']);
        $data['confirmation_token'] = User::generateToken();
        $data['free_count'] = 1;
        if (User::exists($data['email'])) {
            $user = User::create($data);
            if ($user) {
                $data['confirmation_link'] = route('confirm.email', ['user' => $user->id, 'token' => $user->confirmation_token]);
                Esputnik::createUserInES($user, "30-дневные подписчики");
                Esputnik::sendEmail(2191643, $data);

                Artisan::call('send-pdc:one', [
                    'user' => $user->id
                ]);

                Payment::create([
                    'user_id' => $user->id, 'sum' => 0, 'tariff' => 'free', 'status' => 'paid', 'actived_at' => Carbon::now()->addMonth()
                ]);

                return view('user.create', ['info' => 'Пользователь успешно зарегистрирован']);
            }
        }
    }
	
	public function send_pdc_to_one($user_id)
    {
        $user = User::findOrFail($user_id);
        Esputnik::createUserInES($user);
        Artisan::call('send-pdc:one', [
            'user' => $user_id
        ]);
    }
}
