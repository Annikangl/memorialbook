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

            <x-profile.step2_menu></x-profile.step2_menu>

            <div class="profile__side -step-content col">
                <div class="base-form -full">
                    <form class="form" method="POST" enctype="multipart/form-data" action="{{route('profile.store.step2')}}">
                        @csrf
                        <div class="profile__section">
                            <div class="profile-section__row row">
                                <div class="profile-section__form-group -mt-0 form-group">
                                    <label class="profile-section__label">Фотографии и видео: </label>
                                    <div class="profile-section__file -multiple -preview -filename -multimedia file" data-file=""
                                         data-file-options="{&quot;max&quot;:100}">
                                        <label class="profile-section-file__list file-list" for="profile-images-1">
{{--                                                            <span class="file-item" title="Фото профайла">--}}
{{--                                                                <span class="file-name">Фото профайла</span>--}}
{{--                                                                <button class="file-cancel" type="button" title="Отменить загрузку файла">--}}
{{--                                                                    <svg style="width: 12px; height: 12px;" aria-hidden="true">--}}
{{--                                                                        <use xlink:href="../assets/media/sprite.svg?1644862956843#sprite-close"></use>--}}
{{--                                                                    </svg>--}}
{{--                                                                </button>--}}
{{--                                                                <span class="file-image" style="background-image: url('../assets/uploads/profile/img-1.jpg')">--}}
{{--                                                                </span>--}}
{{--                                                            </span>--}}
{{--                                            <span class="file-item" title="Фото профайла">--}}
{{--                                                                <span class="file-name">Фото профайла</span>--}}
{{--                                                                <button class="file-cancel" type="button" title="Отменить загрузку файла">--}}
{{--                                                                    <svg style="width: 12px; height: 12px;" aria-hidden="true">--}}
{{--                                                                        <use xlink:href="../assets/media/sprite.svg?1644862956843#sprite-close"></use>--}}
{{--                                                                    </svg>--}}
{{--                                                                </button>--}}
{{--                                                                <span class="file-image" style="background-image: url('../assets/uploads/profile/img-2.png')">--}}
{{--                                                                </span>--}}
{{--                                                            </span>--}}
{{--                                            <span class="file-item" title="Фото профайла">--}}
{{--                                                                <span class="file-name">Фото профайла</span>--}}
{{--                                                                <button class="file-cancel" type="button" title="Отменить загрузку файла">--}}
{{--                                                                    <svg style="width: 12px; height: 12px;" aria-hidden="true">--}}
{{--                                                                        <use xlink:href="../assets/media/sprite.svg?1644862956843#sprite-close"></use>--}}
{{--                                                                    </svg>--}}
{{--                                                                </button>--}}
{{--                                                                <span class="file-image" style="background-image: url('../assets/uploads/profile/img-3.jpg')">--}}
{{--                                                                </span>--}}
{{--                                                            </span>--}}
                                            <label class="profile-section-file__label file-label" for="profile-images-1">
                                                <div class="file-label-inner">
                                                    <svg style="width: 20px; height: 20px;" aria-hidden="true">
                                                        <use xlink:href="../assets/media/sprite.svg?1644862956843#sprite-plus"></use>
                                                    </svg>
                                                    <span>Добавить фото/видео</span>
                                                </div>
                                            </label>
                                        </label>
                                        <input class="profile-section-file__input file-input sr-only" type="file" id="profile-images-1"
                                               name="PHOTO" value="Фото профайла" accept="" multiple="">
                                    </div>
                                </div>
                                <div class="profile-section__form-group form-group">
                                    <label class="profile-section__label" for="description">Описание: </label>
                                    <div class="profile-section__input-container">
                                                        <textarea class="profile-section__input form-control" rows="7" id="description"
                                                                  name="description" placeholder="Текст описания…" autofocus="" data-autofocus=""></textarea>
                                    </div>
                                </div>
                                <div class="profile-section__form-group form-group">
                                    <label class="profile-section__label" for="hobby_id">Увлечения:</label>
                                    <select class="profile-section__select select form-control" id="hobby_id" name="hobby_id[]" multiple="" hidden=""
                                            data-select="">
                                        @foreach($hobbys as $hobby)
                                        <option value="{{$hobby->id}}">{{$hobby->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="profile-section__form-group form-group">
                                    <label class="profile-section__label" for="religious_id">Религиозные взгляды:</label>
                                    <select class="profile-section__select select" id="religious_id" name="religious_id" hidden="" data-select="">
                                        <option value="">Выберите из списка</option>
                                        @foreach($religions as $religion)
                                        <option value="{{$religion->id}}">{{$religion->title}}</option>
                                        @endforeach
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
        </div>
    </div>
</div>
@endsection
