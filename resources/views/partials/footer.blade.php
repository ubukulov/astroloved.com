<footer id="foot">
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="menushka">
                    <h5>МЕНЮ</h5>
                    <p><a href="#glavn">Главная</a></p>
                    <p><a href="#advantages">Зачем вам прогнозы</a></p>
                    <p><a href="#arguments">Планеты решают</a></p>
                    <p><a href="#training">Сам себе астролог</a></p>
                    <p><a href="#foot">Контакты</a></p>
                </div>
            </div>
            <div class="col-md">
                <div class="cont">
                    <img class="footer-logo" src="/img/log.png" alt="Astroloded"> <br>
                    <a href="#"><img width="20px" src="/img/whats.png" alt=""></a>
                    <a href="#"><img width="20px" src="/img/inst.png" alt=""></a> <br>
                    <a href="mailto:admin@astroloved.com">admin@astroloved.com</a> <br><br>
                    <a href="#" id="footer_pa" class="buttons-footers rounded-pill roz">Получать астропрогнозы</a> <br>
                    <a href="{{ route('show.consultation') }}" class="buttons-footers rounded-pill">Консультация астролога</a>
                </div>
            </div>
        </div>
        <div class="row cooper text-center">
            <div class="col">
                <span>© 2020г. Все права защищены</span> <br>
                <p style="margin-bottom:0px;"><a class="pol" href="/Политика конфиденциальности.pdf"  target="_blank">Политика конфедициальности</a></p>
                <p style="margin-bottom:0px;"><a class="pol" href="/Договор публичной оферты.pdf" target="_blank">Договор публичной оферты</a></p>
            </div>
        </div>
    </div>
</footer>

<div id="topNubex">
    @if($agent->isMobile())
        <img src="/img/arrow.png" width="25px" height="25px" />
    @else
        <img src="/img/arrow.png" width="35px" height="35px" />
    @endif
</div>
