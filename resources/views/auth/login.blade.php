@extends('layouts.app')

@section('content')

    <section class="preview">
        <div class="preview-img">
            <img src="{{ asset('img/index/image.png') }}" alt="" title=""/>
            <img src="{{ asset('img/index/image-mobile.png') }}" alt="" title=""/>
        </div>

        <div class="preview-form">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    <span>{{ session('status') }}</span>
                </div>
            @endif
            @if ($errors->any())
                @foreach($errors->all() as $error)

                <span class="is-invalid" role="alert" style="display: block">
                    {{ $error }}
                </span>
                    @endforeach
                @endif
            <form action="{{ route('login') }}" class="login-form" id="login-form" method="POST">
                @csrf

                <h3 class="login-form__title">Вход в систему</h3>

                <div class="input-wrap">
                    <span class="input-wrap__title">Email:</span>
                    <div class="input-form">
                        <input type="email" class="login-input" name="login-form__mail" title="" value="{{ old('login-form__mail') }}"/>
                    </div>
                    @error('email')
                    <span class="is-invalid" role="alert" style="display: block">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="input-wrap">
                    <span class="input-wrap__title">Пароль:</span>
                    <div class="input-form">
                        @if (Route::has('password.request'))
                            <a class="input-link" id="input-link">
                                Забыли пароль?
                            </a>
                        @endif
                        <input type="password" class="login-input" name="login-form__password" title=""/>
                    </div>
                </div>

                <input type="submit" class="form__submit" value="Войти" title="Войти"/>

                <a href="#" class="login-form__registration-link open-registration">Нет аккаунта? Зарегистироваться</a>
            </form>

        </div>
    </section>


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
