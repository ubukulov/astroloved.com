@extends('layouts.dop')
@section('meta')
    @parent
    <meta name="description" content="Личная консультация с ведическим астрологом!">
    <meta name="keywords" content="ведическая астрология, астрология, астролог, астрологическая карта, астролог консультация,  джойтиш, гороскоп, знаки зодиака, гороскоп на сегодня">
@endsection
@section('content')
    <section class="text-center" id="b1">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Личная консультация с ведическим астрологом</h4>

                    <div class="vidos">
                        <video width="100%" @if(!$agent->isMobile()) height="480" @endif autoplay preload="none" controls controlsList="nodownload">
                            <source src="https://astroloved.s3.eu-central-1.amazonaws.com/astroloved.com/videos/pre_con.mp4" type="video/mp4">
                        </video>
                    </div>
                    <button type="button" data-toggle="modal" data-target="#consultationModal" class="btn btn-violet rounded-pill zk_btn">Заказать консультацию</button>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_buttons')

@endsection
@push('scripts')
    <script>
        var buy_consultation = new Vue({
            el: '#consultationModal',
            data: {
                name: "{!! $user->name !!}",
                phone: "{!! $user->phone !!}",
                email: "{!! $user->email !!}",
                promocode: '',
                errors: []
            },
            methods: {
                buyConsultation(type) {
                	if (!this.phone) {
	                    this.errors.push('Укажите телефон.');
	                }
                    let form_data = new FormData();
                    form_data.append('name', this.name);
                    form_data.append('phone', this.phone);
                    form_data.append('email', this.email);
                    form_data.append('tariff', type);
                    form_data.append('promocode', this.promocode);

                    axios.post('/buy-consultation', form_data)
                        .then(res => {
                            window.location = res.data;
                        })
                        .catch(err => {
                            console.log(err)
                        })
                },
                validEmail: function (email) {
                    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(email);
                }
            }
        })
    </script>
@endpush
