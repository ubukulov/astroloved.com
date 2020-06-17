@extends('layouts.dop')
@section('meta')
    @parent
    <meta name="description" content="Курс №1. Определение Психотипов Личности По Дате Рождения Человека">
    <meta name="keywords" content="ведическая астрология, астрология, астролог, астрологическая карта, астролог консультация,  джойтиш, школы астрологии, астрология обучение, обучение астрологии, как стать астрологом, курсы астрологии, ведическая астрология обучение, обучение астрологии онлайн, курсы по астрологии, обучение ведической астрологии, курс астрологии, курсы астрологии онлайн, астропсихология обучение, обучение на астролога, астрология курсы">
@endsection
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('buy.subscription') }}">Астопрогнозы</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('show.consultation') }}">Консультация астролога</a></li>
                    <li class="nav-item"><a class="nav-link" href="#buy-foot">Контакты</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Курс №1. Ведическая астрология. Определение Психотипов Личности По Дате Рождения Человека</h4>
                    <h5>Из серии курсов "Сам себе астролог"</h5>
                    <div class="vidos">
                        <video width="100%" @if(!$agent->isMobile()) height="480" @endif autoplay preload="none" controls controlsList="nodownload">
                            <source src="https://astroloved.s3.eu-central-1.amazonaws.com/astroloved.com/videos/pre_course.mp4" type="video/mp4">
                        </video>
                    </div>
                    <button type="button" data-toggle="modal" data-target="#educationModal" class="btn buy-cursov-gold rounded-pill po_btn">Пройти обучение</button>
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
            <p><a href="{{ route('buy.subscription') }}">Астопрогнозы</a></p>
            <p><a href="{{ route('show.consultation') }}">Консультация астролога</a></p>
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
            <a class="buttons-footers rounded-pill roz" href="{{ route('buy.subscription') }}">Получать астропрогнозы</a> <br>
            <a class="buttons-footers rounded-pill" href="{{ route('show.consultation') }}">Консультация астролога</a>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var buy_course = new Vue({
            el: '#educationModal',
            data: {
                name: '',
                email: '',
                errors: [],
            },
            methods: {
                buyCourse() {
                    this.errors = [];

                    if (!this.name) {
                        this.errors.push('Укажите имя.');
                    }

                    if (!this.email) {
                        this.errors.push('Укажите электронную почту.');
                    } else if(!this.validEmail(this.email)){
                        this.errors.push('Укажите корректный адрес электронной почты.');
                    }

                    let form_data = new FormData();
                    form_data.append('name', this.name);
                    form_data.append('email', this.email);

                    if (this.errors.length == 0) {
                        axios.post('/buy-course', form_data)
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
