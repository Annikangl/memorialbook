@extends('layouts.app')

@section('content')
    <section class="page-not-found">
        <div class="page-not-found-wrap">
            <h2 class="page-not-found__title">Ошибка 404</h2>
            <p class="page-not-found__text">К сожалению, страница не найдена</p>
            <a href="{{ route('home') }}" class="page-not-found__link">Перейти на главную страницу</a>
        </div>
    </section>
@endsection
