@extends('layouts.app')
@section('header')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="buy-subscribe" class="buy-subscription">
                    <div class="buy-form">
                        <h2>Благодарим Вас за оплату!</h2>
                        <br>
                        <p>Теперь в течении {{ $period }}, ежедневно, Вы будете получать на свой email персональный астропрогноз, согласно ведической мудрости Джойтиш.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
