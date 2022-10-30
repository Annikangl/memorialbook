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
                    <div>
                        <h3 class="add-profile-content__title">Новый профиль</h3>
                        <ul class="steeps-nav">
                            <li class="steeps-nav__item active current">
                                <i class="steeps-nav__icon"></i>
                                <span class="steeps-nav__title">Шаг 1</span>
                                <p class="steeps-nav__desc">Основная информация</p>
                            </li>
                            <li class="steeps-nav__item">
                                <i class="steeps-nav__icon"></i>
                                <span class="steeps-nav__title">Шаг 2</span>
                                <p class="steeps-nav__desc">Описание</p>
                            </li>
                            <li class="steeps-nav__item">
                                <i class="steeps-nav__icon"></i>
                                <span class="steeps-nav__title">Шаг 3</span>
                                <p class="steeps-nav__desc">Публикация</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <form class="add-profile-wrap" id="add-profile" method="POST" enctype="multipart/form-data"
                      action="{{ route('profile.store' )}}">
                    @csrf

                    @include('profile.partials.create_step1')

                    @include('profile.partials.create_step2')

                    @include('profile.partials.create_step3')

                    <div class="buttons-save">
                        <button type="button" class="save-draft hide">Сохранить как черновик</button>
                        <button type="button" class="save-and-next">Сохранить и продолжить</button>

                        <button type="submit" class="save-end hide">Сохранить и опубликовать</button>
                    </div>

                </form>
                <p class="add-profile__text">Давайте создавать и хранить историю вместе? Для начала необходимо заполнить
                    основную информацию профиля.</p>
            </div>

            <x-modal id="burial_place_location" class="inner_map" >
                <div class="input-wrap">
                    <div class="input-form">
                        <input type="text" class="input-text" id="burial_place_search"
                               placeholder="Найдите место на карте"
                               title="">
                    </div>
                </div>
                <div class="map-wrap__inner" >

                </div>
            </x-modal>

        </section>
    </div>
@endsection
