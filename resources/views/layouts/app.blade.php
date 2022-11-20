<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ffffff">

    <!-- use latest version of IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- seo -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>

    <!-- document Favicon in browser tabs -->
    <link rel="shortcut icon" href="{{ asset('assets/media/media/icons/favicon.ico') }}" type="image/x-icon">

    <!-- additional approach to add favicon -->
    <link rel="apple-touch-icon" href="{{ asset('assets/media/media/icons/favicon.svg') }}">
    <link rel="apple-touch-icon" sizes="16x16" href="#">
    <link rel="apple-touch-icon" sizes="32x32" href="#">
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{ asset('assets/media/media/icons/apple-touch-icon-180x180.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->

    <script src="{{ asset('js/polyfills.scripts.js') }}"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script data-skip-moving="true">
        window.app = window.app || {};
        window.app.globalConfig = {
            baseUrl: 'http://memorialbook.loc/',
            relPath: './',
            assetsPath: '/assets/media/',
            gmapsApikey: 'AIzaSyCO1W6X1LgXeZzrDSNL6YMbZm9Z9NAPH5Y'
        };
        window.app.ready = function (callback) {
            if (typeof callback === 'function') document.addEventListener('DOMContentLoaded', function () {
                callback();
            });
        };
    </script>

</head>
<body>

<script data-skip-moving="true">
    document.documentElement.classList.remove('no-js');
</script>

{{--@include('includes.toasters.toasters')--}}

<style>

</style>

<div id="page">

    <header class="header">
        <!--logo header-->
        <a href="{{ route('home') }}" class="logo-header">
            <img src="{{ asset('assets/media/media/logo/logo.svg') }}" class="logo-header__img"
                 alt="Memorialbook"
                 title="Memorialbook"/>
        </a>

        <!--menu-->
        <nav class="header-menu" id="header-menu">
            <ul class="menu">
                @guest
                    <li class="menu__item">
                        <a href="#" class="menu__link">Люди</a>
                    </li>
                    <li class="menu__item">
                        <a href="#" class="menu__link">Места</a>
                    </li>
                @else
                    <li class="menu__item">
                        <a href="#" class="menu__link">Люди</a>
                    </li>
                    <li class="menu__item">
                        <a href="#" class="menu__link">Места</a>
                    </li>
                    <li class="menu__item">
                        <a href="{{ route('tree') }}" class="menu__link">Семейное древо</a>
                    </li>
                    <li class="menu__item">
                        <a href="#" class="menu__link">Магазин</a>
                    </li>
                @endif
            </ul>
        </nav>

        <!--buttons-->
        @auth
        <div class="header-buttons" id="header-button">
            <button type="button" class="header-buttons__lang">Ru</button>

            <button type="button" class="notifications">
                <svg xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m17.6 14.5-.2-.3c-1-1.2-1.7-2-1.7-5.5 0-3.2-1.3-5.3-4-6.4C11.4.9 10.3 0 9 0 7.7 0 6.6.9 6.2 2.3 3.6 3.4 2.3 5.5 2.3 8.7c0 3.5-.6 4.3-1.7 5.5l-.2.3c-.4.5-.5 1.2-.2 1.8.3.6.9 1 1.6 1h3.5c0 1 .4 1.9 1.1 2.6C7.1 20.6 8 21 9 21s1.9-.4 2.7-1.1c.7-.7 1.1-1.7 1.1-2.6h3.5c.7 0 1.3-.4 1.6-1 .2-.6.2-1.3-.3-1.8zm-7 4.3c-.8.9-2.3.9-3.2 0-.4-.4-.7-1-.7-1.6h4.5c.1.6-.2 1.2-.6 1.6zm5.7-3H1.8c-.2 0-.2-.1-.3-.1v-.2l.2-.3c1.1-1.4 2-2.4 2-6.5 0-3.3 1.6-4.4 3-5 .4-.2.8-.5.9-1 .2-.6.7-1.2 1.4-1.2s1.2.6 1.3 1.2c.1.4.5.8.9 1 1.4.6 3 1.7 3 5 0 4.1.9 5.1 2 6.5l.2.3v.2c.1 0 0 .1-.1.1z"/>
                </svg>
                <span class="notifications__number">1</span>
            </button>

            <a href="{{ route('cabinet.show', auth()->user()->slug ) }}" class="login">{{ auth()->user()->fullName[0] }}</a>

            <button type="button" class="header-buttons__menu" id="mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        @else
            <div class="header-buttons" id="header-button">
                <button type="button" class="header-buttons__lang">Ru</button>
                <button type="button" class="header-buttons__registration open-registration btn white-btn">Регистрация</button>
                <button type="button" class="header-buttons__menu" id="mobile-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        @endif
    </header>

    <main class="content" role="main">

        <div class="message">
            @include('includes.partials.message')
        </div>

        @yield('content')

    </main>

    <footer class="footer">
        <!--logo footer-->
        <a href="#" class="logo-footer">
            <img src="{{ asset('assets/media/media/logo/logo-light.svg') }}" class="logo-footer__img" alt="Memorialbook" title="Memorialbook"/>
        </a>

        <!--menu-->
        <nav class="footer-menu">
            <ul class="menu-list">
                @guest
                    <li class="menu-list__item">
                        <a href="#" class="menu-list__link">О проекте</a>
                    </li>
                    <li class="menu-list__item">
                        <a href="#" class="menu-list__link">Контакты</a>
                    </li>
                @else
                    <li class="menu-list__item">
                        <a href="#" class="menu-list__link">О проекте</a>
                    </li>
                    <li class="menu-list__item">
                        <a href="{{ route('tree') }}" class="menu-list__link">Семейное древо</a>
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
                @endif
            </ul>
        </nav>

        <!--cookie link-->
        <a href="#" class="cookie-link">Политика обработки персональных данных</a>
    </footer>

</div>

<div class="preview-modal" id="modal-from">
    <div class="aside-form" id="form-aside">
        <button type="button" class="close-registration" id="close-aside"></button>
    </div>
</div>

@yield('scripts')

</body>
</html>
