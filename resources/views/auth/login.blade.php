@extends('layouts.app')

@section('content')
    <div class="index">
        <div class="index__left">
            <div class="index-left__content">
                <div class="index__image">
                    <img class="index-image__image -desktop" src="{{ asset('img/index-page/login-image.png') }}" alt="">
                    <img class="index-image__image -mobile" src="{{ asset('img/index-page/image-mobile.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="index__right">
            <div class="index-right__content">
                <div class="base-form -auth">
                    <form class="form form-initialized base-form-initialized preloader-initialized" action="#"
                          method="post" data-base-form="" aria-disabled="false" novalidate="">
                        <div class="form__title">Вход в&nbsp;систему</div>
                        <div class="form__form-group form-group">
                            <label class="form__label" for="auth-email-6">Email:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" type="email" id="auth-email-6" name="EMAIL"
                                       autocomplete="email" data-validate="required, email">
                            </div>
                        </div>
                        <div class="form__form-group form-group">
                            <label class="form__label" for="auth-password-6">Пароль:</label>
                            <div class="form__input-container">
                                <input class="form__input form-control" type="password" id="auth-password-6"
                                       name="PASSWORD" autocomplete="current-password" data-validate="required">
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
                               data-slideout-options="{&quot;type&quot;:&quot;register&quot;}">Нет аккаунта?
                                Зарегистироваться</a>
                        </div>
                        <div class="preloader" role="status" style="transition-duration: 250ms;">
                            <div class="preloader-spinner">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="container">--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">{{ __('Login') }}</div>--}}

    {{--                <div class="card-body">--}}
    {{--                    <form method="POST" action="{{ route('login') }}">--}}
    {{--                        @csrf--}}

    {{--                        <div class="row mb-3">--}}
    {{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

    {{--                            <div class="col-md-6">--}}
    {{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

    {{--                                @error('email')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row mb-3">--}}
    {{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

    {{--                            <div class="col-md-6">--}}
    {{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

    {{--                                @error('password')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row mb-3">--}}
    {{--                            <div class="col-md-6 offset-md-4">--}}
    {{--                                <div class="form-check">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

    {{--                                    <label class="form-check-label" for="remember">--}}
    {{--                                        {{ __('Remember Me') }}--}}
    {{--                                    </label>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row mb-0">--}}
    {{--                            <div class="col-md-8 offset-md-4">--}}
    {{--                                <button type="submit" class="btn btn-primary">--}}
    {{--                                    {{ __('Login') }}--}}
    {{--                                </button>--}}

    {{--                                @if (Route::has('password.request'))--}}
    {{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
    {{--                                        {{ __('Forgot Your Password?') }}--}}
    {{--                                    </a>--}}
    {{--                                @endif--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
@endsection
