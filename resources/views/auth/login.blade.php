@extends('layouts.app')

@section('content')
    <div class="index">
        <div class="index__left">
            <div class="index-left__content">
                <div class="index__image">
                    <img class="index-image__image -desktop" src="{{ asset('assets/uploads/index-page/image.png') }}" alt="">
                    <img class="index-image__image -mobile" src="{{ asset('assets/uploads/index-page/image-mobile.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="index__right">
            <div class="index-right__content">
                <div class="base-form -auth">
                    <form class="form" action="{{ route('login') }}" method="post" data-base-form="">
                        @csrf
                        <div class="form__title">Вход в&nbsp;систему</div>
                        <div class="form__form-group form-group">
                            <label class="form__label" for="auth-email-6">Email:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" type="email" id="auth-email-6" name="EMAIL" autocomplete="email"
                                       data-validate="required, email">
                            </div>
                        </div>
                        <div class="form__form-group form-group">
                            <label class="form__label" for="auth-password-6">Пароль:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" type="password" id="auth-password-6" name="PASSWORD"
                                       autocomplete="current-password" data-validate="required">
                                <a class="form__link -right" href="#slideout-restorepass" data-slideout=""
                                   data-slideout-options="{&quot;type&quot;:&quot;restorepass&quot;,&quot;position&quot;:&quot;top&quot;}">Забыли
                                    пароль?</a>
                            </div>
                        </div>
                        <div class="form__form-group -submit form-group">
                            <button class="form__button -submit btn btn-primary btn-lg" type="submit">Войти</button>
                        </div>

                        <div class="form__form-group -bottom form-group">
                            <a class="form__link" href="#slideout-register" data-slideout=""
                               data-slideout-options="{&quot;type&quot;:&quot;register&quot;}">Нет аккаунта? Зарегистироваться</a>
                        </div>
                    </form>
                    @include('auth.partials.socials')
                </div>
            </div>
        </div>
    </div>

@endsection
