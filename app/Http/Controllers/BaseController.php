<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use View;

class BaseController extends Controller
{
    protected $test_salt = 'mxEHsmDZVZWrKxzl';
    protected $test_merchant_id = 528885;

    protected $salt = 'iuhOCUeFlO23qLRp';
    protected $merchant_id = 529350;

    public function __construct()
    {
        $agent = new Agent();
        View::share('agent', $agent);
    }
}
