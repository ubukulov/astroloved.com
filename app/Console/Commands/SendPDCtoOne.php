<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Esputnik;
use Crypt;

class SendPDCtoOne extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-pdc:one {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $userId = $this->argument('user');
        $user = User::findOrFail($userId);
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
    }
}
