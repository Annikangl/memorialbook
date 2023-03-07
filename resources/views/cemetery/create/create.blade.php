@extends('layouts.app')

@section('title')
    Новое кладбище
@endsection

@section('content')
    <section class="add-profile">
        @if (session()->has('errors'))
            @foreach($errors as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
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
                <h3 class="add-profile-content__title">Новое кладбище</h3>
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
            <form class="add-cemetery-wrap" id="add-cemetery"
                  method="post"
                  action="{{ route('cemetery.store') }}"
                  enctype="multipart/form-data">
                @csrf

                @include('cemetery.create.create_step_1')
                @include('cemetery.create.create_step_2')
                @include('cemetery.create.create_step_3')

                <div class="buttons-save">
                    <button type="button" class="save-draft hide btn white-btn">Сохранить как черновик</button>
                    <button type="button" class="save-and-next btn blue-btn">Сохранить и продолжить</button>

                    <button type="submit" class="save-end hide btn blue-btn">Сохранить и опубликовать</button>
                </div>

            </form>
            <p class="add-profile__text">Давайте создавать и хранить историю вместе? Для начала необходимо заполнить основную информацию кладбища.</p>
        </div>
    </section>

    <x-modal id="cemetery_address_location" class="inner_map" long="hystmodal__window--long">
        <div class="input-wrap" style="margin: 0 0 10px 0;">
            <div class="input-form" >
                <input type="text" class="input-text" id="cemetery_address-search"
                       name="cemetery_address"
                       placeholder="Выберите место на карте или введите адрес"
                       title="Выберите место на карте">
            </div>

        </div>
        <div class="map" style="min-height: 550px" >

        </div>
    </x-modal>

@endsection
