@extends('layouts.app')
@section('header')
    @parent
    <div class="main-header-text text-center">
        <h4>Каждый день получайте свой личный астрологический прогноз от профессионального ведического астролога!</h4>
        <h1>Знайте свой день силы! действуйте эффективно! постройте успешную судьбу!</h1>
        <h5>Проверьте, насколько точными и полезными окажутся для Вас, эти прогнозы, ведь <span>3 дня бесплатно!</span> Так же, Вы можете заказать личную консультацию астролога.</h5>
        <p></p>
        <div class="main-header-buttons">
            <button type="button" data-toggle="modal" data-target="#subscribeModal" class="btn btn-pink rounded-pill">Хочу Получать прогнозы</button>
            <button type="button" data-toggle="modal" data-target="#consultationModal" class="btn btn-violet rounded-pill">Консултация астролога</button>
        </div>
    </div>
@stop

@section('content')
    <section id="advantages">
        <div class="container">
            <div class="row">
                <div class="div-cart">
                    <div class="row">
                        <div class="col">
                            <div class="cart">
                                <img class="titul" src="/img/p1.jpg" alt="астроловед">
                                <p>Благодаря тому, что вы каждый вечер получаете свой личный астрологический прогноз на свой email, Вы понимаете, для каких дел благоприятен или не благоприятен, завтрашний день, лично для Вас!</p>
                                <img width="200px" src="/img/line.png" alt="астроловед">
                            </div>
                        </div>
                        <div class="col">
                            <div class="cart">
                                <img class="titul" src="/img/p2.jpg" alt="астроловед">
                                <p>Благодоря личной астрологической карте, Вы узнаете, какие планеты, стихии и звезды оказывают влияние, конкретно на Вас, какие кармические силы направляют. Лучше узнаете себя, поймете свое предназначие, свою миссию в этой жизни!</p>
                                <img width="200px" src="/img/line.png" alt="астроловед">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <img class="emailik" width="400px" src="/img/email-astroloved.png" alt="astroloved">
                </div>
            </div>
            <div class="row">
                <div class="div-cart">
                    <div class="row">
                        <div class="col">
                            <div class="cart">
                                <img class="titul" src="/img/p3.jpg" alt="астроловед">
                                <p>Вы станете лучше понимать не только себя, но и своих близких. Благодаря этому, станете мудрее и теплее взаимодействоват со своими супругами, родителями, детьми, родными, друзьями и коллегами. Воцарится гармония в Ваших отношениях с людьми.</p>
                                <img width="200px" src="/img/line.png" alt="астроловед">
                            </div>
                        </div>
                        <div class="col">
                            <div class="cart">
                                <img class="titul" src="/img/p4.jpg" alt="астроловед">
                                <p>Руководствуясь древнейшими знаниями ведической астрологии, Вы начнете лучше понимать себя, свои сильные и слабые стороны, свои таланты и качества, как и на каких поприщах стоит добиваться успеха! Изо дня в день, из правильных действий сложится Ваша судьба! Стоит ли попробывать взять свою жизнь в собственные руки?</p>
                                <img class="lineee" width="200px" src="/img/line.png" alt="астроловед">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <button type="button" data-toggle="modal" data-target="#subscribeModal" class="btn btn-pink rounded-pill">Хочу Получать прогнозы</button>
                    <button type="button" data-toggle="modal" data-target="#consultationModal" class="btn btn-violet rounded-pill">Консултация астролога</button>
                </div>
            </div>
        </div>
    </section>

    <section id="consultation">
        <div class="container">
            <div class="row">
                <div class="div-consul">
                    <div class="row">
                        <div class="col-md text-center">
                            <img width="350px" src="/img/ppp.jpeg" alt="астроловед">
                        </div>
                        <div class="col-md">
                            <div class="opis-consult">
                                <h3>Дмитрий Телюк</h3>
                                <h5>Практикующий астролог</h5>
                                <p>"Жизнь каждого человека может быть более предсказуема, понятна и управляема, если знать, что его ожидает завтра. Расчёт Персонального Дня Силы на каждый день как раз и даёт это понимание и позволяет быть более эффективным каждый день."</p>
                                <div class="knopp">
                                    <button type="button" data-toggle="modal" data-target="#consultationModal" class="btn rounded-pill fiol">Заказать консультацию</button>
                                    <button type="button" data-toggle="modal" data-target="#educationModal" class="btn rounded-pill gold">Пройти обучение</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="arguments">
        <div class="container">
            <div class="row text-center">
            </div>
            <div class="row">
                <div class="col">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link rounded-pill active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Планеты решают</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ведическая астрология</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded-pill" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Что могут звезды?</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <img src="/img/planet.jpg" alt="астроловед">
                            <p>Планеты солнечной системы – это совершенно настроенные небесные часы. Вращение и движение планет очень точны. Они восходят и заходят в определенное время.</p>
                            <p>Эффекты планетарных влияний видны невооруженным глазом - день и ночь, смена сезонов, приливы и отливы и тд. Если движение космических тел оказывают такое колоссальное влияние на нашу планету, бесспорно, то что они оказывают влияние и на нас, на наше здоровье и повседневную жизнь, ведь мы тоже частички нашей планеты и состоим из тех же элементов что и земля.</p>
                            <p>Есть процессы, которые оказывают влияние на происходящие с нами события, но не видны с первого взгляда. Ведическая астрология - это система наблюдений, которая складывалась веками и имеет историю в 4 000 лет.</p>
                            <p>Астрология, как восточная, так и западная, основана на системе предсказаний, во многом похожей на систему, используемую в метеорологии. Но вместо предсказания погодных условий, астрологи говорят о возможности определенных событий при определенном положении планет.</p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <img src="/img/dzhoitish.jpg" alt="">
                            <p>Ведическая астрология, или Джйотиш, является традиционной астрологией Индии, которая зародилась ранее 3000 лет до н. э.</p>
                            <p>Она основывается на священных писаниях — Ведах, древнейших источниках мудрости. Ведическая астрология, как и наука йоги, была открыта путём прозрения великих мудрецов риши, живших в Сатья-Югу, эпоху света и истины. Их называли Семью Мудрецами и отождествляли со звёздами ковша Большой Медведицы и с Плеядами. Риши выразили ведические знания на языке мантр, звуков-семян, воспроизводящих вибрации космоса, главным из которых является звук Ом.</p>
                            <p>Величайшим из риши был мудрец Васиштха, чей внук, Парашара Шакти, получил в своей медитации знания о Джйотиш. Передаваемые из уст в уста истины были в итоге записаны, вследствие чего появилась «Брихат-Парашара-Хора Шастра», которая и сегодня остаётся главной книгой ведических астрологов.</p>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <img src="/img/karma.jpg" alt="астроловед">
                            <p>В момент рождения человека на небосводе выстраивается определенная комбинация из планет солнечной системы. На основании данной 'картины неба' астролог составляет индивидуальную карту рождения.</p>
                            <p>Любая планета имеет свое влияние негативное или благотворное, в зависимости от расположения в каждом конкретном случае. Бывает, что планеты расположены очень благоприятно для владельца гороскопа, но бывают и крайне опасные и тяжелые комбинации.</p>
                            <p>Можно ли списывать свои несчастья и ошибки исключительно на звезды? Да, звезды встали так над тобой, но их расположение - результаты твоих прошлых поступков добродетельных или не очень. И именно они определяют твою судьбу. Но, если вовремя это осознать, ведическая астрология дает хороший шанс исправить старые ошибки и не допустить новые.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="training">
        <div class="zakraska">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <h3>сам себе астролог!</h3>
                        <button type="button" data-toggle="modal" data-target="#educationModal" class="btn rounded-pill">Пройти обучение у астролога</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop