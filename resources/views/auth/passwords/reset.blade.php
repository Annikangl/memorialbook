@extends('layouts.app')

@section('content')

    <section class="new-password">
        <h2 class="new-password__title">{{ __('auth.reset_password_title') }}</h2>
        <form class="form-new-password" method="post" action="{{ route('password.update') }}">
            @csrf
            <div class="form-new-password__wrap">
                <div class="input-wrap">
                    <span class="input-wrap__title">{{ __('auth.input_password') }}:</span>
                    <div class="input-form">
                        <input type="email" class="input-text" name="login-form__mail" title=""/>
                    </div>
                </div>
                <div class="input-wrap">
                    <span class="input-wrap__title">{{ __('auth.input_confirm_password') }}</span>
                    <div class="input-form">
                        <input type="email" class="input-text" name="login-form__mail" title=""/>
                    </div>
                </div>
                <input type="submit" class="form__submit btn blue-btn" value="{{ __('auth.btn_savePassword') }}"
                       title="{{ __('auth.btn_savePassword') }}"/>
            </div>
            <p class="form-new-password__text">{{ __('auth.reset_password_text') }}</p>
        </form>
    </section>
@endsection
