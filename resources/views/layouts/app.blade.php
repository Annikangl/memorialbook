<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Memorialbook') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<script data-skip-moving="true">
    document.documentElement.classList.remove('no-js');
</script>
<div class="toaster -right -top toaster-initialized" data-toaster=""></div>
<div class="toaster -right -bottom toaster-initialized" data-toaster="">

</div>
<div id="app">
    <div class="page-wrapper">
        <div class="page-wrapper-inner">
            <div class="header">
                <div class="header-top">
                    <div class="container">
                        <div class="row -small">
                            <div class="header__logo -small col-auto">
                                <a href="{{ route('home') }}">
                                <span class="header-logo__inner">
                                    <img class="header-logo__image" src="{{ asset('img/logo/logo.svg') }}"
                                         alt="Логотип Memorial book">
                                </span>
                                </a>
                            </div>
                            <div class="header__menu -small col-auto">
                                <nav class="header-menu__container">
                                    <ul class="header-menu__list">
                                        <li class="header-menu__item">
                                            <a class="header-menu__link" href="#slideout-people" data-slideout=""
                                               data-slideout-options="{&quot;type&quot;:&quot;people&quot;,&quot;position&quot;:&quot;top&quot;}">Люди</a>
                                        </li>
                                        <li class="header-menu__item">
                                            <a class="header-menu__link" href="#slideout-places" data-slideout=""
                                               data-slideout-options="{&quot;type&quot;:&quot;places&quot;,&quot;position&quot;:&quot;top&quot;}">Места</a>
                                        </li>
                                        <li class="header-menu__item -secondary">
                                            <a class="header-menu__link" href="./tree">Семейное древо</a>
                                        </li>
                                        <li class="header-menu__item -secondary">
                                            <a class="header-menu__link" href="./shop">Магазин</a>
                                        </li>
                                        <li class="header-menu__item -secondary">
                                            <a class="header-menu__link" href="./text">Заказы</a>
                                        </li>
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
                                        @guest
                                        <div class="row -small">
{{--                                            <div class="header-personal__item -small -auth col">--}}
{{--                                                <a class="header-personal__button btn btn-primary" href="#slideout-auth"--}}
{{--                                                   role="button" data-slideout=""--}}
{{--                                                   data-slideout-options="{&quot;type&quot;:&quot;auth&quot;}">Вход</a>--}}
{{--                                            </div>--}}

                                            <div class="header-personal__item -small -register col">
                                                <a class="header-personal__button btn btn-outline-primary"
                                                   href="#slideout-register" role="button" data-slideout=""
                                                   data-slideout-options="{&quot;type&quot;:&quot;register&quot;}">Регистрация</a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="header__slideout-menu -small col">
                                        <button class="header-slideout-menu__button" type="button">
                                            <div class="header-slideout-menu__bars"></div>
                                        </button>
                                    </div>
                                    <div class="base-form -auth" id="slideout-auth">
                                        <form class="form form-initialized base-form-initialized preloader-initialized"
                                              action="#" method="post" data-base-form="" aria-disabled="false"
                                              novalidate="">
                                            <div class="form__title">Вход в&nbsp;систему</div>
                                            <div class="form__form-group form-group">
                                                <label class="form__label" for="auth-email-2">Email:</label>
                                                <div class="form__input-container">
                                                    <input class="form__input form-control" type="email"
                                                           id="auth-email-2" name="EMAIL" autocomplete="email"
                                                           data-validate="required, email">
                                                </div>
                                            </div>
                                            <div class="form__form-group form-group">
                                                <label class="form__label" for="auth-password-2">Пароль:</label>
                                                <div class="form__input-container">
                                                    <input class="form__input form-control" type="password"
                                                           id="auth-password-2" name="PASSWORD"
                                                           autocomplete="current-password" data-validate="required">
                                                    <a class="form__link -right" href="#slideout-restorepass"
                                                       data-slideout=""
                                                       data-slideout-options="{&quot;type&quot;:&quot;restorepass&quot;,&quot;position&quot;:&quot;top&quot;}">
                                                        Забыли пароль?</a>
                                                </div>
                                            </div>
                                            <div class="form__form-group -submit form-group">
                                                <button class="form__button -submit btn btn-primary btn-lg"
                                                        type="submit">Войти
                                                </button>
                                            </div>
                                            <div class="form__form-group -bottom form-group">
                                                <a class="form__link" href="#slideout-register" data-slideout=""
                                                   data-slideout-options="{&quot;type&quot;:&quot;register&quot;}">Нет
                                                    аккаунта? Зарегистироваться</a>
                                            </div>
                                            <div class="preloader" role="status" style="transition-duration: 250ms;">
                                                <div class="preloader-spinner">

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="base-form -restorepass" id="slideout-restorepass">
                                        <form class="form form-initialized base-form-initialized preloader-initialized"
                                              action="#" method="post" data-base-form="" aria-disabled="false"
                                              novalidate="">
                                            <div class="container">
                                                <div class="form__inner">
                                                    <div class="form__left">
                                                        <div class="form__title">Восстановить пароль</div>
                                                    </div>
                                                    <div class="form__right">
                                                        <div class="form__form-group form-group">
                                                            <div class="form__message">Если вы забыли пароль, введите
                                                                email.
                                                                <br>Контрольная строка для смены пароля, а также ваши
                                                                регистрационные данные, будут высланы вам
                                                                по электронной почте.
                                                            </div>
                                                        </div>
                                                        <div class="form__form-group form-group">
                                                            <label class="form__label"
                                                                   for="restorepass-email-3">Email:</label>
                                                            <div class="form__input-container">
                                                                <input class="form__input form-control" type="email"
                                                                       id="restorepass-email-3" name="EMAIL"
                                                                       autocomplete="email"
                                                                       data-validate="required, email">
                                                            </div>
                                                        </div>
                                                        <div class="form__form-group -submit form-group">
                                                            <button class="form__button -submit btn btn-primary"
                                                                    type="submit">Выслать
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="preloader" role="status" style="transition-duration: 250ms;">
                                                <div class="preloader-spinner">

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="base-form -register" id="slideout-register">
                                        <form class="form form-initialized base-form-initialized preloader-initialized"
                                              action="#" method="post" data-base-form="" aria-disabled="false"
                                              novalidate="">
                                            <div class="form__title">Регистрация</div>
                                            <div class="form__form-group form-group">
                                                <label class="form__label" for="register-fio-4">ФИО:</label>
                                                <div class="form__input-container">
                                                    <input class="form__input form-control" type="text"
                                                           id="register-fio-4" name="FIO" autocomplete="name"
                                                           data-validate="required, name">
                                                </div>
                                            </div>
                                            <div class="form__form-group form-group">
                                                <label class="form__label" for="register-email-4">Email:</label>
                                                <div class="form__input-container">
                                                    <input class="form__input form-control" type="email"
                                                           id="register-email-4" name="EMAIL" autocomplete="email"
                                                           data-validate="required, email">
                                                </div>
                                            </div>
                                            <div class="form__form-group form-group">
                                                <label class="form__label" for="register-phone-4">Телефон:</label>
                                                <div class="form__input-container">
                                                    <input class="form__input form-control mask-initialized" type="tel"
                                                           id="register-phone-4" name="PHONE" autocomplete="tel"
                                                           data-validate="required, tel" inputmode="tel">
                                                </div>
                                            </div>
                                            <div class="form__form-group form-group">
                                                <label class="form__label" for="register-password-4">Пароль:</label>
                                                <div class="form__input-container">
                                                    <input class="form__input form-control" type="password"
                                                           id="register-password-4" name="PASSWORD"
                                                           autocomplete="new-password"
                                                           data-validate="required, minlength: 6, equalto: PASSWORD_CONFIRM">
                                                </div>
                                            </div>
                                            <div class="form__form-group form-group">
                                                <label class="form__label" for="register-password-confirm-4">Повторите
                                                    пароль:</label>
                                                <div class="form__input-container">
                                                    <input class="form__input form-control" type="password"
                                                           id="register-password-confirm-4" name="PASSWORD_CONFIRM"
                                                           autocomplete="new-password"
                                                           data-validate="required, minlength: 6, equalto: PASSWORD">
                                                </div>
                                            </div>
                                            <div class="form__form-group -submit form-group">
                                                <button class="form__button -submit btn btn-primary btn-lg"
                                                        type="submit">Зарегистрироваться
                                                </button>
                                            </div>
                                            <div class="form__form-group -agreement form-group">
                                                <div class="form__agreement">Нажимая кнопку, вы соглашаетесь с условиями
                                                    <a href="#">политики обработки
                                                        персональных данных</a>
                                                </div>
                                            </div>
                                            <div class="preloader" role="status" style="transition-duration: 250ms;">
                                                <div class="preloader-spinner">

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="filter -people" id="slideout-people">
                                        <form class="form form-initialized" action="#" method="post">
                                            <div class="container">
                                                <div class="form__top">
                                                    <div class="form__inner">
                                                        <div class="form__left">
                                                            <div class="form__title">Поиск людей</div>
                                                        </div>
                                                        <div class="form__right">
                                                            <div class="form__form-group form-group">
                                                                <div class="form__message">Введите фамилию, имя,
                                                                    отчество профиля, который вы хотите найти. Если
                                                                    вы не уверенны в датах, укажите примерные.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form__items">
                                                    <div class="form__inner">
                                                        <div class="form__left">
                                                            <div class="form__row row">
                                                                <div class="form__col -fio col">
                                                                    <div class="form__form-group form-group">
                                                                        <label class="form__label"
                                                                               for="filter-people-fio">ФИО:</label>
                                                                        <div class="form__input-container">
                                                                            <input class="form__input form-control"
                                                                                   type="text" id="filter-people-fio"
                                                                                   name="FIO" placeholder=" ">
                                                                            <button class="form__button -close close"
                                                                                    type="button"></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form__right">
                                                            <div class="form__row row">
                                                                <div class="form__col -birth col">
                                                                    <div class="form__form-group form-group">
                                                                        <label class="form__label"
                                                                               for="filter-people-birth">Год
                                                                            рождения:</label>
                                                                        <div class="form__input-container">
                                                                            <input
                                                                                class="form__input form-control mask-initialized"
                                                                                type="text" id="filter-people-birth"
                                                                                name="BIRTH" placeholder="XXXX-XXXX г."
                                                                                data-mask="9999-9999" inputmode="text">
                                                                            <button class="form__button -close close"
                                                                                    type="button"></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form__col -death col">
                                                                    <div class="form__form-group form-group">
                                                                        <label class="form__label"
                                                                               for="filter-people-death">Год
                                                                            смерти:</label>
                                                                        <div class="form__input-container">
                                                                            <input
                                                                                class="form__input form-control mask-initialized"
                                                                                type="text" id="filter-people-death"
                                                                                name="DEATH" placeholder="XXXX-XXXX г."
                                                                                data-mask="9999-9999" inputmode="text">
                                                                            <button class="form__button -close close"
                                                                                    type="button"></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form__col -submit col">
                                                                    <div class="form__form-group -submit form-group">
                                                                        <button
                                                                            class="form__button -submit btn btn-primary btn-lg"
                                                                            type="submit">
                                                                            <span>Показать</span>
                                                                            <span>2 799</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="filter -places" id="slideout-places">
                                        <form class="form form-initialized" action="#" method="post">
                                            <div class="container">
                                                <div class="form__top">
                                                    <div class="form__inner">
                                                        <div class="form__left">
                                                            <div class="form__title">Поиск мест</div>
                                                        </div>
                                                        <div class="form__right">
                                                            <div class="form__form-group form-group">
                                                                <div class="form__message">Введите фамилию, имя,
                                                                    отчество профиля, который вы хотите найти. Если
                                                                    вы не уверенны в датах, укажите примерные.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form__items">
                                                    <div class="form__inner">
                                                        <div class="form__left">
                                                            <div class="form__row row">
                                                                <div class="form__col -name col">
                                                                    <div class="form__form-group form-group">
                                                                        <label class="form__label"
                                                                               for="filter-places-name">Название:</label>
                                                                        <div class="form__input-container">
                                                                            <input class="form__input form-control"
                                                                                   type="text" id="filter-places-name"
                                                                                   name="NAME" placeholder=" ">
                                                                            <button class="form__button -close close"
                                                                                    type="button"></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form__right">
                                                            <div class="form__row row">
                                                                <div class="form__col -address col">
                                                                    <div class="form__form-group form-group">
                                                                        <label class="form__label"
                                                                               for="filter-places-address">Местоположение:</label>
                                                                        <div class="form__input-container">
                                                                            <input class="form__input form-control"
                                                                                   type="text"
                                                                                   id="filter-places-address"
                                                                                   name="ADDRESS" placeholder=" ">
                                                                            <button class="form__button -close close"
                                                                                    type="button"></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form__col -submit col">
                                                                    <div class="form__form-group -submit form-group">
                                                                        <button
                                                                            class="form__button -submit btn btn-primary btn-lg"
                                                                            type="submit">
                                                                            <span>Показать</span>
                                                                            <span>2 799</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        {{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
        {{--            <div class="container">--}}
        {{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
        {{--                    {{ config('app.name', 'Laravel') }}--}}
        {{--                </a>--}}
        {{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"--}}
        {{--                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"--}}
        {{--                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
        {{--                    <span class="navbar-toggler-icon"></span>--}}
        {{--                </button>--}}

        {{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
        {{--                    <!-- Left Side Of Navbar -->--}}
        {{--                    <ul class="navbar-nav me-auto">--}}

        {{--                    </ul>--}}

        {{--                    <!-- Right Side Of Navbar -->--}}
        {{--                    <ul class="navbar-nav ms-auto">--}}
        {{--                        <!-- Authentication Links -->--}}
        {{--                        @guest--}}
        {{--                            @if (Route::has('login'))--}}
        {{--                                <li class="nav-item">--}}
        {{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
        {{--                                </li>--}}
        {{--                            @endif--}}

        {{--                            @if (Route::has('register'))--}}
        {{--                                <li class="nav-item">--}}
        {{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
        {{--                                </li>--}}
        {{--                            @endif--}}
        {{--                        @else--}}
        {{--                            <li class="nav-item dropdown">--}}
        {{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"--}}
        {{--                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
        {{--                                    {{ Auth::user()->name }}--}}
        {{--                                </a>--}}

        {{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
        {{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
        {{--                                       onclick="event.preventDefault();--}}
        {{--                                                     document.getElementById('logout-form').submit();">--}}
        {{--                                        {{ __('Logout') }}--}}
        {{--                                    </a>--}}

        {{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
        {{--                                        @csrf--}}
        {{--                                    </form>--}}
        {{--                                </div>--}}
        {{--                            </li>--}}
        {{--                        @endguest--}}
        {{--                    </ul>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </nav>--}}

        <main class="main-content" role="main">
                        @yield('content')
        </main>
        <div class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="footer__logo col-auto">
                                <span class="footer-logo__inner">
                                    <img class="footer-logo__image" src="{{ asset('img/logo/logo-light.svg') }}"
                                         alt="Логотип Memorial book">
                                </span>
                        </div>
                        <div class="footer__menu col-auto">
                            <nav class="footer-menu__container">
                                <ul class="footer-menu__list">
                                    <li class="footer-menu__item -slideout">
                                        <a class="footer-menu__link" href="./text">О проекте</a>
                                    </li>
                                    <li class="footer-menu__item">
                                        <a class="footer-menu__link" href="./tree">Семейное древо</a>
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
        <div hidden=""></div>
    </div>  </div>
</div>


</body>
</html>
