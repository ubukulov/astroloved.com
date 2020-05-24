@extends('layouts.app')
@section('header')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="buy-subscribe" class="buy-subscription">
                <div class="buy-form">
                    <div class="page-title">
                        <h3>Купить подписку</h3>
                    </div>

                    <p v-if="errors.length" style="margin-bottom: 0px !important;">
                        <b>Пожалуйста исправьте указанные ошибки:</b>
                        <ul style="color: red; padding-left: 15px; list-style: circle; text-align: left;">
                            <li v-for="error in errors">@{{ error }}</li>
                        </ul>
                    </p>

                    <div class="form-group">
                        <input type="text" v-model="name" class="form-control" placeholder="Ваше имя">
                    </div>

                    <div class="form-group">
                        <input type="email" v-model="email" class="form-control" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <input type="text" id="birth_date" value placeholder="День рождения" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="container">
                            <div class="card-deck mb-3 text-center">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header">
                                        <h4 class="my-0 font-weight-normal">Неделя</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">990 &#8376;</h1>
                                        <button @click="buySubscribe(1)" type="button" class="btn btn-lg btn-block btn-success my_btn">Купить</button>
                                    </div>
                                </div>
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header">
                                        <h4 class="my-0 font-weight-normal">Месяц</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">2 440 &#8376;</h1>
                                        <button @click="buySubscribe(2)" type="button" class="btn btn-lg btn-block btn-success my_btn">Купить</button>
                                    </div>
                                </div>
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header">
                                        <h4 class="my-0 font-weight-normal">Год</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">19 440 &#8376;</h1>
                                        <button @click="buySubscribe(3)" type="button" class="btn btn-lg btn-block btn-success my_btn">Купить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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