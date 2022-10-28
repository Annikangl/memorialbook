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

            <x-profile.step3_menu></x-profile.step3_menu>

            <div class="profile__side -step-content col">
                <div class="base-form -full">
                    <form class="form" method="POST" enctype="multipart/form-data" action="{{route('profile.store.step3')}}">
                        @csrf
                        <div class="profile__section">
                            <div class="profile-section__row row">
                                <div class="profile-section__side -avatar">
                                    <div class="profile-avatar -small">
                                        <div class="profile-avatar__inner">
                                            <div class="profile-avatar__image-container">
                                                <img class="profile-avatar__image" src="{{asset('storage/'.$profile_step1['avatar'])}}" alt="Аватар">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-section__side -content">
                                    <div class="profile__total-info">
                                        <h2 class="profile-total-info__title">{{$profile_step1['first_name'].' '
                                                        . $profile_step1['last_name'].' '.$profile_step1['patronymic']}}</h2>
                                        <div class="profile-total-info__content">
                                            <div class="profile-total-info__text">Статус модерации:</div>
                                            <div class="profile-total-info__text -error">Публикация отклонена 14:31 22.10.2021</div>
                                        </div>
                                        <div class="profile-total-info__content">
                                            <div class="profile-total-info__text">Свидетельство о смерти не соответствует установленному образцу
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile__section">
                            <div class="profile-section__row row">
                                <div class="profile-section__form-group -mt-0 form-group">
                                    <label class="profile-section__label">Настройки публичного доступа к профилю:</label>
                                </div>
                                <div class="profile-section__form-group -col-3 form-group">
                                    <div class="profile-section__form-check form-check radio">
                                        <label class="profile-section-form-check__label form-check-label" for="new-member-access-1">
                                            <input class="profile-section-form-check__input form-check-input" checked=""
                                                   name="new-member-access" id="new-member-access-1" type="radio">
                                            <span class="profile-section-form-check__content form-check-content">
                                                                <span class="form-check-title">Открытый </span>
                                                                <span class="form-check-text">Данные профиля видят все пользователи</span>
                                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="profile-section__form-group -col-3 form-group">
                                    <div class="profile-section__form-check form-check radio">
                                        <label class="profile-section-form-check__label form-check-label" for="new-member-access-2">
                                            <input class="profile-section-form-check__input form-check-input" name="new-member-access"
                                                   id="new-member-access-2" type="radio">
                                            <span class="profile-section-form-check__content form-check-content">
                                                                <span class="form-check-title">Доступный</span>
                                                                <span class="form-check-text">Часть данных профиля скрыты: место захоронения, родственники
                                                                </span>
                                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="profile-section__form-group -col-3 form-group">
                                    <div class="profile-section__form-check form-check radio">
                                        <label class="profile-section-form-check__label form-check-label" for="new-member-access-3">
                                            <input class="profile-section-form-check__input form-check-input" name="new-member-access"
                                                   id="new-member-access-3" type="radio">
                                            <span class="profile-section-form-check__content form-check-content">
                                                                <span class="form-check-title">Закрытый</span>
                                                                <span class="form-check-text">Профиль вижу только я</span>
                                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile__bottom">
                            <div class="profile-bottom__item">
                                <a class="profile-bottom__button btn btn-outline-primary" href="javascript:void(0)" role="button">Сохранить как
                                    черновик</a>
                            </div>
                            <div class="profile-bottom__item">
                                <button class="profile-bottom__button btn btn-primary" >Сохранить и
                                    опубликовать</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
