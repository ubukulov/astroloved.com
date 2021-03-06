@extends('layouts.app')
@section('header')
    @parent
    <div class="main-header-text text-center">
        <h4>Каждый день получайте свой личный астрологический прогноз от профессионального ведического астролога!</h4>
        <h1>Знайте свой день силы! действуйте эффективно! постройте успешную судьбу!</h1>
        <h5>Проверьте, насколько точными и полезными окажутся для Вас, эти прогнозы, ведь <span>3 дня бесплатно!</span> Так же, Вы можете заказать личную консультацию астролога.</h5>
        <p></p>
        <div class="main-header-buttons">
            <button type="button" onclick='window.location="{{ route('buy.subscription') }}"' class="btn btn-pink rounded-pill xpp_btn">Хочу Получать прогнозы</button>
            <button type="button" onclick='window.location="{{ route('show.consultation') }}"' class="btn btn-violet rounded-pill">Консультация астролога</button>
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
                    <button type="button" onclick='window.location="{{ route('buy.subscription') }}"' class="btn btn-pink rounded-pill xpp_btn">Хочу Получать прогнозы</button>
                    <button type="button" onclick='window.location="{{ route('show.consultation') }}"' class="btn btn-violet rounded-pill">Консультация астролога</button>
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
                            <img width="350px" src="/img/ppp2.jpeg" alt="астроловед">
                        </div>
                        <div class="col-md">
                            <div class="opis-consult">
                                <h3>Дмитрий Фрейман</h3>
                                <h5>Практикующий астролог</h5>
                                <p>"Жизнь каждого человека может быть более предсказуема, понятна и управляема, если знать, что его ожидает завтра. Расчёт Персонального Дня Силы на каждый день как раз и даёт это понимание и позволяет быть более эффективным каждый день."</p>
                                <div class="knopp">
                                    <a href="{{ route('show.consultation') }}" class="btn rounded-pill fiol">Заказать консультацию</a>
                                    <a href="{{ route('show.course') }}" class="btn rounded-pill gold">Пройти обучение</a>
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
                        <button type="button" onclick='window.location="{{ route('show.course') }}"' class="btn rounded-pill">Пройти обучение у астролога</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="reviews">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h3>Отзывы клиентов</h3>
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="wrap-items">
                        <div id="f9" class="fotka"></div>
                        <h5>Неля</h5>
                        <p>Всегда было интересно влияние астрологии и нумерологии на жизнь человека. Как можно по числам, связанным с человеком, узнать его личные качества, характер, предугадать значимые события.
                            Впервые в своей жизни посетила астрологическую консультацию у астролога Дмитрия.
                            Было очень интересно и познавательно. Дмитрий рассказал мне мои сильные и слабые черты характера и как я могу использовать свои сильные черты в свою пользу. Дал полезные советы. На первой консультации было много общей информации, но я выделила для себя определенные моменты.
                            На последующих консультациях можно разобрать конкретные вопросы, интересующие вас. Если вы запутались, специалист направит вас в нужное русло и даст полезные советы, которые максимально улучшат вашу жизнь.</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="wrap-items">
                        <div id="f8" class="fotka"></div>
                        <h5>Мария</h5>
                        <p>Хочу выразить большую благодарность Дмитрию,за астрологическую консультацию!!!
                            Она бомбическая😍😍😍
                            Я конечно сама знаю свои сильные и слабые стороны,но Вы Дмитрий разложили все по полочкам, и указали,что не мало важно на те черты моего характера которые необходимо обуздать,да и не только указали но и направили как это делать.
                            Вы рассказали обо мне на столько подробно,что я думаю не все родные меня знают настолько хорошо как Вы😅.
                            Вашим рекомендациям я придерживаюсь,но особенно трудно пока мне даётся ранний подъем😅.И я реально вижу изменения,в отношении других людей ко мне,мое отношения к ситуациям тоже поменялось я смотрю теперь на ситуации не под узким углом а рассматриваю ситуацию со всех сторон.
                            Мне очень понравилось,что Вы находите подход  к каждому и можете донести информацию.
                            Спасибо большое за Ваш труд❣️</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="wrap-items">
                        <div id="f7" class="fotka"></div>
                        <h5>Олеся Касаткина</h5>
                        <p>Добрый день! Хотелось бы поделиться эмоциями после консультации у Дмитрия.
                            Это просто бомба не побоюсь этого слово! Настолько все четко просто и понятно, каждый момент прям попадание в десятку. До этого не когда не обращалась к астрологам и всегда скептически относилась ко всякому подобному роду деятельности. Но наступил тот момент когда удача отвернулась и пришел просто упадок эмоциональных и физических сил и вот в этот именно момент судьба подарила те знания что раскрыл Дмитрий!!!
                            Воспользуюсь обязательно и не раз!!! Спасибо Вам огромное!!!</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="wrap-items">
                        <div id="f6" class="fotka"></div>
                        <h5>Данара Талисман</h5>
                        <p>Получила от Дмитрия консультацию по астрологической карте. Раньше тоже этим увлекалась, но данные были размытыми. После консультации Дмитрия все встало на свои места. Оказывается, на 60% у меня служение, на 40% - разум. Отсюда и продуманность, осторожность (касаемо разума), и постоянное желание помогать другим, даже если не просят (служение). Раньше всегда удивлялась тому, почему это я как мамочка ношусь со всеми 😂 Помимо этого Дмитрий дал много практических рекомендаций, в какую сторону двигаться и какие действия совершать, чтобы приблизиться к своим целям, при этом не навредив себе. Мы очень долго беседовали, после этого я еще час приходила в себя и в тот момент точно поняла, с чего начну перемены в своей жизни. Спасибо большое Дмитрию за подробную астрологическую карту 🤗🙂😃👍🏻</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="wrap-items">
                        <div id="f5" class="fotka"></div>
                        <h5>Жасулан Сеиткалиев</h5>
                        <p>Дмитрий, еще раз добрый вечер!  Это Жасулан. До сих пор с супругой не можем остановиться обсуждая, то что Вы нам на консультации рассказали. Мне лично как осознанному отцу и мужу очень важно было узнать от Вас  предназначении каждого члена семьи и в каком направлении каждому из  нас нужно развиваться. Ранее я не особо верил почему то в такие консультации,  но сейчас благодаря вам понял  что вы в точку попадали  и  это даёт прямо энергию и мотивацию дальше развиваться. Потому что у меня уже  цели были достигнуты,  а вот дальше что то смысл терялся. А когда мы  узнали от вас что Всевышний даёт каждому из нас свою миссию и вы это четко дали понять,  сколько  же времени и денег я уже потерял в поисках своего призвания.  Но, все к лучшему!  Всевышний отправил Вас.  Всем знакомым начну рекомендовать вас как специалиста в области астрологии и предназначения!  Дмитрий, у Вас мощная энергетика слов.  Еще раз БлагоДарю!</p>
                    </div>
                </div>

                <div class="carousel-item">
                <div class="wrap-items">
                  <div id="f4" class="fotka"></div>
                  <h5>Жукен Жанна</h5>
                  <p>Доброе утро Дмитрий! Хотела бы поблагодарить за ваш ежедневный персональный прогноз! Я пользуюсь уже несколько недель и действительно чувствую, что дни, которые я провожу соответсвенно вашим прогнозам гораздо более эффективные, чем те, в которые я игнорирую рекомендации. Спасибо большое! Такой услуги я ещё не встречала особенно нравиться то, что эти прогнозы составлены именно на мою дату рождения. Спасибо большое за такую услугу, искренне желаю вам процветания и успехов!</p>
                </div>
              </div>

              <div class="carousel-item">
                <div class="wrap-items">
                  <div id="f1" class="fotka"></div>
                  <h5>Кайрат Мардушев</h5>
                  <p>Как то, во время одной беседы, Дмитрий поведал мне о том что увлекается астрологией и предложил посмотреть мою астрологическую карту, по дате рождения. Я с интересом согласился. И уже через пару минут, мой скептицизм, относительно астрологических наук, развеялся как дым. Хоть консультация была и не долгой, я многое узнал о себе. Я понял, почему я веду себя так или иначе, в определнных ситауциях, с чем связан мой характер, склоности и многое другое, а самое главное, что мне с этим делать, над чем работать. Большое спасибо Дмитрию за ту огромную пользу, которую я получил в итоге!</p>
                </div>
              </div>

              <div class="carousel-item">
                <div class="wrap-items">
                  <div id="f2" class="fotka"></div>
                  <h5>Меркин Виктор</h5>
                  <p>Добрый день!
                      Моё имя - Виктор.
                      26 февраля 2020 года мне очень посчастливилось посетить Астрологическую консультацию у Дмитрия Телюк.
                      Честно говоря, положив руку на сердце, я скептически относился к подобным вещам и мало доверял.
                      Но когда мы начали нашу беседу и стоило мне назвать год, дату и время своего Рождения -  как буквально через пару минут я услышал то, чего до этого момента обо мне никто вообще знать не мог.
                      Более того, было такое ощущение, что я открыт полностью - как книга.
                      Сначала было немного не по себе, что о тебе говорят такие сокровенные вещи. Но во время беседы я всё чаще ловил себя на мысли, что это именно то, что мне надо знать о себе, чем нужно откровенно поделиться и что мне нужно узнать, чтобы жизнь изменилась абсолютно.
                      В общем то, ровно так и получилось.
                      Жизнь моя после этого изменилась к лучшему, духовному!
                      Стало намного понятнее, что и как нужно делать дальше, чтобы правильно жить в гармонии с самим-собой.

                      В общем очень всем рекомендую пройти данную консультацию у Дмитрия!</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="wrap-items">
                  <div id="f3" class="fotka"></div>
                  <h5>Алина Белоголовцева</h5>
                  <p>Дмитрий, хочу поблагодарить Вас за столь объемную и понятную консультацию. Очень много информации из личного опыта, легкая подача. Все интересно и главное практично. Отзывчивость Дмитрия, получение ответов дает ощущение спокойствия. Всех Вам благ, вдохновения и новых горизонтов! Спасибо большое!</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>

            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>

            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
