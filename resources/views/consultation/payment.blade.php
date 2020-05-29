@extends('layouts.app')
@section('header')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <section class="text-center" id="b1">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h4>Личная консультация с ведическим астрологом</h4>

                            <div class="vidos">
                                <iframe width="100%" height="480" src="https://www.youtube.com/embed/9bpt0R7VmvE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <button type="button" data-toggle="modal" data-target="#consultationModal" class="btn btn-violet rounded-pill">Заказать консультацию</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
