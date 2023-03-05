<form class="form-registration" id="form-registration" action="{{ route('register') }}">
    <h3 class="form-registration__title">Регистрация</h3>
    <div class="input-wrap">
        <span class="input-wrap__title">ФИО:</span>
        <div class="input-form">
            <input type="text" class="input-text" name="registration_full_name"
                   value="{{ old('registration_full_name') }}" title="ФИО"/>
        </div>
    </div>

    <div class="input-wrap">
        <span class="input-wrap__title">Email:</span>
        <div class="input-form">
            <input type="email" class="input-text" name="registration_email" value="{{ old('registration_email') }}"
                   title="Email"/>
        </div>
    </div>

    <div class="input-wrap">
        <span class="input-wrap__title">Телефон:</span>
        <div class="input-form">
            <input type="tel" class="input-text" name="registration_phone" value="{{ old('registration_phone') }}"
                   title="Телефон"/>
        </div>
    </div>

    <div class="input-wrap">
        <span class="input-wrap__title">Пароль:</span>
        <div class="input-form">
            <input type="password" class="input-text" name="registration_password" title="Пароль"/>
        </div>
    </div>

    <div class="input-wrap">
        <span class="input-wrap__title">Повторите пароль:</span>
        <div class="input-form">
            <input type="password" class="input-text" name="registration_password_confirmation"
                   title="Повторите пароль"/>
        </div>
    </div>

    <input type="submit" class="form__submit btn blue-btn" value="Зарегистрироваться" title="Зарегистрироваться"/>
    <p class="form-registration__text">Нажимая кнопку, вы соглашаетесь с условиями
        <a href="#">политики обработки персональных данных</a></p>
</form>
