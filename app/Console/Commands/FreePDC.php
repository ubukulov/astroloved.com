<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Esputnik;

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
                if($user->free_count < 3) {
                    $pdc_Number = Esputnik::getPDCNumber($user->birth_date);
                    $pdc = Esputnik::value_lists($pdc_Number);
                    $data = [];
                    $data['name'] = $user->name;
                    $data['email'] = $user->email;
                    $data['pdc'] = $pdc;
                    $data['buy_link'] = route('buy.subscription');
                    $user->free_count++;
                    $user->save();
                    if ($user->free_count == 3) {
                        Esputnik::sendEmail(2193601, $data, 2); // письмо с оплатой
                    } else {
                        Esputnik::sendEmail(2188363, $data, 2);
                    }
                }
            }
        });
    }
}
