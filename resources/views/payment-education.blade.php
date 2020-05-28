@extends('layouts.app')
@section('header')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="buy-subscribe" class="buy-subscription">
                <div class="buy-form">
                    <div class="page-title">
                        <h3>Купить курс</h3>
                    </div>

                    <div class="form-group">
                        <p v-if="errors.length" style="margin-bottom: 0px !important;">
                            <b>Пожалуйста исправьте указанные ошибки:</b>
                            <ul style="color: red; padding-left: 15px; list-style: circle; text-align: left;">
                                <li v-for="error in errors">@{{ error }}</li>
                            </ul>
                        </p>
                    </div>

                    <div class="form-group">
                        <input type="text" v-model="name" class="form-control" placeholder="Ваше имя">
                    </div>

                    <div class="form-group">
                        <input type="email" v-model="email" class="form-control" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col-md-9 p-4 d-flex flex-column position-static education">
                                <h3 class="mb-0">Курс №1. Определение психотипов личности по дате рождения человека</h3>
                                <div class="mb-1 text-muted">20.04.2020</div>
                                <p class="card-text mb-auto">В результате прохождения этого курсе, у Вас будут знания о расчёте психотипа личности по дате рождения человека. Это позволит Вам правильно понимать природу человека, его мотивы, причины поступков, грамотно выстраивать взаимоотношения.</p>
                                <p class="card-text mb-auto">Это знание практично и полезно как бизнесмену, для более глубокого понимания своих сотрудников и партнёров, так и домохозяйке, для лучшего понимания своих детей и мужа.</p>
                                <br><br>
                                <strong style="font-size: 40px;" class="d-inline-block mb-2 text-success">8 220 ₸</strong>
                            </div>
                            <div class="col-md-3 d-none d-lg-block" style="background: url(https://mamaplus.md/sites/default/files/mplus_migrate/1960/54214e77b7848_54214e77b7882.jpg) no-repeat; background-size: cover">

                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="text-align: left">
                        <button @click="buyCourse()" type="button" class="btn btn-success my_btn">Купить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var buy_subscribe = new Vue({
        el: '#buy-subscribe',
        data: {
            name: '',
            email: '',
            errors: [],
        },
        methods: {
            buyCourse() {
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
                form_data.append('email', this.email);
                form_data.append('birth_date', birth_date);

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
