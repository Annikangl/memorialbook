@extends('layouts.app')

@section('content')

    <section class="preview">
        <div class="preview-img">
            <img src="{{ asset('assets/uploads/index-page/image.png') }}" alt="Memorialbook logo" title="Memorialbook"/>
            <img src="{{ asset('assets/uploads/index-page/image-mobile.png') }}" alt="Memorialbook logo" title="Memorialbook"/>
        </div>

        <div class="preview-form">
            <form class="login-form" id="login-form" action="{{ route('login') }}" method="post" data-base-form="">
                @csrf
                <h3 class="login-form__title">Вход в систему</h3>

                <div class="input-wrap">
                    <span class="input-wrap__title">Email:</span>
                    <div class="input-form">
                        <input type="email" class="input-text" name="login-email" title=""/>
                    </div>
                </div>

                <div class="input-wrap">
                    <span class="input-wrap__title">Пароль:</span>
                    <div class="input-form">
                        <a class="input-link" id="input-link">Забыли пароль?</a>
                        <input type="password" class="input-text" name="login-password" title=""/>
                    </div>
                </div>

                <input type="submit" class="form__submit btn blue-btn" value="Войти" title="Войти"/>

                <a href="#" class="login-form__registration-link open-registration">Нет аккаунта? Зарегистироваться</a>
            </form>
            @include('auth.partials.socials')
        </div>
    </section>

@endsection
