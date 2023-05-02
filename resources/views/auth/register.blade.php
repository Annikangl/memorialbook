<form class="form-registration" id="form-registration" action="{{ route('register') }}">
    <h3 class="form-registration__title">{{ __('auth.title_registration') }}</h3>
    <div class="input-wrap">
        <span class="input-wrap__title">{{ __('auth.input_fullName') }}:</span>
        <div class="input-form">
            <input type="text" class="input-text" name="registration_full_name"
                   value="{{ old('registration_full_name') }}" title="ФИО"/>
        </div>
    </div>

    <div class="input-wrap">
        <span class="input-wrap__title">{{ __('auth.input_email') }}:</span>
        <div class="input-form">
            <input type="email" class="input-text" name="registration_email" value="{{ old('registration_email') }}"
                   title="{{ __('auth.input_email') }}"/>
        </div>
    </div>

    <div class="input-wrap">
        <span class="input-wrap__title">{{ __('auth.input_phone') }}:</span>
        <div class="input-form">
            <input type="tel" class="input-text" name="registration_phone" value="{{ old('registration_phone') }}"
                   title="{{ __('auth.input_phone') }}"/>
        </div>
    </div>

    <div class="input-wrap">
        <span class="input-wrap__title">{{ __('auth.input_password') }}:</span>
        <div class="input-form">
            <input type="password" class="input-text" name="registration_password" title="{{ __('auth.input_password') }}"/>
        </div>
    </div>

    <div class="input-wrap">
        <span class="input-wrap__title">{{ __('auth.input_confirmPassword') }}</span>
        <div class="input-form">
            <input type="password" class="input-text" name="registration_password_confirmation"
                   title="{{ __('auth.input_confirmPassword') }}"/>
        </div>
    </div>

    <input type="submit" class="form__submit btn blue-btn" value="{{ __('layout.btn_register') }}" title="Зарегистрироваться"/>
    <p class="form-registration__text">{{ __('auth.text_policy') }}
        <a href="#">{{ __('auth.link_policy') }}</a></p>
</form>
