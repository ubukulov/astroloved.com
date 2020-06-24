<!-- subscribeModal -->
<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered subscribeModal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if($agent->isMobile())
                    <h5 style="color: #1a1a1a; text-transform: uppercase;" class="modal-title" id="exampleModalLabel">Хочу получать прогнозы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="font-size: 30px;" aria-hidden="true">&times;</span>
                    </button>
                @else
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 style="color: #1a1a1a; text-transform: uppercase;" class="modal-title" id="exampleModalLabel">Хочу получать прогнозы</h5>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span style="font-size: 30px;" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-body">
                <p v-if="errors.length" style="margin-bottom: 0px !important;">
                    <b>Пожалуйста исправьте указанные ошибки:</b>
                <ul style="color: red; padding-left: 15px; list-style: circle; text-align: left;">
                    <li v-for="error in errors">@{{ error }}</li>
                </ul>
                </p>

                <div class="form-group">
                    <input type="text" placeholder="Ваше имя" v-model="name" class="form-control">
                </div>

                <div class="form-group">
                    <input type="email" placeholder="Ваш Email" v-model="email" class="form-control">
                </div>

                <div class="form-group" style="margin-bottom: 0px;">
                    <input @if($agent->isSafari()) type="date" @else type="text" @endif id="birth_date" placeholder="День рождения" class="form-control" value="MM.DD.YY">
                </div>

                <div v-if="information" v-html="information" id="alert" class="alert alert-success fade show">

                </div>
            </div>
            <div class="modal-footer" style="padding-top: 0px;">
                <button id="subscribe_btn" type="button" @click="subscribeUser()" class="btn btn-pink rounded-pill xpp_btn">Подписаться сейчас</button>
            </div>
        </div>
    </div>
</div>

<!-- consultationModal -->
<div class="modal fade" id="consultationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered consultationModal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if($agent->isMobile())
                    <h5 style="color: #1a1a1a; text-transform: uppercase;" class="modal-title" id="exampleModalLabel">Консультация астролога</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="font-size: 30px;" aria-hidden="true">&times;</span>
                    </button>
                @else
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 style="color: #1a1a1a; text-transform: uppercase;" class="modal-title" id="exampleModalLabel">Консультация астролога</h5>
                            </div>

                            <div class="col-md-4">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span style="font-size: 30px;" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-body">
                <div class="container">
                		<p v-if="errors.length" style="margin-bottom: 0px !important;">
		                    <b style="color: #000;">Пожалуйста исправьте указанные ошибки:</b>
			                <ul style="color: red; padding-left: 15px; list-style: circle; text-align: left;">
			                    <li v-for="error in errors">@{{ error }}</li>
			                </ul>
		                </p>
                    @if(!isset($user))
                        <p style="color: #000;">Для заказа консультации, пожалуйста заполните поля ввода данных и сделайте заказ. После оплаты я свяжусь с вами и мы уточним время и дату консультации.</p>

                        <div class="form-group">
                            <input type="text" placeholder="Ваше имя" v-model="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="Ваш телефон" v-model="phone" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="email" placeholder="Ваш Email" v-model="email" class="form-control">
                        </div>
                    @else
                        <div class="form-group">
                            <input type="text" placeholder="Ваш телефон" v-model="phone" class="form-control">
                        </div>
                    @endif

                    <div class="card-deck mb-3 text-center">

                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Консультация за 1 час</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">{!! $price_ak1 !!}</h1>
                                <ul class="mt-3 mb-4">
                                    <li>10% скидка для подписчика астрологических прогнозов на неделю</li>
                                    <li>25% скидка для подписчика астрологических прогнозов на месяц</li>
                                    <li>60% скидка для подписчика астрологических прогнозов на год</li>
                                </ul>
                                <button type="button" @click="buyConsultation(1)" class="btn btn-violet rounded-pill zk_btn">Заказать</button>
                            </div>
                        </div>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Консультация за 2 часа</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">{!! $price_ak2 !!}</h1>
                                <ul class="mt-3 mb-4">
                                    <li>10% скидка для подписчика астрологических прогнозов на неделю</li>
                                    <li>25% скидка для подписчика астрологических прогнозов на месяц</li>
                                    <li>60% скидка для подписчика астрологических прогнозов на год</li>
                                </ul>
                                <button type="button" @click="buyConsultation(2)" class="btn btn-violet rounded-pill zk_btn">Заказать</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- educationModal -->
