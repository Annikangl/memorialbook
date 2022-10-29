@extends('layouts.app')
@section('content')
    <div id="page">
        <section class="add-profile">
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">Главная</a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="#" class="breadcrumbs__link">Личный кабинет</a>
                </li>
                <li class="breadcrumbs__item">
                    <a class="breadcrumbs__link">Создание профиля</a>
                </li>
            </ul>

            <div class="add-profile-content">
                <div>
                    <x-profile.steps_menu></x-profile.steps_menu>
                </div>
                <form class="add-profile-wrap" id="add-profile" method="POST" enctype="multipart/form-data"
                      action="{{route('profile.store')}}">
                    @csrf
                    <div class="steep">
                        <div class="steep-wrap grid-col-2">

                            <div class="user-avatar">
                                <div class="preview-avatar">
                                    <label class="preview-avatar-wrap">
                                        <input type="file" accept=".jpg,.jpeg,.png" class="input-avatar"
                                               id="change-avatar" name="avatar"/>
                                        <span class="preview-avatar-wrap__text">Выберите фото</span>
                                    </label>
                                    <label class="preview-avatar__icon" for="change-avatar">
                                        <svg>
                                            <path class="st0"
                                                  d="M18.1 19.1h-15c-.8 0-1.6-.3-2.2-.9-.6-.6-.9-1.4-.9-2.3V6.3c0-.8.3-1.6.9-2.2s1.4-.9 2.2-.9h1c.2 0 .4 0 .5-.1.2-.1.4-.2.5-.4L6 1.4c.3-.4.7-.8 1.1-1C7.5.1 8 0 8.5 0h4.1c.5 0 1 .1 1.5.4.5.2.8.6 1.1 1l.9 1.3c.1.2.2.3.4.4s.3.1.5.1h1c.8 0 1.6.3 2.2.9.6.6.9 1.4.9 2.2v9.6c0 .8-.3 1.6-.9 2.2-.5.6-1.3 1-2.1 1zM3.1 5.2c-.3 0-.6.1-.8.3S2 6 2 6.3v9.6c0 .3.1.6.3.8.2.2.5.3.8.3H18c.3 0 .6-.1.8-.3.2-.2.3-.5.3-.8V6.3c0-.3-.1-.6-.3-.8-.2-.2-.5-.3-.8-.3h-1c-.5 0-1-.1-1.5-.4-.5-.2-.8-.6-1.1-1l-.9-1.3c-.1-.2-.2-.3-.4-.4s-.2-.1-.4-.1H8.5c-.1 0-.3 0-.5.1s-.3.3-.4.4l-.9 1.3c-.3.4-.7.8-1.1 1-.5.2-1 .4-1.5.4h-1z"/>
                                            <path class="st0"
                                                  d="M10.6 14.8c-1.1 0-2.2-.4-3-1.2-.8-.8-1.2-1.8-1.2-3 0-1.1.4-2.2 1.2-3 .8-.8 1.9-1.2 3-1.2s2.2.4 3 1.2c.8.8 1.2 1.9 1.2 3s-.4 2.2-1.2 3-1.9 1.2-3 1.2zm0-6.4c-.6 0-1.1.2-1.6.6-.4.4-.6 1-.6 1.6 0 .6.2 1.1.6 1.6.8.8 2.3.8 3.1 0 .4-.4.6-1 .6-1.6s-.2-1.1-.6-1.6c-.3-.4-.9-.6-1.5-.6z"/>
                                        </svg>
                                    </label>
                                </div>
                                <button type="button" class="delete-avatar hide">Удалить фото</button>
                            </div>

                            <div class="input-wrap">
                                <span class="input-wrap__title">Имя:</span>
                                <div class="input-form">
                                    <input type="text" class="input-text input-required" placeholder="Иван"
                                           id="first_name" name="first_name" title="">
                                </div>
                            </div>

                            <div class="input-wrap">
                                <span class="input-wrap__title">Отчество:</span>
                                <div class="input-form">
                                    <input type="text" class="input-text input-required" placeholder="Иванович"
                                           id="patronymic" name="patronymic" title="">
                                </div>
                            </div>

                            <div class="input-wrap">
                                <span class="input-wrap__title">Фамилия:</span>
                                <div class="input-form">
                                    <input type="text" class="input-text input-required" placeholder="Иванов"
                                           id="last_name" name="last_name" title="">
                                </div>
                            </div>

                        </div>
                        <div class="steep-wrap grid-col-2">
                            <div class="input-wrap">
                                <span class="input-wrap__title">Дата рождения:</span>
                                <div class="input-form">
                                    <input type="date" class="input-text input-required mask-data"
                                           placeholder="дд.мм.гггг" id="date_birth" name="date_birth" title="">
                                </div>
                            </div>
                            <div class="input-wrap">
                                <span class="input-wrap__title">Место рождения:</span>
                                <div class="input-form">
                                    <input type="text" class="input-text" name="birth_place" title="">
                                </div>
                            </div>
                            <div class="input-wrap">
                                <span class="input-wrap__title">Дата смерти:</span>
                                <div class="input-form">
                                    <input type="date" class="input-text mask-data" placeholder="дд.мм.гггг"
                                           id="date_death" name="date_death" title="">
                                </div>
                            </div>
                            <div class="input-wrap">
                                <span class="input-wrap__title">Место захоронения:</span>
                                <div class="input-form">
{{--                                    <input type="text" class="input-text" placeholder="Укажите место захоронения"--}}
{{--                                           id="burial_place" name="burial_place" title="">--}}
{{--                                </div>--}}
                                <a class="open_modal" href="#open">Укажите место захоронения</a>
                                <div id="modal" class="modal bounceIn">
                                    <div id="close_modal">+</div>
                                    <div class="modal_txt">Текст в модальном окне</div>
                                </div>
                                </div>
                            </div>



