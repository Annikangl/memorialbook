@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="new-password">
            <h1 class="new-password__title">Новый пароль</h1>
            <div class="new-password__row row">
                <div class="new-password__side -info col-auto">
                    <div class="new-password__info">Пароль должен быть не менее 8 символов длиной, содержать латинские символы верхнего регистра
                        (A-Z), содержать латинские символы нижнего регистра (a-z), содержать цифры (0-9), содержать знаки пунктуации ,.<>
                        /?;:'"[]{}\|`~!@#$%^&*()-_+=).</div>
                </div>
                <div class="new-password__side col-auto">
                    <div class="base-form">
                        <form class="form" action="{{ route('password.update') }}" method="post" data-base-form="">
                            <div class="form__form-group form-group">
                                <label class="form__label" for="new-password">Пароль:</label>
                                <div class="form__input-container">
                                    <input class="form__input form-control" type="password" id="new-password" name="PASSWORD"
                                           autocomplete="new-password" data-validate="required, minlength: 6, equalto: PASSWORD_CONFIRM">
                                </div>
                            </div>
                            <div class="form__form-group form-group">
                                <label class="form__label" for="new-password-repeat">Повторите пароль:</label>
                                <div class="form__input-container"></div>
                                <input class="form__input form-control" type="password" id="new-password-confirm" name="PASSWORD_CONFIRM"
                                       autocomplete="new-password" data-validate="required, minlength: 6, equalto: PASSWORD">
                            </div>
                            <div class="form__form-group -submit form-group">
                                <button class="form__button -submit btn btn-primary" type="submit">Сохранить пароль</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('password.update') }}">--}}
{{--                        @csrf--}}

{{--                        <input type="hidden" name="token" value="{{ $token }}">--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}

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
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Reset Password') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
