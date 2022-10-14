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
            assetsPath: './assets/media/',
            gmapsApikey: 'AIzaSyDCgArix6diJwCToFgNcbDATib9ZrgYcBo'
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
                                                        <img src="{{ asset('assets/media/media/sprite-bell.svg') }}" alt="notification" width="18px" height="21px">
{{--                                                        <svg style="width: 18px; height: 21px;" aria-hidden="true">--}}
{{--                                                            <use xlink:href="{{ asset('assets/media/media/sprite-bell.svg') }}"></use>--}}
{{--                                                        </svg>--}}
                                                    </div>
                                                    <span class="header-personal__badge badge badge-danger">1</span>
                                                </button>
                                            </div>
                                            <div class="header-personal__item -small -user col">
                                                <a class="header-personal__link" href="../profile-edit">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
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
                                <div class="base-form -auth" id="slideout-auth">
                                    <form class="form" action="{{ route('login') }}" method="post" data-base-form="">
                                        @csrf

                                        <div class="form__title">Вход в&nbsp;систему</div>
                                        <div class="form__form-group form-group">
                                            <label class="form__label" for="auth-email-2">Email:</label>
                                            <div class="form__input-container">
                                                <input class="form__input form-control" type="email" id="auth-email-2"
                                                       name="EMAIL" autocomplete="email"
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
                                            <button class="form__button -submit btn btn-primary btn-lg" type="submit">
                                                Войти
                                            </button>
                                        </div>
                                        <div class="form__form-group -bottom form-group">
                                            <a class="form__link" href="#slideout-register" data-slideout=""
                                               data-slideout-options="{&quot;type&quot;:&quot;register&quot;}">Нет
                                                аккаунта? Зарегистироваться</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="base-form -restorepass" id="slideout-restorepass">
                                    <form class="form" action="{{ route('password.email') }}" method="post" data-base-form="">
                                        @csrf
                                        <div class="container">
                                            <div class="form__inner">
                                                <div class="form__left">
                                                    <div class="form__title">Восстановить пароль</div>
                                                </div>
                                                <div class="form__right">
                                                    <div class="form__form-group form-group">
                                                        <div class="form__message">Если вы забыли пароль, введите email.
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
                                                                   autocomplete="email" data-validate="required, email">
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
                                    </form>
                                </div>
                                <div class="base-form -register" id="slideout-register">
                                    <form class="form" action="{{ route('register') }}" method="post" data-base-form="">
                                        @csrf
                                        <div class="form__title">Регистрация</div>
                                        <div class="form__form-group form-group">
                                            <label class="form__label" for="register-fio-4">ФИО:</label>
                                            <div class="form__input-container">
                                                <input class="form__input form-control" type="text" id="register-fio-4"
                                                       name="FIO" autocomplete="name"
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
                                                <input class="form__input form-control" type="tel" id="register-phone-4"
                                                       name="PHONE" autocomplete="tel"
                                                       data-validate="required, tel">
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
                                                       id="register-password-confirm-4"
                                                       name="PASSWORD_CONFIRM" autocomplete="new-password"
                                                       data-validate="required, minlength: 6, equalto: PASSWORD">
                                            </div>
                                        </div>
                                        <div class="form__form-group -submit form-group">
                                            <button class="form__button -submit btn btn-primary btn-lg" type="submit">
                                                Зарегистрироваться
                                            </button>
                                        </div>
                                        <div class="form__form-group -agreement form-group">
                                            <div class="form__agreement">Нажимая кнопку, вы соглашаетесь с условиями <a
                                                    href="#">политики обработки
                                                    персональных данных</a>
                                            </div>
                                        </div>
                                    </form>
                                    @include('auth.partials.socials')
                                </div>
                                <div class="filter -people" id="slideout-people">
                                    <form class="form" action="#" method="post">
                                        <div class="container">
                                            <div class="form__top">
                                                <div class="form__inner">
                                                    <div class="form__left">
                                                        <div class="form__title">Поиск людей</div>
                                                    </div>
                                                    <div class="form__right">
                                                        <div class="form__form-group form-group">
                                                            <div class="form__message">Введите фамилию, имя, отчество
                                                                профиля, который вы хотите найти. Если
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
                                                                    <label class="form__label" for="filter-people-fio">ФИО:</label>
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
                                                                        <input class="form__input form-control"
                                                                               type="text" id="filter-people-birth"
                                                                               name="BIRTH" placeholder="XXXX-XXXX г."
                                                                               data-mask="9999-9999">
                                                                        <button class="form__button -close close"
                                                                                type="button"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form__col -death col">
                                                                <div class="form__form-group form-group">
                                                                    <label class="form__label"
                                                                           for="filter-people-death">Год смерти:</label>
                                                                    <div class="form__input-container">
                                                                        <input class="form__input form-control"
                                                                               type="text" id="filter-people-death"
                                                                               name="DEATH" placeholder="XXXX-XXXX г."
                                                                               data-mask="9999-9999">
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
                                    <form class="form" action="#" method="post">
                                        <div class="container">
                                            <div class="form__top">
                                                <div class="form__inner">
                                                    <div class="form__left">
                                                        <div class="form__title">Поиск мест</div>
                                                    </div>
                                                    <div class="form__right">
                                                        <div class="form__form-group form-group">
                                                            <div class="form__message">Введите фамилию, имя, отчество
                                                                профиля, который вы хотите найти. Если
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
                                                                    <label class="form__label" for="filter-places-name">Название:</label>
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
                                                                               type="text" id="filter-places-address"
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

        <main class="main-content" role="main">
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
    </div>
</div>

@yield('scripts')


</body>
</html>
