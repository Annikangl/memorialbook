<div class="base-form -register" id="slideout-register">
    <form class="form" action="{{ route('register') }}" method="post" data-base-form="">
        @csrf
        <div class="form__title">Регистрация</div>
        <div class="form__form-group form-group">
            <label class="form__label" for="register-fio-4">ФИО:</label>
            <div class="form__input-container">
                <input class="form__input form-control" type="text" id="register-fio-4"
                       name="FIO" autocomplete="name"
                       data-validate="required, name">
            </div>
        </div>
        <div class="form__form-group form-group">
            <label class="form__label" for="register-email-4">Email:</label>
            <div class="form__input-container">
                <input class="form__input form-control" type="email"
                       id="register-email-4" name="EMAIL" autocomplete="email"
                       data-validate="required, email">
            </div>
        </div>
        <div class="form__form-group form-group">
            <label class="form__label" for="register-phone-4">Телефон:</label>
            <div class="form__input-container">
                <input class="form__input form-control" type="tel" id="register-phone-4"
                       name="PHONE" autocomplete="tel"
                       data-validate="required, tel">
            </div>
        </div>
        <div class="form__form-group form-group">
            <label class="form__label" for="register-password-4">Пароль:</label>
            <div class="form__input-container">
                <input class="form__input form-control" type="password"
                       id="register-password-4" name="PASSWORD"
                       autocomplete="new-password"
                       data-validate="required, minlength: 6, equalto: PASSWORD_CONFIRM">
            </div>
        </div>
        <div class="form__form-group form-group">
            <label class="form__label" for="register-password-confirm-4">Повторите
                пароль:</label>
            <div class="form__input-container">
                <input class="form__input form-control" type="password"
                       id="register-password-confirm-4"
                       name="PASSWORD_CONFIRM" autocomplete="new-password"
                       data-validate="required, minlength: 6, equalto: PASSWORD">
            </div>
        </div>
        <div class="form__form-group -submit form-group">
            <button class="form__button -submit btn btn-primary btn-lg" type="submit">
                Зарегистрироваться
            </button>
        </div>
        <div class="form__form-group -agreement form-group">
            <div class="form__agreement">Нажимая кнопку, вы соглашаетесь с условиями <a
                    href="#">политики обработки
                    персональных данных</a>
            </div>
        </div>
    </form>
</div>
