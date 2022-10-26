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

    <title>{{ config('app.name', 'Memorialbook') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/polyfills.scripts.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script data-skip-moving="true">
        window.app = window.app || {};
        window.app.globalConfig = {
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

@include('includes.toasters.toasters')
<div class="page-wrapper">
    <div class="page-wrapper-inner">
        <div class="header">
            <div class="header-top">
                <div class="container">
                    <div class="row -small">
                        <div class="header__logo -small col-auto">
                                <span class="header-logo__inner">
                                    <a href="{{ route('index') }}">
                                    <img class="header-logo__image"
                                         src="{{ asset('assets/media/media/logo/logo.svg') }}"
                                         alt="Логотип Memorial book">
                                </span></a>
                        </div>
                        <div class="header__menu -small col-auto">
                            <nav class="header-menu__container">
                                <ul class="header-menu__list">

                                    @guest
                                        <li class="header-menu__item">
                                            <a class="header-menu__link" href="#slideout-people" data-slideout=""
                                               data-slideout-options="{&quot;type&quot;:&quot;people&quot;,&quot;position&quot;:&quot;top&quot;}">Люди</a>
                                        </li>
                                        <li class="header-menu__item">
                                            <a class="header-menu__link" href="#slideout-places" data-slideout=""
                                               data-slideout-options="{&quot;type&quot;:&quot;places&quot;,&quot;position&quot;:&quot;top&quot;}">Места</a>
                                        </li>
                                    @else
                                        <li class="header-menu__item">
                                            <a class="header-menu__link" href="#slideout-people" data-slideout=""
                                               data-slideout-options="{&quot;type&quot;:&quot;people&quot;,&quot;position&quot;:&quot;top&quot;}">Люди</a>
                                        </li>
                                        <li class="header-menu__item">
                                            <a class="header-menu__link" href="#slideout-places" data-slideout=""
                                               data-slideout-options="{&quot;type&quot;:&quot;places&quot;,&quot;position&quot;:&quot;top&quot;}">Места</a>
                                        </li>
                                        <li class="header-menu__item -secondary">
                                            <a class="header-menu__link" href="{{ route('tree') }}">Семейное
                                                древо</a>
                                        </li>
                                        <li class="header-menu__item -secondary">
                                            <a class="header-menu__link" href="#">Магазин</a>
                                        </li>
                                        <li class="header-menu__item -secondary">
                                            <a class="header-menu__link" href="#">Заказы</a>
                                        </li>
                                    @endif

                                </ul>
                            </nav>
                        </div>
                        <div class="header__right -small col-auto">
                            <div class="row -small">
                                <div class="header__language -small col">
                                    <a class="header-language__button btn btn-outline-secondary"
                                       href="javascript:void(0)" role="button">RU</a>
                                </div>
                                <div class="header__personal -small col">
                                    <div class="row -small">
                                        @guest
                                            <div class="header-personal__item -small -auth col">
                                                <a class="header-personal__button btn btn-primary" href="#slideout-auth"
                                                   role="button" data-slideout=""
                                                   data-slideout-options="{&quot;type&quot;:&quot;auth&quot;}">Вход</a>
                                            </div>
                                            <div class="header-personal__item -small -register col">
                                                <a class="header-personal__button btn btn-outline-primary"
                                                   href="#slideout-register" role="button"
                                                   data-slideout=""
                                                   data-slideout-options="{&quot;type&quot;:&quot;register&quot;}">Регистрация</a>
                                            </div>
                                        @else
                                            <div class="header-personal__item -small -notifications col">
                                                <button class="header-personal__button -notifications" type="button">
                                                    <div class="header-personal__icon">
                                                        <img src="{{ asset('assets/media/media/sprite-bell.svg') }}"
                                                             alt="notification" width="18px" height="21px">
                                                        {{--                                                        <svg style="width: 18px; height: 21px;" aria-hidden="true">--}}
                                                        {{--                                                            <use xlink:href="{{ asset('assets/media/media/sprite-bell.svg') }}"></use>--}}
                                                        {{--                                                        </svg>--}}
                                                    </div>
                                                    <span class="header-personal__badge badge badge-danger">1</span>
                                                </button>
                                            </div>
                                            <div class="header-personal__item -small -user col">
                                                <a class="header-personal__link"
                                                   href="../profile-edit">{{ \Illuminate\Support\Facades\Auth::user()->username }}</a>
                                            </div>
                                            <div class="header-personal__item -small -exit col">
                                                <form action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <input class="btn" type="submit" value="Выйти">
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="header__slideout-menu -small col">
                                    <button class="header-slideout-menu__button" type="button">
                                        <div class="header-slideout-menu__bars"></div>
                                    </button>
                                </div>

                                @include('includes.forms.auth.login')
                                @include('includes.forms.auth.restore_password')
                                @include('includes.forms.auth.register')

                                @include('includes.forms.filter_people')
                                @include('includes.forms.filter_places')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <main class="main-content" role="main">
            <div class="message">
                @if ($errors->any())
                    <div class="message alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            @yield('content')

        </main>

        <div class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="footer__logo col-auto">
                                <span class="footer-logo__inner">
                                    <img class="footer-logo__image"
                                         src="{{ asset('assets/media/media/logo/logo-light.svg') }}"
                                         alt="Логотип Memorial book">
                                </span>
                        </div>
                        <div class="footer__menu col-auto">
                            <nav class="footer-menu__container">
                                <ul class="footer-menu__list">
                                    @guest
                                        <li class="footer-menu__item -slideout">
                                            <a class="footer-menu__link" href="./text">О проекте</a>
                                        </li>
                                        <li class="footer-menu__item -slideout">
                                            <a class="footer-menu__link" href="./text">Контакты</a>
                                        </li>
                                    @else
                                        <li class="footer-menu__item -slideout">
                                            <a class="footer-menu__link" href="./text">О проекте</a>
                                        </li>
                                        <li class="footer-menu__item">
                                            <a class="footer-menu__link" href="{{ route('tree') }}">Семейное древо</a>
                                        </li>
                                        <li class="footer-menu__item">
                                            <a class="footer-menu__link" href="./text">Магазин</a>
                                        </li>
                                        <li class="footer-menu__item">
                                            <a class="footer-menu__link" href="#slideout-people" data-slideout=""
                                               data-slideout-options="{&quot;type&quot;:&quot;people&quot;,&quot;position&quot;:&quot;top&quot;}">Поиск
                                                людей
                                            </a>
                                        </li>
                                        <li class="footer-menu__item">
                                            <a class="footer-menu__link" href="#slideout-places" data-slideout=""
                                               data-slideout-options="{&quot;type&quot;:&quot;places&quot;,&quot;position&quot;:&quot;top&quot;}">Кладбища</a>
                                        </li>
                                        <li class="footer-menu__item -slideout">
                                            <a class="footer-menu__link" href="./text">Контакты</a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <div class="footer__policy col-auto">
                            <a class="footer-policy__link" href="javascript:void(0)">Политика обработки персональных
                                данных</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('scripts')
<script>

</script>


</body>
</html>