<div class="modal fade" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered educationModal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if($agent->isMobile())
                    <h5 style="color: #1a1a1a; text-transform: uppercase;" class="modal-title" id="exampleModalLabel">Обучение на астролога</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="font-size: 30px;" aria-hidden="true">&times;</span>
                    </button>
                @else
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 style="color: #1a1a1a; text-transform: uppercase;" class="modal-title" id="exampleModalLabel">Обучение на астролога</h5>
                            </div>

                            <div class="col-md-4">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span style="font-size: 30px;" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-body">
                @if(!isset($user))
                	<p v-if="errors.length" style="margin-bottom: 0px !important;">
	                    <b>Пожалуйста исправьте указанные ошибки:</b>
		                <ul style="color: red; padding-left: 15px; list-style: circle; text-align: left;">
		                    <li v-for="error in errors">@{{ error }}</li>
		                </ul>
	                </p>

                    <div class="form-group">
                        <input type="text" placeholder="Ваше имя" v-model="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="email" placeholder="Ваш Email" v-model="email" class="form-control">
                    </div>

                @endif

                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-md-9 p-4 d-flex flex-column position-static">
                        <h3 class="mb-0" style="text-transform: initial;">Курс №1. Определение психотипов личности по дате рождения человека</h3>
                        <div class="mb-1 text-muted">20.04.2020</div>
                        <p class="card-text mb-auto">В результате прохождения этого курсе, у Вас будут знания о расчёте психотипа личности по дате рождения человека. Это позволит Вам правильно понимать природу человека, его мотивы, причины поступков, грамотно выстраивать взаимоотношения.</p>
                        <p class="card-text mb-auto">Это знание практично и полезно как бизнесмену, для более глубокого понимания своих сотрудников и партнёров, так и домохозяйке, для лучшего понимания своих детей и мужа.</p>
                        <br><br>
                        <strong style="font-size: 40px;" class="d-inline-block mb-2 text-success">{!! $price_course !!}</strong>
                    </div>
                    <div class="col-md-3 d-none d-lg-block" style="background: url(https://mamaplus.md/sites/default/files/mplus_migrate/1960/54214e77b7848_54214e77b7882.jpg) no-repeat; background-size: cover">

                    </div>
                </div>
            </div>

            <div class="modal-footer" style="justify-content: flex-start">
                <button id="subscribe_btn" @click="buyCourse()" type="button" class="btn buy-cursov-gold rounded-pill po_btn">Приобрести сейчас</button>
            </div>
        </div>
    </div>
</div>


<!-- consultationModal2 -->
<div class="modal fade" id="consultationModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered consultationModal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if($agent->isMobile())
                    <h5 style="color: #1a1a1a; text-transform: uppercase;" class="modal-title" id="exampleModalLabel">Консультация астролога</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="font-size: 30px;" aria-hidden="true">&times;</span>
                    </button>
                @else
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 style="color: #1a1a1a; text-transform: uppercase;" class="modal-title" id="exampleModalLabel">Консультация астролога</h5>
                            </div>

                            <div class="col-md-4">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span style="font-size: 30px;" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-body">
                <div class="container">
                    <p v-if="errors.length" style="margin-bottom: 0px !important;">
                        <b style="color: #000;">Пожалуйста исправьте указанные ошибки:</b>
                    <ul style="color: red; padding-left: 15px; list-style: circle; text-align: left;">
                        <li v-for="error in errors">@{{ error }}</li>
                    </ul>
                    </p>
                    @if(!isset($user))
                        <p style="color: #000;">Для заказа бесплатной, предварительной, 15-минутной консультации, пожалуйста заполните поля ввода данных и сделайте заказ. Я свяжусь с вами и мы уточним время и дату консультации. С Уважением Дмитрий Фрейман!</p>

                        <div class="form-group">
                            <input type="text" placeholder="Ваше имя" v-model="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="Ваш телефон" v-model="phone" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="email" placeholder="Ваш Email" v-model="email" class="form-control">
                        </div>
                    @else
                        <div class="form-group">
                            <input type="text" placeholder="Ваш телефон" v-model="phone" class="form-control">
                        </div>
                    @endif

                    <div class="form-group">
                        <button id="pbp15" type="button" @click="getConsultation()" class="btn btn-violet rounded-pill zk_btn">Получить бесплатную консультацию</button>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
