@extends('layouts.app')
@section('content')
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
                <x-profile.step3_menu></x-profile.step3_menu>
            </div>
            <form class="add-profile-wrap" id="add-profile" method="POST" enctype="multipart/form-data" action="{{route('profile.store.step3')}}">
                @csrf
                <div class="steep">

                    <div class="steep-wrap grid-col-2_3">
                        <div class="user-current-avatar"></div>
                        <div class="user-total-info">
                            <h3 class="user-total-info__name">Иванов Михаил Сергеевич</h3>

                            <div class="status-moderation">
                                <span class="status-moderation__title">Статус модерации:</span>
                                <p class="status-moderation__text -status-error">Публикация отклонена 14:31 22.10.2021</p>
                            </div>

                            <p class="moderation-text">Свидетельство о смерти не соответствует установленному образцу</p>
                        </div>
                    </div>
                    <div class="steep-wrap">
                        <span class="text-public">Настройки публичного доступа к профилю:</span>
                        <ul class="settings-public">
                            <li class="settings-public__item">
                                <label class="settings-wrap">
                                    <input type="radio" class="settings-wrap__radio"  name="settings-public" value="Открытый" checked/>
                                    <span class="settings-wrap__title">Открытый</span>
                                    <span class="settings-wrap__desc">Данные профиля видят все пользователи</span>
                                </label>
                            </li>
                            <li class="settings-public__item">
                                <label class="settings-wrap">
                                    <input type="radio" class="settings-wrap__radio" name="settings-public" value="Доступный"/>
                                    <span class="settings-wrap__title">Доступный</span>
                                    <span class="settings-wrap__desc">Часть данных профиля скрыты: место захоронения, родственники</span>
                                </label>
                            </li>
                            <li class="settings-public__item">
                                <label class="settings-wrap">
                                    <input type="radio" class="settings-wrap__radio" name="settings-public" value="Закрытый"/>
                                    <span class="settings-wrap__title">Закрытый</span>
                                    <span class="settings-wrap__desc">Профиль вижу только я</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="buttons-save">
                    <button type="submit" class="save-draft hide">Сохранить как черновик</button>
                    <button type="submit" class="save-and-next">Сохранить и продолжить</button>
                </div>

            </form>
            <p class="add-profile__text">Давайте создавать и хранить историю вместе? Для начала необходимо заполнить основную информацию профиля.</p>
        </div>
    </section>


@endsection
