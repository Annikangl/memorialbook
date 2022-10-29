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
                <x-profile.step2_menu></x-profile.step2_menu>
            </div>

            <form class="add-profile-wrap" id="add-profile" method="POST" enctype="multipart/form-data" action="{{route('profile.store.step2')}}">
                @csrf

                <div class="steep">
                    <div class="steep-wrap">

                        <div class="input-wrap">
                            <span class="input-wrap__title">Фотографии и видео:</span>
                            <div class="input-photo">

                                <label class="input-photo-load">
                                    <svg style="width: 20px; height: 20px;" aria-hidden="true">
                                        <path d="M10.5 21c-.6 0-1-.4-1-1v-8.5H1c-.6 0-1-.4-1-1s.4-1 1-1h8.5V1c0-.6.4-1 1-1s1 .4 1 1v8.5H20c.6 0 1 .4 1 1s-.4 1-1 1h-8.5V20c0 .6-.4 1-1 1z"/>
                                    </svg>
                                    <span class="input-photo-load__text">Добавить фото/видео</span>
                                    <input type="file" class="load-files" name="profile-images[]" id="profile-images" accept=".jpg,.jpeg,.png,.mp4" multiple/>
                                </label>
                            </div>
                        </div>

                        <div class="input-wrap">
                            <span class="input-wrap__title">Описание:</span>
                            <textarea class="textarea-form" placeholder="Текст описания..." id="description" name="description" title=""></textarea>
                        </div>

                        <div class="input-wrap">
                            <span class="input-wrap__title">Религиозные взгляды:</span>

                            <div class="select-form">
                                <div class="select">
                                    <output class="select__output">Выберите из списка</output>
                                    <ul class="select-list">
                                        @foreach($religions as $religion)

                                        <li class="select-list__item" value="{{$religion->id}}">{{$religion->title}}</li>
                                        @endforeach


                                </div>
                                <svg aria-hidden="true" class="select-arrow">
                                    <path d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                                </svg>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="buttons-save">
                    <button type="submit" class="save-and-next">Сохранить и продолжить</button>
                </div>

            </form>
            <p class="add-profile__text">Давайте создавать и хранить историю вместе? Для начала необходимо заполнить основную информацию профиля.</p>
        </div>
    </section>


@endsection
