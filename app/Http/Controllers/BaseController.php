<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use View;

class BaseController extends Controller
{
    public function __construct()
    {
        $agent = new Agent();
        View::share('agent', $agent);
    }
}
