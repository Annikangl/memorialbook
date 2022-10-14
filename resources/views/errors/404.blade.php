@extends('layouts.app')

@section('content')
    <div class="main-content__container container">
        <div class="main-content__row row">
            <div class="main-content__col col">
                <div class="main-content__inner container preloader-container">
                    <div class="main-content-inner__row row">
                        <div class="main-content-inner__col col">
                            <div class="errorpage">
                                <header class="errorpage__header">
                                    <h1 class="errorpage-header__title">Ошибка 404</h1>
                                </header>
                                <div class="errorpage__text">К сожалению, страница не найдена</div>
                                <a class="errorpage__link" href="{{ route('home') }}">Перейти на главную страницу</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
