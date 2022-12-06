<div class="base-form -restorepass" id="slideout-restorepass">
    <form class="form" action="{{ route('password.email') }}" method="post"
          data-base-form="">
        @csrf
        <div class="container">
            <div class="form__inner">
                <div class="form__left">
                    <div class="form__title">Восстановить пароль</div>
                </div>
                <div class="form__right">
                    <div class="form__form-group form-group">
                        <div class="form__message">Если вы забыли пароль, введите email.
                            <br>Контрольная строка для смены пароля, а также ваши
                            регистрационные данные, будут высланы вам
                            по электронной почте.
                        </div>
                    </div>
                    <div class="form__form-group form-group">
                        <label class="form__label"
                               for="restorepass-email-3">Email:</label>
                        <div class="form__input-container">
                            <input class="form__input form-control" type="email"
                                   id="restorepass-email-3" name="EMAIL"
                                   autocomplete="email" data-validate="required, email">
                        </div>
                    </div>
                    <div class="form__form-group -submit form-group">
                        <button class="form__button -submit btn btn-primary"
                                type="submit">Выслать
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
