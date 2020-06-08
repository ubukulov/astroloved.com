@extends('layouts.dop')
@section('content')
    <section class="text-center" id="b1">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img width="80px" src="/img/log.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Главная</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('show.consultation') }}">Консультация астролога</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('show.course') }}">Пройти обучение</a></li>
                    <li class="nav-item"><a class="nav-link" href="#buy-foot">Контакты</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Персональный астропрогноз на каждый день от ведического астролога</h4>
                    <p>Проверьте, насколько точными и полезными окажутся для Вас эти прогнозы! Пробный период <span>3 ДНЯ БЕСПЛАТНО!</span></p>
                    <div class="vidos">
                        <video width="100%" @if(!$agent->isMobile()) height="480" @endif autoplay preload="none" controls controlsList="nodownload">
                            <source src="https://astroloved.s3.eu-central-1.amazonaws.com/astroloved.com/videos/pres_subs.mp4" type="video/mp4">
                        </video>
                    </div>
                    <button id="besplat" type="button" data-toggle="modal" data-target="#subscribeModal" class="btn btn-pink rounded-pill xpp_btn">Получать астропрогноз</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_buttons')
    <div class="col-md">
        <div class="menushka">
            <h5>МЕНЮ</h5>
            <p><a href="{{ route('home') }}">Главная</a></p>
            <p><a href="{{ route('show.consultation') }}">Консультация астролога</a></p>
            <p><a href="{{ route('show.course') }}">Пройти обучение</a></p>
            <p><a href="#buy-foot">Контакты</a></p>
        </div>
    </div>
    <div class="col-md">
        <div class="cont">
            <img class="footer-logo" src="/img/log.png" alt="Astroloded"> <br>
            <!--
            <a href="#"><img width="20px" src="img/whats.png" alt=""></a>
            <a href="#"><img width="20px" src="img/inst.png" alt=""></a> <br>
            <span>admin@astroloved.com</span> <br><br>
-->
            <a class="buttons-footers rounded-pill" href="{{ route('show.consultation') }}">Консультация астролога</a> <br>
            <a class="buttons-footers rounded-pill buy-cursov-gold" href="{{ route('show.course') }}">Пройти обучение</a>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    var buy_subscribe = new Vue({
        el: '#subscribePayModal',
        data: {
            name: '',
            email: '',
            errors: [],
        },
        methods: {
            buySubscribe(type) {
                this.errors = [];

                let birth_date = $("#birth_date").val();

                if (!this.name) {
                    this.errors.push('Укажите имя.');
                }

                if (!this.email) {
                    this.errors.push('Укажите электронную почту.');
                } else if(!this.validEmail(this.email)){
                    this.errors.push('Укажите корректный адрес электронной почты.');
                }

                if (!birth_date) {
                    this.errors.push('Укажите дату рождения.');
                }

                let form_data = new FormData();
                form_data.append('name', this.name);
                form_data.append('tariff', type);
                form_data.append('email', this.email);
                form_data.append('birth_date', birth_date);

                if (this.errors.length == 0) {
                    axios.post('/buy-subscription', form_data)
                        .then(res => {
                            window.location = res.data;
                        })
                        .catch(err => {
                            console.log(err)
                        })
                }
            },
            validEmail: function (email) {
                var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
        }
    })
</script>
@endpush
