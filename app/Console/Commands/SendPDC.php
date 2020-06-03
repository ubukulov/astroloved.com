<?php

namespace App\Console\Commands;

use App\Payment;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Esputnik;
use Crypt;

class SendPDC extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:pdc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'После того как клиенты покупает подписку, мы начинаем каждый день отправлять на почту ПДС';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $payments = Payment::where(['status' => 'paid'])->where('actived_at', '>=', Carbon::now())->get();
        foreach ($payments as $payment) {
            $user = $payment->user;
            $pdc_Number = Esputnik::getPDCNumber($user->birth_date);
            $pdc = Esputnik::value_lists($pdc_Number);
            $data = [];
            $signature = Crypt::encrypt($user->id);
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['pdc'] = $pdc;
            $data['buy_subscription_link'] = route('buy.subscription')."?signature=".$signature;
            $data['buy_course_link'] = route('show.course')."?signature=".$signature;
            $data['buy_consultation_link'] = route('show.consultation')."?signature=".$signature;

            Esputnik::sendEmail(2221563, $data, 3);

            // TODO : реализовать отправку последное письмо с ссылкой на оплаты
//            if ($user->free_count == 3) {
//                Esputnik::sendEmail(2193601, $data, 2); // письмо с оплатой
//            } else {
//                Esputnik::sendEmail(2188363, $data, 2);
//            }
        }
    }
}
