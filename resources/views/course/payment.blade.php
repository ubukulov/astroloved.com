@extends('layouts.dop')
@section('content')
    <section class="text-center" id="b1">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4>Курс №1. Определение Психотипов Личности По Дате Рождения Человека</h4>
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

@endsection
@push('scripts')
    <script>
        var buy_course = new Vue({
            el: '#educationModal',
            data: {
                name: "{!! $user->name !!}",
                email: "{!! $user->email !!}",
            },
            methods: {
                buyCourse() {
                    let form_data = new FormData();
                    form_data.append('name', this.name);
                    form_data.append('email', this.email);

                    axios.post('/buy-course', form_data)
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
