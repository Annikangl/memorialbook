@extends('layouts.app')

@section('title')
    Новое кладбище
@endsection

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
                <h3 class="add-profile-content__title">Новое кладбище</h3>
{{--                TODO move to component --}}
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
                    <button type="button" class="save-draft hide">Сохранить как черновик</button>
                    <button type="button" class="save-and-next">Сохранить и продолжить</button>

                    <button type="submit" class="save-end hide">Сохранить и опубликовать</button>
                </div>

            </form>
            <p class="add-profile__text">Давайте создавать и хранить историю вместе? Для начала необходимо заполнить основную информацию кладбища.</p>
        </div>
    </section>

    <x-modal id="cemetery_address_location" class="inner_map" >
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

@section('scripts')
    <script>
        function loadPhoto() {
            let inputFiles = document.querySelector('.load-files-cemetery');
            let previewResurs = document.querySelector('.input-photo-cemetery');
            let resurs = inputFiles.files;

            console.log(inputFiles, previewResurs)


            for (let x = 0; x < resurs.length; x++) {
                console.log(resurs[x])
                if (resurs[x].type.startsWith('image/')) {
                    let div = document.createElement("div");
                    let img = document.createElement("img");
                    let button = document.createElement("button");
                    div.classList.add('input-photo-preview');
                    img.classList.add('bg-img');
                    button.setAttribute("type", "button");
                    button.classList.add('delete-resurs');
                    button.innerHTML = "<svg><path d=\"m11 9.5-4-4 3.9-3.9c.4-.4.4-1 0-1.3s-1-.4-1.3 0L5.7 4.2l-4-4C1.3-.2.7-.2.4.2c-.4.4-.4 1 0 1.4l4 4-4.1 4c-.4.4-.4 1 0 1.3s1 .4 1.3 0l4.1-4.1 4 4c.4.4 1 .4 1.3 0s.3-.9 0-1.3z\"/></svg>"

                    let inputHidden = document.createElement("input");
                    inputHidden.setAttribute("type", "file");
                    inputHidden.setAttribute("hidden", "hidden");
                    // inputHidden.setAttribute("name", "load-resurs");
                    inputHidden.files = resurs;

                    img.resurs = resurs[x];
                    previewResurs.prepend(div);
                    div.append(button);

                    div.append(inputHidden);

                    let reader = new FileReader();

                    reader.onload = (function () {
                        return function (e) {
                            img.src = e.target.result
                            div.append(img);
                        };
                    })(img);

                    reader.readAsDataURL(resurs[x]);

                } else {
                    if (resurs[x].type.startsWith('video/')) {
                        let div = document.createElement("div");
                        let tagLoad = document.createElement("video");
                        let video = document.createElement("video");

                        let reader = new FileReader();
                        reader.readAsDataURL(resurs[x]);

                        reader.onload = function () {
                            video.src = reader.result;
                        };

                        div.classList.add('input-photo-preview');
                        video.classList.add('bg-img');
                        let button = document.createElement("button");
                        button.setAttribute("type", "button");
                        button.classList.add('delete-resurs');
                        button.innerHTML = "<svg><path d=\"m11 9.5-4-4 3.9-3.9c.4-.4.4-1 0-1.3s-1-.4-1.3 0L5.7 4.2l-4-4C1.3-.2.7-.2.4.2c-.4.4-.4 1 0 1.4l4 4-4.1 4c-.4.4-.4 1 0 1.3s1 .4 1.3 0l4.1-4.1 4 4c.4.4 1 .4 1.3 0s.3-.9 0-1.3z\"/></svg>"

                        let inputHidden = document.createElement("input");
                        inputHidden.setAttribute("type", "file");
                        inputHidden.setAttribute("hidden", "hidden");
                        // inputHidden.setAttribute("name", "load-resurs");
                        inputHidden.files = resurs;

                        video.resurs = resurs[x];
                        previewResurs.prepend(div);
                        div.append(button);

                        div.append(inputHidden);

                        div.append(video);
                        previewResurs.prepend(div);
                    }
                }
            }

            let btnDelete = document.querySelectorAll('.delete-resurs');

            for (let i = 0; i < btnDelete.length; i++) {
                btnDelete[i].addEventListener('click', function () {
                    btnDelete[i].parentElement.remove();
                })
            }
        }
    </script>
@endsection
