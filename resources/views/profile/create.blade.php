@extends('layouts.app')
@section('content')
<div class="toaster -right -top" data-toaster=""></div>
<div class="toaster -right -bottom" data-toaster="">
    <div class="alert -toast fade alert-dismissible alert-white" id="cookies-alert" role="alertdialog" aria-modal="true" data-alert="">
        <button class="alert__close close" type="button" title="Скрыть уведомление" data-alert-close=""></button>
        <div>Наш интернет-магазин работает только с юридическими лицами и индивидуальными предпринимателями. Продолжая использовать наш сайт, вы даете
            согласие на обработку файлов cookie.</div>
        <div>
            <a class="alert__link alert-link" href="../text" target="_blank">Подробнее</a>
        </div>
        <div>
            <br>
            <button class="alert__button btn btn-primary" type="button">Хорошо</button>
        </div>
    </div>
</div>
<div class="page-wrapper">
    <div class="page-wrapper-inner">
        <div class="header">
            <div class="header-top">
                <div class="container">
                    <div class="row -small">
                        <div class="header__logo -small col-auto">
                            <a class="header-logo__link" href="../" title="Перейти на главную страницу">
                                    <span class="header-logo__inner">
                                        <img class="header-logo__image" src="../assets/media/logo/logo.svg" alt="Логотип Memorial book">
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
                                        <a class="header-menu__link" href="../tree">Семейное древо</a>
                                    </li>
                                    <li class="header-menu__item -secondary">
                                        <a class="header-menu__link" href="../shop">Магазин</a>
                                    </li>
                                    <li class="header-menu__item -secondary">
                                        <a class="header-menu__link" href="../text">Заказы</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header__right -small col-auto">
                            <div class="row -small">
                                <div class="header__language -small col">
                                    <a class="header-language__button btn btn-outline-secondary" href="javascript:void(0)" role="button">RU</a>
                                </div>
                                <div class="header__personal -small col">
                                    <div class="row -small">
                                        <div class="header-personal__item -small -notifications col">
                                            <button class="header-personal__button -notifications" type="button">
                                                <div class="header-personal__icon">
                                                    <svg style="width: 18px; height: 21px;" aria-hidden="true">
                                                        <use xlink:href="../assets/media/sprite.svg?1642772414527#sprite-bell"></use>
                                                    </svg>
                                                </div>
                                                <span class="header-personal__badge badge badge-danger">1</span>
                                            </button>
                                        </div>
                                        <div class="header-personal__item -small -user col">
                                            <a class="header-personal__link" href="../profile-edit">Алексей В.Н.</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header__slideout-menu -small col">
                                    <button class="header-slideout-menu__button" type="button">
                                        <div class="header-slideout-menu__bars"></div>
                                    </button>
                                </div>
                                <div class="base-form -auth" id="slideout-auth">
                                    <form class="form" action="#" method="post" data-base-form="">
                                        <div class="form__title">Вход в&nbsp;систему</div>
                                        <div class="form__form-group form-group">
                                            <label class="form__label" for="auth-email-2">Email:</label>
                                            <div class="form__input-container">
                                                <input class="form__input form-control" type="email" id="auth-email-2" name="EMAIL" autocomplete="email"
                                                       data-validate="required, email">
                                            </div>
                                        </div>
                                        <div class="form__form-group form-group">
                                            <label class="form__label" for="auth-password-2">Пароль:</label>
                                            <div class="form__input-container">
                                                <input class="form__input form-control" type="password" id="auth-password-2" name="PASSWORD"
                                                       autocomplete="current-password" data-validate="required">
                                                <a class="form__link -right" href="#slideout-restorepass" data-slideout=""
                                                   data-slideout-options="{&quot;type&quot;:&quot;restorepass&quot;,&quot;position&quot;:&quot;top&quot;}">
                                                    Забыли пароль?</a>
                                            </div>
                                        </div>
                                        <div class="form__form-group -submit form-group">
                                            <button class="form__button -submit btn btn-primary btn-lg" type="submit">Войти</button>
                                        </div>
                                        <div class="form__form-group -bottom form-group">
                                            <a class="form__link" href="#slideout-register" data-slideout=""
                                               data-slideout-options="{&quot;type&quot;:&quot;register&quot;}">Нет аккаунта? Зарегистироваться</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="base-form -restorepass" id="slideout-restorepass">
                                    <form class="form" action="#" method="post" data-base-form="">
                                        <div class="container">
                                            <div class="form__inner">
                                                <div class="form__left">
                                                    <div class="form__title">Восстановить пароль</div>
                                                </div>
                                                <div class="form__right">
                                                    <div class="form__form-group form-group">
                                                        <div class="form__message">Если вы забыли пароль, введите email.
                                                            <br>Контрольная строка для смены пароля, а также ваши регистрационные данные, будут высланы вам
                                                            по электронной почте.
                                                        </div>
                                                    </div>
                                                    <div class="form__form-group form-group">
                                                        <label class="form__label" for="restorepass-email-3">Email:</label>
                                                        <div class="form__input-container">
                                                            <input class="form__input form-control" type="email" id="restorepass-email-3" name="EMAIL"
                                                                   autocomplete="email" data-validate="required, email">
                                                        </div>
                                                    </div>
                                                    <div class="form__form-group -submit form-group">
                                                        <button class="form__button -submit btn btn-primary" type="submit">Выслать</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="base-form -register" id="slideout-register">
                                    <form class="form" action="#" method="post" data-base-form="">
                                        <div class="form__title">Регистрация</div>
                                        <div class="form__form-group form-group">
                                            <label class="form__label" for="register-fio-4">ФИО:</label>
                                            <div class="form__input-container">
                                                <input class="form__input form-control" type="text" id="register-fio-4" name="FIO" autocomplete="name"
                                                       data-validate="required, name">
                                            </div>
                                        </div>
                                        <div class="form__form-group form-group">
                                            <label class="form__label" for="register-email-4">Email:</label>
                                            <div class="form__input-container">
                                                <input class="form__input form-control" type="email" id="register-email-4" name="EMAIL" autocomplete="email"
                                                       data-validate="required, email">
                                            </div>
                                        </div>
                                        <div class="form__form-group form-group">
                                            <label class="form__label" for="register-phone-4">Телефон:</label>
                                            <div class="form__input-container">
                                                <input class="form__input form-control" type="tel" id="register-phone-4" name="PHONE" autocomplete="tel"
                                                       data-validate="required, tel">
                                            </div>
                                        </div>
                                        <div class="form__form-group form-group">
                                            <label class="form__label" for="register-password-4">Пароль:</label>
                                            <div class="form__input-container">
                                                <input class="form__input form-control" type="password" id="register-password-4" name="PASSWORD"
                                                       autocomplete="new-password" data-validate="required, minlength: 6, equalto: PASSWORD_CONFIRM">
                                            </div>
                                        </div>
                                        <div class="form__form-group form-group">
                                            <label class="form__label" for="register-password-confirm-4">Повторите пароль:</label>
                                            <div class="form__input-container">
                                                <input class="form__input form-control" type="password" id="register-password-confirm-4"
                                                       name="PASSWORD_CONFIRM" autocomplete="new-password"
                                                       data-validate="required, minlength: 6, equalto: PASSWORD">
                                            </div>
                                        </div>
                                        <div class="form__form-group -submit form-group">
                                            <button class="form__button -submit btn btn-primary btn-lg" type="submit">Зарегистрироваться</button>
                                        </div>
                                        <div class="form__form-group -agreement form-group">
                                            <div class="form__agreement">Нажимая кнопку, вы соглашаетесь с условиями <a href="#">политики обработки
                                                    персональных данных</a>
                                            </div>
                                        </div>
                                    </form>
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
                                                            <div class="form__message">Введите фамилию, имя, отчество профиля, который вы хотите найти. Если
                                                                вы не уверенны в датах, укажите примерные.</div>
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
                                                                        <input class="form__input form-control" type="text" id="filter-people-fio"
                                                                               name="FIO" placeholder=" ">
                                                                        <button class="form__button -close close" type="button"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form__right">
                                                        <div class="form__row row">
                                                            <div class="form__col -birth col">
                                                                <div class="form__form-group form-group">
                                                                    <label class="form__label" for="filter-people-birth">Год рождения:</label>
                                                                    <div class="form__input-container">
                                                                        <input class="form__input form-control" type="text" id="filter-people-birth"
                                                                               name="BIRTH" placeholder="XXXX-XXXX г." data-mask="9999-9999">
                                                                        <button class="form__button -close close" type="button"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form__col -death col">
                                                                <div class="form__form-group form-group">
                                                                    <label class="form__label" for="filter-people-death">Год смерти:</label>
                                                                    <div class="form__input-container">
                                                                        <input class="form__input form-control" type="text" id="filter-people-death"
                                                                               name="DEATH" placeholder="XXXX-XXXX г." data-mask="9999-9999">
                                                                        <button class="form__button -close close" type="button"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form__col -submit col">
                                                                <div class="form__form-group -submit form-group">
                                                                    <button class="form__button -submit btn btn-primary btn-lg" type="submit">
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
                                                            <div class="form__message">Введите фамилию, имя, отчество профиля, который вы хотите найти. Если
                                                                вы не уверенны в датах, укажите примерные.</div>
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
                                                                        <input class="form__input form-control" type="text" id="filter-places-name"
                                                                               name="NAME" placeholder=" ">
                                                                        <button class="form__button -close close" type="button"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form__right">
                                                        <div class="form__row row">
                                                            <div class="form__col -address col">
                                                                <div class="form__form-group form-group">
                                                                    <label class="form__label" for="filter-places-address">Местоположение:</label>
                                                                    <div class="form__input-container">
                                                                        <input class="form__input form-control" type="text" id="filter-places-address"
                                                                               name="ADDRESS" placeholder=" ">
                                                                        <button class="form__button -close close" type="button"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form__col -submit col">
                                                                <div class="form__form-group -submit form-group">
                                                                    <button class="form__button -submit btn btn-primary btn-lg" type="submit">
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
            <div class="container">
                <div class="breadcrumbs">
                    <nav class="breadcrumbs__inner" aria-labelledby="breadcrumbs-title">
                        <div class="breadcrumbs__title sr-only" id="breadcrumbs-title">Навигационная цепочка</div>
                        <ul class="breadcrumbs__list">
                            <li class="breadcrumbs__item">
                                <a class="breadcrumbs__link" href="../">Главная</a>
                            </li>
                            <li class="breadcrumbs__item">
                                <a class="breadcrumbs__link" href="../profile">Личный кабинет</a>
                            </li>
                            <li class="breadcrumbs__item">
                                <span class="breadcrumbs__link">Создание профиля</span>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="profile -profile-adding">
                    <div class="profile__row row">
                        <div class="profile__side -step-info col">
                            <div class="profile__text-info">Давайте создавать и хранить историю вместе? Для начала необходимо заполнить основную информацию
                                профиля.</div>
                        </div>
                        <div class="profile__side -step-menu col">
                            <div class="profile__sidebar">
                                <h1>Новый профиль</h1>
                                <div class="profile__steps-menu">
                                    <div class="profile-steps-menu__item">
                                        <a class="profile-steps-menu-item__link -active" href="../profile-add-member">
                                            <div class="profile-steps-menu-item__icon -active"></div>
                                            <div class="profile-steps-menu-item__content">
                                                <div class="profile-steps-menu-item__title">Шаг 1</div>
                                                <div class="profile-steps-menu-item__text">Основная информация</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="profile-steps-menu__item">
                                        <a class="profile-steps-menu-item__link" href="../profile-add-member-2">
                                            <div class="profile-steps-menu-item__icon"></div>
                                            <div class="profile-steps-menu-item__content">
                                                <div class="profile-steps-menu-item__title">Шаг 2</div>
                                                <div class="profile-steps-menu-item__text">Описание</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="profile-steps-menu__item">
                                        <a class="profile-steps-menu-item__link" href="../profile-add-member-3">
                                            <div class="profile-steps-menu-item__icon"></div>
                                            <div class="profile-steps-menu-item__content">
                                                <div class="profile-steps-menu-item__title">Шаг 3</div>
                                                <div class="profile-steps-menu-item__text">Публикация</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile__side -step-content col">
                            <div class="base-form -full">
                                <form class="form" action="#" method="post" data-base-form="">
                                    <div class="profile__section">
                                        <div class="profile-section__row row">
                                            <div class="profile-section__side">
                                                <div class="profile-avatar -middle">
                                                    <div class="profile-avatar__inner">
                                                        <div class="profile-avatar__file -preview file" data-file="">
                                                            <label class="profile-avatar-file__list file-list" for="profile-image-6">
                                                                    <span class="file-item" title="Управление аватаром"
                                                                          style="background-image: url('../assets/uploads/profile/avatar-5.jpg')">
                                                                        <span class="file-name">Управление аватаром</span>
                                                                        <button class="file-cancel" type="button" title="Отменить загрузку файла">
                                                                            <svg style="width: 12px; height: 12px;" aria-hidden="true">
                                                                                <use xlink:href="../assets/media/sprite.svg?1642772414527#sprite-close"></use>
                                                                            </svg>
                                                                        </button>
                                                                    </span>
                                                            </label>
                                                            <label class="profile-avatar-file__label file-label" for="profile-image-6">
                                                                <div class="file-label-inner">
                                                                    <span>Выберите фото</span>
                                                                </div>
                                                            </label>
                                                            <input class="profile-avatar-file__input file-input sr-only" type="file" id="profile-image-6"
                                                                   value="Управление аватаром" accept=".jpg,.jpeg,.png">
                                                            <label class="profile-avatar-file__button btn btn-primary" for="profile-image-6">
                                                                <svg style="width: 22px; height: 20px;" aria-hidden="true">
                                                                    <use xlink:href="../assets/media/sprite.svg?1642772414527#sprite-photo"></use>
                                                                </svg>
                                                            </label>
                                                            <button class="profile-avatar-file__del-link js-avatar-del-link" type="button">Удалить фото
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-section__side">
                                                <div class="profile-section__row row">
                                                    <div class="profile-section__form-group -mt-0 form-group">
                                                        <label class="profile-section__label" for="new-member-name">Имя:</label>
                                                        <div class="profile-section__input-container">
                                                            <input class="profile-section__input form-control" type="text" id="new-member-name" name="name"
                                                                   value="Михаил" autofocus="" data-autofocus="" data-validate="required, name">
                                                        </div>
                                                    </div>
                                                    <div class="profile-section__form-group form-group">
                                                        <label class="profile-section__label" for="new-member-patronymic">Отчество:</label>
                                                        <div class="profile-section__input-container">
                                                            <input class="profile-section__input form-control" type="text" id="new-member-patronymic"
                                                                   name="patronymic" placeholder="Сергеевич" data-validate="required, patronymic">
                                                        </div>
                                                    </div>
                                                    <div class="profile-section__form-group form-group">
                                                        <label class="profile-section__label" for="new-member-surname">Фамилия:</label>
                                                        <div class="profile-section__input-container">
                                                            <input class="profile-section__input form-control" type="text" id="new-member-surname"
                                                                   name="surname" placeholder="Иванов" data-validate="required, surname">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile__section">
                                        <div class="profile-section__row -m-up row">
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="new-member-birth">Дата рождения:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="text" id="new-member-birth" name="birth-day"
                                                           value="24.12.1968" data-validate="required" data-mask="99.99.9999">
                                                </div>
                                            </div>
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="new-member-birth-place">Место рождения:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="text" id="new-member-birth-place"
                                                           name="birth-place" value="пос. Белгородский">
                                                </div>
                                            </div>
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="new-member-death">Дата смерти:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="text" id="new-member-death" name="death-day"
                                                           value="24.12.2001" data-mask="99.99.9999">
                                                </div>
                                            </div>
                                            <div class="profile-section__form-group -half -address form-group">
                                                <label class="profile-section__label" for="new-member-death-place">Место захоронения:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="text" id="new-member-death-place"
                                                           name="death-place" placeholder="Укажите место захоронения" readonly="" data-popup="#popup-map">
                                                    <div class="popup -map mfp-hide" role="dialog" id="popup-map" aria-hidden="true"
                                                         aria-labelledby="popup-map-title">
                                                        <div class="popup__inner">
                                                            <div class="popup__map"></div>
                                                            <div class="popup__controls -top">
                                                                <input class="popup__input form-control form-control-sm" type="text">
                                                            </div>
                                                            <div class="popup__controls -bottom">
                                                                <button class="popup__button -map-submit btn btn-primary btn-lg inactive" type="button">
                                                                    Применить местоположение</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="new-member-death-reason">Причина смерти:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="text" id="new-member-death-reason"
                                                           name="death-reason">
                                                </div>
                                            </div>
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="new-member-death-certificate">Свидетельство о смерти:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="text" id="new-member-death-certificate"
                                                           name="death-certificate">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile__section">
                                        <div class="profile-section__row -m-up row">
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="new-member-father">Отец</label>
                                                <select class="profile-section__select select" id="new-member-father" hidden="" data-select="">
                                                    <option value="0">Выберите из списка</option>
                                                    <option value="1">Алексеев Алексей Алексеевич</option>
                                                    <option value="1">Алексеев Алексей Матвеевич</option>
                                                </select>
                                            </div>
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="new-member-mother">Мать</label>
                                                <select class="profile-section__select select" id="new-member-mother" hidden="" data-select="">
                                                    <option value="0">Выберите из списка</option>
                                                    <option value="1">Каренина Анна Аркадьевна</option>
                                                    <option value="1">Облонская Анна Аркадьевна</option>
                                                </select>
                                            </div>
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="new-member-partner">Супруг / Супруга</label>
                                                <select class="profile-section__select select" id="new-member-partner" hidden="" data-select="">
                                                    <option value="0">Выберите из списка</option>
                                                    <option value="1">Дитриев Дмитрий Дмитриевич</option>
                                                    <option value="1">Андрей Дмитрий Дмитриевич</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile__bottom">
                                        <div class="profile-bottom__item">
                                            <a class="profile-bottom__button btn btn-primary" href="../profile-add-member-2">Сохранить и продолжить</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <div hidden></div>
    </div>
</div>
@endsection
