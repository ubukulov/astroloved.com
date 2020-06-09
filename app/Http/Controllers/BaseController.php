<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use View;
use Location;

class BaseController extends Controller
{
    protected $test_salt = 'mxEHsmDZVZWrKxzl';
    protected $test_merchant_id = 528885;

    protected $salt = 'iuhOCUeFlO23qLRp';
    protected $merchant_id = 529350;

    public function __construct()
    {
        $agent = new Agent();
        $ip = $_SERVER['REMOTE_ADDR'];
        $position = Location::get($ip);
        if (!$position) {
            $location = 'KZ';
        } else {
            $location = $position->countryCode;
        }
        switch ($location) {
            case "KZ":
                $price_week = "990 &#8376;";
                $price_month = "2 440 &#8376;";
                $price_year = "19 440 &#8376;";
                $price_ak1 = "38 212 &#8376;";
                $price_ak2 = "64 960 &#8376;";
                $price_course = "8 220 &#8376;";
                break;

            case "RU":
                $price_week = "168 &#8381;";
                $price_month = "420 &#8381;";
                $price_year = "3 369 &#8381;";
                $price_ak1 = "6 494 &#8381;";
                $price_ak2 = "11 063 &#8381;";
                $price_course = "1 399 &#8381;";
                break;

            case "UA":
                $price_week = "65 &#8372;";
                $price_month = "153 &#8372;";
                $price_year = "1 221 &#8372;";
                $price_ak1 = "2 512 &#8372;";
                $price_ak2 = "4 273 &#8372;";
                $price_course = "541 &#8372;";
                break;

            default:
                $price_week = "990 &#8376;";
                $price_month = "2 440 &#8376;";
                $price_year = "19 440 &#8376;";
                $price_ak1 = "38 212 &#8376;";
                $price_ak2 = "64 960 &#8376;";
                $price_course = "8 220 &#8376;";
                break;
        }
        View::share('agent', $agent);
        View::share('price_week', $price_week);
        View::share('price_month', $price_month);
        View::share('price_year', $price_year);
        View::share('price_ak1', $price_ak1);
        View::share('price_ak2', $price_ak2);
        View::share('price_course', $price_course);
    }
}