{{--    ***Со старой верстки--}}
{{--                            <div class="profile-section__form-group -half -address form-group">--}}
{{--                                <label class="profile-section__label" for="burial_place">Место захоронения:</label>--}}
{{--                                <div class="profile-section__input-container">--}}
{{--                                    <input class="profile-section__input form-control" type="text" id="burial_place"--}}
{{--                                           name="burial_place" placeholder="Укажите место захоронения" readonly=""--}}
{{--                                           data-popup="#popup-map">--}}
{{--                                    <div class="popup -map mfp-hide" role="dialog" id="popup-map" aria-hidden="true"--}}
{{--                                         aria-labelledby="popup-map-title">--}}
{{--                                        <div class="popup__inner">--}}
{{--                                            <div class="popup__map"></div>--}}
{{--                                            <div class="popup__controls -top">--}}
{{--                                                <input class="popup__input form-control form-control-sm" type="text">--}}
{{--                                            </div>--}}
{{--                                            <div class="popup__controls -bottom">--}}
{{--                                                <button--}}
{{--                                                    class="popup__button -map-submit btn btn-primary btn-lg inactive"--}}
{{--                                                    type="button">--}}
{{--                                                    Применить местоположение--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--    ***Со старой верстки--}}

                            <div class="input-wrap">
                                <span class="input-wrap__title">Причина смерти:</span>
                                <div class="input-form">
                                    <input type="text" class="input-text" id="death_reason" name="death_reason"
                                           title="">
                                </div>
                            </div>
                            <div class="input-wrap">
                                <span class="input-wrap__title">Свидетельство о смерти:</span>
                                <div class="input-form">
                                    <input type="file" class="load-files" id="death_certificate" name="death_certificate">
                                </div>
                            </div>
                        </div>

                        <div class="steep-wrap grid-col-2">
                            <div class="input-wrap">
                                <span class="input-wrap__title">Отец</span>
                                <div class="select-form">
                                    <div class="select">
                                        <output class="select__output" name="">Выберите из списка</output>
                                        <ul class="select-list">
                                            @foreach($fathers as $father)
                                            <li class="select-list__item" data-name="father_id" id="father_id">{{$father->first_name.' '.$father->last_name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <svg aria-hidden="true" class="select-arrow">
                                        <path
                                            d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="input-wrap">
                                <span class="input-wrap__title">Мать</span>

                                <div class="select-form">
                                    <div class="select">
                                        <output class="select__output" name="">Выберите из списка</output>
                                        <ul class="select-list">
                                            @foreach($mothers as $mother)
                                            <li class="select-list__item" data-name="mother_id" id="mother_id">{{$mother->first_name.' '.$mother->last_name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <svg aria-hidden="true" class="select-arrow">
                                        <path
                                            d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="input-wrap">
                                <span class="input-wrap__title">Супруг / Супруга</span>

                                <div class="select-form">
                                    <div class="select">
                                        <output class="select__output" name="">Выберите из списка</output>
                                        <ul class="select-list">
                                            @foreach($profiles as $profile)
                                                <li class="select-list__item" data-name="spouse_id" id="spouse_id">
                                                    {{$profile->first_name.' '.$profile->last_name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <svg aria-hidden="true" class="select-arrow">
                                        <path
                                            d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                                    </svg>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="buttons-save">
                        <button type="submit" class="save-and-next">Сохранить и продолжить</button>
                    </div>

                </form>
                <p class="add-profile__text">Давайте создавать и хранить историю вместе? Для начала необходимо заполнить
                    основную информацию профиля.</p>
            </div>
        </section>
    </div>


<script>
    let select = function() {
        let selects = document.querySelectorAll('.select-form');
        let items = document.querySelectorAll('.select-list__item');

        for (let select of selects) {
            select.addEventListener('click', function () {
                select.classList.toggle('focus-select');
            })
        }

        window.addEventListener('click', function (event) {
            if (!event.target.closest('.select-form')) {
                let focusSelects = document.querySelectorAll('.focus-select');

                for (let select of focusSelects) {
                    select.classList.remove('focus-select');
                }

            }
        })

        for (let item of items) {
            item.addEventListener('click', function () {
                item.parentElement.previousElementSibling.setAttribute('name',item.getAttribute('data-name'))
                item.parentElement.previousElementSibling.innerHTML = item.innerHTML;
            })
        }
    }
    if (document.querySelector('.select-form')) {
        select();
    }


</script>
    {{--    <section class="add-profile">--}}

    {{--            <p class="add-profile__text">Давайте создавать и хранить историю вместе? Для начала необходимо заполнить основную информацию профиля.</p>--}}
    {{--        </div>--}}
    {{--    </section>--}}



    {{--            <div class="container">--}}
    {{--                <div class="breadcrumbs">--}}
    {{--                    <nav class="breadcrumbs__inner" aria-labelledby="breadcrumbs-title">--}}
    {{--                        <div class="breadcrumbs__title sr-only" id="breadcrumbs-title">Навигационная цепочка</div>--}}
    {{--                        <ul class="breadcrumbs__list">--}}
    {{--                            <li class="breadcrumbs__item">--}}
    {{--                                <a class="breadcrumbs__link" href="../">Главная</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="breadcrumbs__item">--}}
    {{--                                <a class="breadcrumbs__link" href="../profile">Личный кабинет</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="breadcrumbs__item">--}}
    {{--                                <span class="breadcrumbs__link">Создание профиля</span>--}}
    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                    </nav>--}}
    {{--                </div>--}}
    {{--                <div class="profile -profile-adding">--}}
    {{--                    <div class="profile__row row">--}}
    {{--                        <div class="profile__side -step-info col">--}}
    {{--                            <div class="profile__text-info">Давайте создавать и хранить историю вместе? Для начала необходимо заполнить основную информацию--}}
    {{--                                профиля.--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <x-profile.steps_menu></x-profile.steps_menu>--}}

    {{--                        <div class="profile__side -step-content col">--}}
    {{--                            <div class="base-form -full">--}}
    {{--                                <form method="POST" enctype="multipart/form-data" action="{{route('profile.store')}}">--}}
    {{--                                    @csrf--}}
    {{--                                    <div class="profile__section">--}}
    {{--                                        <div class="profile-section__row row">--}}
    {{--                                            <div class="profile-section__side">--}}
    {{--                                                <div class="profile-avatar -middle">--}}
    {{--                                                    <div class="profile-avatar__inner">--}}
    {{--                                                        <div class="profile-avatar__file -preview file" data-file="">--}}
    {{--                                                            <label class="profile-avatar-file__list file-list" for="avatar">--}}
    {{--                                                                    <span class="file-item" title="Управление аватаром">--}}
    {{--                                                                        <span class="file-name">Управление аватаром</span>--}}
    {{--                                                                        <button class="file-cancel" type="button" title="Отменить загрузку файла">--}}
    {{--                                                                            <svg style="width: 12px; height: 12px;" aria-hidden="true">--}}
    {{--                                                                                <use xlink:href="../assets/media/sprite.svg?1642772414527#sprite-close"></use>--}}
    {{--                                                                            </svg>--}}
    {{--                                                                        </button>--}}
    {{--                                                                    </span>--}}
    {{--                                                            </label>--}}
    {{--                                                            <label class="profile-avatar-file__label file-label" for="avatar">--}}
    {{--                                                                <div class="file-label-inner">--}}
    {{--                                                                    <span>Выберите фото</span>--}}
    {{--                                                                </div>--}}
    {{--                                                            </label>--}}
    {{--                                                            <input class="profile-avatar-file__input file-input sr-only" type="file" name="avatar" id="avatar" accept=".jpg,.jpeg,.png">--}}
    {{--                                                            <label class="profile-avatar-file__button btn btn-primary" for="avatar">--}}
    {{--                                                                <svg style="width: 22px; height: 20px;" aria-hidden="true">--}}
    {{--                                                                    <use xlink:href="../assets/media/sprite.svg?1642772414527#sprite-photo"></use>--}}
    {{--                                                                </svg>--}}
    {{--                                                            </label>--}}
    {{--                                                            <button class="profile-avatar-file__del-link js-avatar-del-link" type="button">Удалить фото--}}
    {{--                                                            </button>--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="profile-section__side">--}}
    {{--                                                <div class="profile-section__row row">--}}
    {{--                                                    <div class="profile-section__form-group -mt-0 form-group">--}}
    {{--                                                        <label class="profile-section__label" for="first_name">Имя:</label>--}}
    {{--                                                        <div class="profile-section__input-container">--}}
    {{--                                                            <input class="profile-section__input form-control" type="text" id="first_name" name="first_name"--}}
    {{--                                                                  autofocus="" data-autofocus="" data-validate="required, first_name">--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
    {{--                                                    <div class="profile-section__form-group form-group">--}}
    {{--                                                        <label class="profile-section__label" for="patronymic">Отчество:</label>--}}
    {{--                                                        <div class="profile-section__input-container">--}}
    {{--                                                            <input class="profile-section__input form-control" type="text" id="patronymic"--}}
    {{--                                                                   name="patronymic" data-validate="required, patronymic">--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
    {{--                                                    <div class="profile-section__form-group form-group">--}}
    {{--                                                        <label class="profile-section__label" for="last_name">Фамилия:</label>--}}
    {{--                                                        <div class="profile-section__input-container">--}}
    {{--                                                            <input class="profile-section__input form-control" type="text" id="last_name"--}}
    {{--                                                                   name="last_name" data-validate="required, last_name">--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="profile__section">--}}
    {{--                                        <div class="profile-section__row -m-up row">--}}
    {{--                                            <div class="profile-section__form-group -half form-group">--}}
    {{--                                                <label class="profile-section__label" for="date_birth">Дата рождения:</label>--}}
    {{--                                                <div class="profile-section__input-container">--}}
    {{--                                                    <input class="profile-section__input form-control" type="date" id="date_birth" name="date_birth"--}}
    {{--                                                           data-validate="required">--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="profile-section__form-group -half form-group">--}}
    {{--                                                <label class="profile-section__label" for="birth_place">Место рождения:</label>--}}
    {{--                                                <div class="profile-section__input-container">--}}
    {{--                                                    <input class="profile-section__input form-control" type="text" id="birth_place"--}}
    {{--                                                           name="birth_place" value="">--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="profile-section__form-group -half form-group">--}}
    {{--                                                <label class="profile-section__label" for="date_death">Дата смерти:</label>--}}
    {{--                                                <div class="profile-section__input-container">--}}
    {{--                                                    <input class="profile-section__input form-control" type="date" id="date_death" name="date_death">--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="profile-section__form-group -half -address form-group">--}}
    {{--                                                <label class="profile-section__label" for="burial_place">Место захоронения:</label>--}}
    {{--                                                <div class="profile-section__input-container">--}}
    {{--                                                    <input class="profile-section__input form-control" type="text" id="burial_place"--}}
    {{--                                                           name="burial_place" placeholder="Укажите место захоронения" readonly="" data-popup="#popup-map">--}}
    {{--                                                    <div class="popup -map mfp-hide" role="dialog" id="popup-map" aria-hidden="true"--}}
    {{--                                                         aria-labelledby="popup-map-title">--}}
    {{--                                                        <div class="popup__inner">--}}
    {{--                                                            <div class="popup__map"></div>--}}
    {{--                                                            <div class="popup__controls -top">--}}
    {{--                                                                <input class="popup__input form-control form-control-sm" type="text">--}}
    {{--                                                            </div>--}}
    {{--                                                            <div class="popup__controls -bottom">--}}
    {{--                                                                <button class="popup__button -map-submit btn btn-primary btn-lg inactive" type="button">--}}
    {{--                                                                    Применить местоположение</button>--}}
    {{--                                                            </div>--}}
    {{--                                                        </div>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="profile-section__form-group -half form-group">--}}
    {{--                                                <label class="profile-section__label" for="death_reason">Причина смерти:</label>--}}
    {{--                                                <div class="profile-section__input-container">--}}
    {{--                                                    <input class="profile-section__input form-control" type="text" id="death_reason"--}}
    {{--                                                           name="death_reason">--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="profile-section__form-group -half form-group">--}}
    {{--                                                <label class="profile-section__label" for="death_certificate">Свидетельство о смерти:</label>--}}
    {{--                                                <div class="profile-section__input-container">--}}
    {{--                                                    <input class="profile-section__input form-control" type="file" id="death_certificate"--}}
    {{--                                                           name="death_certificate">--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="profile__section">--}}
    {{--                                        <div class="profile-section__row -m-up row">--}}
    {{--                                            <div class="profile-section__form-group -half form-group">--}}
    {{--                                                <label class="profile-section__label" for="father_id">Отец</label>--}}
    {{--                                                <select class="profile-section__select select" id="father_id" name="father_id" hidden="" data-select="">--}}
    {{--                                                    <option value="">Выберите из списка</option>--}}
    {{--                                                    @foreach($fathers as $father)--}}
    {{--                                                    <option value="{{$father->id}}" id="father_id" name="father_id">{{$father->first_name.' '.$father->last_name}}</option>--}}
    {{--                                                    @endforeach--}}
    {{--                                                </select>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="profile-section__form-group -half form-group">--}}
    {{--                                                <label class="profile-section__label" for="mother_id">Мать</label>--}}
    {{--                                                <select class="profile-section__select select" id="mother_id" name="mother_id" hidden="" data-select="">--}}
    {{--                                                    <option value="">Выберите из списка</option>--}}
    {{--                                                    @foreach($mothers as $mother)--}}
    {{--                                                    <option value="{{$mother->id}}" id="mother_id" name="mother_id">{{$mother->first_name.' '.$mother->last_name}}</option>--}}
    {{--                                                    @endforeach--}}
    {{--                                                </select>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="profile-section__form-group -half form-group">--}}
    {{--                                                <label class="profile-section__label" for="spouse_id">Супруг / Супруга</label>--}}
    {{--                                                <select class="profile-section__select select" id="spouse_id" name="spouse_id" hidden="" data-select="">--}}
    {{--                                                    <option value="">Выберите из списка</option>--}}
    {{--                                                    @foreach($profiles as $profile)--}}
    {{--                                                    <option value="{{$profile->id}}" id="spouse_id" name="spouse_id">{{$profile->first_name.' '.$profile->last_name}}</option>--}}
    {{--                                                    @endforeach--}}
    {{--                                                </select>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="profile__bottom">--}}
    {{--                                        <div class="profile-bottom__item">--}}
    {{--                                            <button class="profile-bottom__button btn btn-primary">Сохранить и продолжить</button>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </form>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
@endsection
