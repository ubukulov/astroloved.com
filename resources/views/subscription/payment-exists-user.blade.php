@extends('layouts.dop')
@section('content')
    <section class="text-center" id="b1">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Персональный астропрогноз на каждый день от ведического астролога</h4>
                    <div class="vidos">
                        <video width="100%" height="480" autoplay preload="none" controls controlsList="nodownload">
                            <source src="https://astroloved.s3.eu-central-1.amazonaws.com/astroloved.com/videos/pre_subs_buy.mp4" type="video/mp4">
                        </video>
                    </div>

                    <div id="exist_user" class="form-group">
                        <h3>Наши Тарифы</h3>
                        <div class="card-deck mb-3 text-center">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">Неделя</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title">990 &#8376;</h1>
                                    <button @click="buySubscribe(1)" type="button" class="btn btn-pink rounded-pill xpp_btn">Купить</button>
                                </div>
                            </div>
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">Месяц</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title">2 440 &#8376;</h1>
                                    <button @click="buySubscribe(2)" type="button" class="btn btn-pink rounded-pill xpp_btn">Купить</button>
                                </div>
                            </div>
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-normal">Год</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title">19 440 &#8376;</h1>
                                    <button @click="buySubscribe(3)" type="button" class="btn btn-pink rounded-pill xpp_btn">Купить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .card-header h4 {
            color: #000;
        }
        .card-body {
            color: #000;
        }
    </style>
@endsection

@section('footer_buttons')

@endsection

@push('scripts')
<script>
    var buy_subscribe = new Vue({
        el: '#exist_user',
        data: {
            name: "{!! $user->name !!}",
            email: "{!! $user->email !!}"
        },
        methods: {
            buySubscribe(type) {
                let form_data = new FormData();
                form_data.append('name', this.name);
                form_data.append('tariff', type);
                form_data.append('email', this.email);

                axios.post('/buy-subscription', form_data)
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
        },
        created(){
            console.log(this.name)
            console.log(this.email)
        }
    })
</script>
@endpush
