<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/my.css">
    <link rel="stylesheet" href="/css/buy.css">
    <link rel="stylesheet" href="/fonts/fontss.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="x-icon">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @csrf
    <title>ASTROLOVED</title>
</head>

<body>

@yield('content')

<div class="buy-foot" id="buy-foot">
    <div class="container">
        <div class="row">
            @yield('footer_buttons')
        </div>
        <div class="row cooper text-center">
            <div class="col">
                <span>© 2020г. Все права защищены</span> <br>
                <a class="pol" target="_blank" href="https://astroloved.com/%D0%9F%D0%BE%D0%BB%D0%B8%D1%82%D0%B8%D0%BA%D0%B0%20%D0%BA%D0%BE%D0%BD%D1%84%D0%B8%D0%B4%D0%B5%D0%BD%D1%86%D0%B8%D0%B0%D0%BB%D1%8C%D0%BD%D0%BE%D1%81%D1%82%D0%B8.pdf">Политика конфедициальности</a> <br>
                <a class="pol" target="_blank" href="https://astroloved.com/%D0%94%D0%BE%D0%B3%D0%BE%D0%B2%D0%BE%D1%80%20%D0%BF%D1%83%D0%B1%D0%BB%D0%B8%D1%87%D0%BD%D0%BE%D0%B9%20%D0%BE%D1%84%D0%B5%D1%80%D1%82%D1%8B.pdf">Договор публичной оферты</a>
            </div>
        </div>
    </div>
</div>

@include('partials.modals')

@include('partials.scripts')
{{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>--}}
{{--<script src="/js/bootstrap.min.js"></script>--}}
{{--<script src="/fontawesome-free-5.13.0-web/js/all.js"></script>--}}

<script>
    const anchors = document.querySelectorAll('a[href*="#"]')
    for (let anchor of anchors) {
        anchor.addEventListener('click', function(e) {
            e.preventDefault()
            const blockID = anchor.getAttribute('href').substr(1)
            document.getElementById(blockID).scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            })
        })
    }

</script>
</body>
</html>
