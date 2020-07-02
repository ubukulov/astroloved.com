<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Esputnik;
use Crypt;

class FreePDC extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'free:pdc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Бесплатно получить ПДС в течение 3-х дней';

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
        User::chunk(10, function($users) {
            foreach($users as $user) {
                if($user->free_count < 3 && !empty($user->email_verified_at)) {
                    $data = [];
                    $signature = Crypt::encrypt($user->id);
                    $data['name'] = $user->name;
                    $data['email'] = $user->email;
                    $data['buy_subscription_link'] = route('buy.subscription')."?signature=".$signature;
                    $data['buy_course_link'] = route('show.course')."?signature=".$signature;
                    $data['buy_consultation_link'] = route('show.consultation')."?signature=".$signature;
                    $user->free_count++;

                    if ($user->round == 18) {
                        $user->round = 1;
                    } else {
                        $user->round++;
                    }
                    $user->save();

                    $data['number'] = ($user->free_count == 2) ? 'второй' : 'третий';
                    $pdc_Number = Esputnik::getPDCNumber($user->birth_date);
                    $pdc = Esputnik::value_lists($pdc_Number, $user);
                    $data['pdc'] = $pdc;
                    Esputnik::sendEmail(2188363, $data, 2);
                }
            }
        });
    }
}
