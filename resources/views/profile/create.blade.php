@extends('layouts.app')
@section('content')

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

                        <x-profile.steps_menu></x-profile.steps_menu>

                        <div class="profile__side -step-content col">
                            <div class="base-form -full">

                                <form method="POST" enctype="multipart/form-data" action="{{route('profile.store')}}">
                                    @csrf
                                    <div class="profile__section">
                                        <div class="profile-section__row row">
                                            <div class="profile-section__side">
                                                <div class="profile-avatar -middle">
                                                    <div class="profile-avatar__inner">
                                                        <div class="profile-avatar__file -preview file" data-file="">
                                                            <label class="profile-avatar-file__list file-list" for="avatar">
                                                                    <span class="file-item" title="Управление аватаром">
                                                                        <span class="file-name">Управление аватаром</span>
                                                                        <button class="file-cancel" type="button" title="Отменить загрузку файла">
                                                                            <svg style="width: 12px; height: 12px;" aria-hidden="true">
                                                                                <use xlink:href="../assets/media/sprite.svg?1642772414527#sprite-close"></use>
                                                                            </svg>
                                                                        </button>
                                                                    </span>
                                                            </label>
                                                            <label class="profile-avatar-file__label file-label" for="avatar">
                                                                <div class="file-label-inner">
                                                                    <span>Выберите фото</span>
                                                                </div>
                                                            </label>
                                                            <input class="profile-avatar-file__input file-input sr-only" type="file" name="avatar" id="avatar" accept=".jpg,.jpeg,.png">
                                                            <label class="profile-avatar-file__button btn btn-primary" for="avatar">
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
                                                            <input class="profile-section__input form-control" type="text" id="name" name="name"
                                                                  autofocus="" data-autofocus="" data-validate="required, name">
                                                        </div>
                                                    </div>
                                                    <div class="profile-section__form-group form-group">
                                                        <label class="profile-section__label" for="patronymic">Отчество:</label>
                                                        <div class="profile-section__input-container">
                                                            <input class="profile-section__input form-control" type="text" id="patronymic"
                                                                   name="patronymic" data-validate="required, patronymic">
                                                        </div>
                                                    </div>
                                                    <div class="profile-section__form-group form-group">
                                                        <label class="profile-section__label" for="new-member-surname">Фамилия:</label>
                                                        <div class="profile-section__input-container">
                                                            <input class="profile-section__input form-control" type="text" id="surname"
                                                                   name="surname" data-validate="required, surname">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile__section">
                                        <div class="profile-section__row -m-up row">
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="date_birth">Дата рождения:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="date" id="date_birth" name="date_birth"
                                                           data-validate="required">
                                                </div>
                                            </div>
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="place_birth">Место рождения:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="text" id="place_birth"
                                                           name="place_birth" value="">
                                                </div>
                                            </div>
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="date_death">Дата смерти:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="date" id="date_death" name="date_death">
                                                </div>
                                            </div>
                                            <div class="profile-section__form-group -half -address form-group">
                                                <label class="profile-section__label" for="burial_place">Место захоронения:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="text" id="burial_place"
                                                           name="burial_place" placeholder="Укажите место захоронения" readonly="" data-popup="#popup-map">
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
                                                <label class="profile-section__label" for="reason_death">Причина смерти:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="text" id="reason_death"
                                                           name="reason_death">
                                                </div>
                                            </div>
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="death_certificate">Свидетельство о смерти:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="file" id="death_certificate"
                                                           name="death_certificate">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile__section">
                                        <div class="profile-section__row -m-up row">
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="id_father">Отец</label>
                                                <select class="profile-section__select select" id="id_father" hidden="" data-select="">
                                                    <option value="0">Выберите из списка</option>
                                                    <option value="1">Алексеев Алексей Алексеевич</option>
                                                    <option value="1">Алексеев Алексей Матвеевич</option>
                                                </select>
                                            </div>
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="id_mother">Мать</label>
                                                <select class="profile-section__select select" id="id_mother" hidden="" data-select="">
                                                    <option value="0">Выберите из списка</option>
                                                    <option value="1">Каренина Анна Аркадьевна</option>
                                                    <option value="1">Облонская Анна Аркадьевна</option>
                                                </select>
                                            </div>
                                            <div class="profile-section__form-group -half form-group">
                                                <label class="profile-section__label" for="id_spouse">Супруг / Супруга</label>
                                                <select class="profile-section__select select" id="id_spouse" hidden="" data-select="">
                                                    <option value="0">Выберите из списка</option>
                                                    <option value="1">Дитриев Дмитрий Дмитриевич</option>
                                                    <option value="1">Андрей Дмитрий Дмитриевич</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile__bottom">
                                        <div class="profile-bottom__item">
                                            <button class="profile-bottom__button btn btn-primary">Сохранить и продолжить</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


@endsection
