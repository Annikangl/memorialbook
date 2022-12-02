@extends('layouts.app')

@section('content')

    <section class="preview">
        <div class="preview-img">
            <img src="{{ asset('assets/uploads/index-page/image_small.webp') }}"
                 data-src="{{ asset('assets/uploads/index-page/image.webp') }}"
                 alt="Memorialbook preview image"
                 title="Memorialbook"/>
            <img src="{{ asset('assets/uploads/index-page/image-mobile_small.webp') }}"
                 data-src="{{ asset('assets/uploads/index-page/image-mobile.webp') }}"
                 alt="Memorialbook preview image for mobile"
                 title="Memorialbook"/>
        </div>

        <div class="preview-form">
            <form class="login-form" id="login-form" action="{{ route('login') }}" method="post" data-base-form="">
                @csrf
                <h3 class="login-form__title">Вход в систему</h3>

                <div class="input-wrap">
                    <span class="input-wrap__title">Email:</span>
                    <div class="input-form">
                        <input type="email" class="input-text" name="login-email" title="email"/>
                    </div>
                </div>

                <div class="input-wrap">
                    <span class="input-wrap__title">Пароль:</span>
                    <div class="input-form">
                        <a class="input-link open-recover" id="input-link">Забыли пароль?</a>
                        <input type="password" class="input-text" name="login-password" title="password"/>
                    </div>
                </div>

                <input type="submit" class="form__submit btn blue-btn" value="Войти" title="Войти"/>

                <a href="#" class="login-form__registration-link open-registration">Нет аккаунта? Зарегистироваться</a>
            </form>
            @include('auth.partials.socials')
        </div>
    </section>

@endsection


