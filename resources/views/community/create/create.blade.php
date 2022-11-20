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
                <a class="breadcrumbs__link">Создание сообщества</a>
            </li>
        </ul>

        <div class="add-profile-content">
            <div>
                <h3 class="add-profile-content__title">Новое сообщество</h3>
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
            <form class="add-cemetery-wrap" id="add-community" action="{{ route('community.store') }}" method="post">
                @csrf

                @include('community.create.create_step_1')
                @include('community.create.create_step_2')
                @include('community.create.create_step_3')

                <div class="buttons-save">
                    <button type="button" class="save-draft hide btn white-btn">Сохранить как черновик</button>
                    <button type="button" class="save-and-next btn blue-btn">Сохранить и продолжить</button>

                    <button type="submit" class="save-end hide btn blue-btn">Сохранить и опубликовать</button>
                </div>

            </form>
            <p class="add-profile__text">Давайте создавать и хранить историю вместе? Для начала необходимо заполнить основную информацию профиля.</p>
        </div>
    </section>
@endsection
