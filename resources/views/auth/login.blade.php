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
                </div>
            </div>
        </div>
    </div>

{{--    <section class="preview">--}}
{{--        <div class="preview-img">--}}
{{--            <img src="{{ asset('img/index/image.png') }}" alt="" title=""/>--}}
{{--            <img src="{{ asset('img/index/image-mobile.png') }}" alt="" title=""/>--}}
{{--        </div>--}}

{{--        <div class="preview-form">--}}
{{--            @if (session('status'))--}}
{{--                <div class="alert alert-success" role="alert">--}}
{{--                    <span>{{ session('status') }}</span>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @if ($errors->any())--}}
{{--                @foreach($errors->all() as $error)--}}


    {{--                            <div class="col-md-6">--}}
    {{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ future('email') }}" required autocomplete="email" autofocus>--}}

{{--                <span class="is-invalid" role="alert" style="display: block">--}}
{{--                    {{ $error }}--}}
{{--                </span>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            <form action="{{ route('login') }}" class="login-form" id="login-form" method="POST">--}}
{{--                @csrf--}}


{{--                <h3 class="login-form__title">Вход в систему</h3>--}}

{{--                <div class="input-wrap">--}}
{{--                    <span class="input-wrap__title">Email:</span>--}}
{{--                    <div class="input-form">--}}
{{--                        <input type="email" class="login-input" name="login-form__mail" title="" value="{{ old('login-form__mail') }}"/>--}}
{{--                    </div>--}}
{{--                    @error('email')--}}
{{--                    <span class="is-invalid" role="alert" style="display: block">--}}
{{--                            {{ $message }}--}}
{{--                        </span>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="input-wrap">--}}
{{--                    <span class="input-wrap__title">Пароль:</span>--}}
{{--                    <div class="input-form">--}}
{{--                        @if (Route::has('password.request'))--}}
{{--                            <a class="input-link" id="input-link">--}}
{{--                                Забыли пароль?--}}
{{--                            </a>--}}
{{--                        @endif--}}
{{--                        <input type="password" class="login-input" name="login-form__password" title=""/>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <input type="submit" class="form__submit" value="Войти" title="Войти"/>--}}


    {{--                        <div class="row mb-3">--}}
    {{--                            <div class="col-md-6 offset-md-4">--}}
    {{--                                <div class="form-check">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ future('remember') ? 'checked' : '' }}>--}}

{{--                <a href="#" class="login-form__registration-link open-registration">Нет аккаунта? Зарегистироваться</a>--}}
{{--            </form>--}}


{{--        </div>--}}
{{--    </section>--}}


@endsection
