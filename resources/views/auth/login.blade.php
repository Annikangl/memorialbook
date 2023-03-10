@extends('layouts.app')

@section('content')

    <section class="preview">
        <div class="preview-img">
            <img src="{{ asset('assets/uploads/index-page/image_small.webp') }}"
                 data-src="{{ asset('assets/uploads/index-page/image_en.png') }}"
                 alt="Memorialbook preview image"
                 title="Memorialbook"/>
            <img src="{{ asset('assets/uploads/index-page/image-mobile_small.webp') }}"
                 data-src="{{ asset('assets/uploads/index-page/image_en.png') }}"
                 alt="Memorialbook preview image for mobile"
                 title="Memorialbook"/>
        </div>

        <div class="preview-form">
            <form class="login-form" id="login-form" action="{{ route('login') }}" method="post" data-base-form="">
                @csrf
                <h3 class="login-form__title">{{ __('auth.sign_in') }}</h3>

                <div class="input-wrap">
                    <span class="input-wrap__title">{{ __('auth.input_email') }}:</span>
                    <div class="input-form">
                        <input type="email" class="input-text" name="login_email" title="email"/>
                    </div>
                </div>

                <div class="input-wrap">
                    <span class="input-wrap__title">{{ __('auth.input_password') }}:</span>
                    <div class="input-form">
                        <a class="input-link" id="input-link">{{ __('auth.link_forgotPassword') }}</a>
                        <input type="password" class="input-text" name="login_password" title="{{ __('auth.link_forgotPassword') }}"/>
                    </div>
                </div>

                <input type="submit" class="form__submit btn blue-btn" value="{{ __('auth.btn_signIn') }}" title="Войти"/>

                <a href="#" class="login-form__registration-link open-registration">{{ __('auth.link_register') }}</a>
            </form>
            @include('auth.partials.socials')
        </div>
    </section>

@endsection


