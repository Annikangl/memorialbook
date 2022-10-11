<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- use latest version of IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- seo -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>

    <!-- document Favicon in browser tabs -->
    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.ico') }}" type="image/x-icon">

    <!-- additional approach to add favicon -->
    <link rel="apple-touch-icon" href="{{ asset('img/favicons/favicon.svg') }}">
    <link rel="apple-touch-icon" sizes="16x16" href="#">
    <link rel="apple-touch-icon" sizes="32x32" href="#">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon-180x180.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Memorialbook') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>

    <script src="{{asset('js/template.js')}}"></script>
    <script src="{{asset('js/familytree.js')}}"></script>


</head>
<body>

<div id="page">
    <header class="header">
        <!--logo header-->
        <a href="#" class="logo-header">
            <img src="{{ asset('img/logo/logo.svg') }}" class="logo-header__img" alt="Memorialbook" title=""/>
        </a>

        <!--menu-->
        <nav class="header-menu" id="header-menu">
            <ul class="menu">
                <li class="menu__item">
                    <a href="#" class="menu__link">Люди</a>
                </li>
                <li class="menu__item">
                    <a href="#" class="menu__link">Места</a>
                </li>
                <li class="menu__item">
                    <a href="#" class="menu__link">Семейное древо</a>
                </li>
                <li class="menu__item">
                    <a href="#" class="menu__link">Магазин</a>
                </li>
                <li class="menu__item">
                    <a href="#" class="menu__link">Заказы</a>
                </li>
            </ul>
        </nav>

        <!--buttons-->
        <div class="header-buttons" id="header-button">
            <button type="button" class="header-buttons__lang">Ru</button>
            <button type="button" class="header-buttons__registration open-registration">Регистрация</button>
            <button type="button" class="header-buttons__menu" id="mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>
        @yield('content')
    <footer class="footer">
        <!--logo footer-->
        <a href="#" class="logo-footer">
            <img src="{{ asset('img/logo/logo-light.svg') }}" class="logo-footer__img" alt="" title=""/>
        </a>

        <!--menu-->
        <nav class="footer-menu">
            <ul class="menu-list">
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link">О проекте</a>
                </li>
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link">Семейное древо</a>
                </li>
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link">Магазин</a>
                </li>
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link">Поиск людей</a>
                </li>
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link">Кладбища</a>
                </li>
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link">Контакты</a>
                </li>
            </ul>
        </nav>

        <!--cookie link-->
        <a href="#" class="cookie-link">Политика обработки персональных данных</a>
    </footer>
</div>

@include('includes.preview-modal.priviewModal')
</body>
</html>
