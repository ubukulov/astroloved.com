<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class RoboController extends BaseController
{
    public function success_payment(Request $request)
    {
        // регистрационная информация (пароль #1)
        // registration info (password #1)
        $mrh_pass1 = "astro100";

        // чтение параметров
        // read parameters
        $out_summ = $_REQUEST["OutSum"];
        $inv_id = $_REQUEST["InvId"];
        $shp_item = $_REQUEST["Shp_item"];
        $crc = $_REQUEST["SignatureValue"];

        $crc = strtoupper($crc);

        //$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item"));

        // проверка корректности подписи
        // check signature
//        if ($my_crc != $crc)
//        {
//            echo "bad sign\n";
//            exit();
//        }

        return view('robo.success', compact('inv_id'));
    }

    public function fail_payment(Request $request)
    {
        $inv_id = $_REQUEST["InvId"];
        return view('robo.fail', compact('inv_id'));
    }
}
