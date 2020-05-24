<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/pay.css">
    <link rel="stylesheet" href="/fonts/fontss.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="x-icon">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>ASTROLOVED</title>
</head>

<body class="page">
<div id="particles-js">
    <canvas class="particles-js-canvas-el" width="1920" height="860" style="width: 100%; height: 100%;"></canvas>
</div>
<header class="main-header" id="glavn">

    @include('partials.nav')

    @section('header')

    @show
</header>

@yield('content')


@include('partials.footer')

@include('partials.modals')

@include('partials.scripts')

</body>
</html>
