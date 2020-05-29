<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class ConsultationController extends BaseController
{
    public function show_consultation()
    {
        return view('consultation.payment');
    }

    public function buy_consultation(Request $request)
    {

    }

    public function buy_consultation_success()
    {
        return view('consultation.payment-success');
    }
}
