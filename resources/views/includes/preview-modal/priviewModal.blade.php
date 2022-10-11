<div class="preview-modal" id="modal-from">
    <div class="aside-form" id="form-aside">
        <button type="button" class="close-registration" id="close-aside"></button>

        <form class="form-registration" id="form-registration">
            <h3 class="form-registration__title">Регистрация</h3>
            <div class="input-wrap">
                <span class="input-wrap__title">ФИО:</span>
                <div class="input-form">
                    <input type="text" class="login-input" name="login-registration__name" title=""/>
                </div>
            </div>

            <div class="input-wrap">
                <span class="input-wrap__title">Email:</span>
                <div class="input-form">
                    <input type="email" class="login-input" name="login-registration__mail" title=""/>
                </div>
            </div>

            <div class="input-wrap">
                <span class="input-wrap__title">Телефон:</span>
                <div class="input-form">
                    <input type="tel" class="login-input" name="login-registration__phone" title=""/>
                </div>
            </div>

            <div class="input-wrap">
                <span class="input-wrap__title">Пароль:</span>
                <div class="input-form">
                    <input type="password" class="login-input" name="login-registration__password" title=""/>
                </div>
            </div>

            <div class="input-wrap">
                <span class="input-wrap__title">Повторите пароль:</span>
                <div class="input-form">
                    <input type="password" class="login-input" name="login-registration__confirm" title=""/>
                </div>
            </div>

            <input type="submit" class="form__submit" value="Зарегистрироваться" title="Зарегистрироваться"/>
            <p class="form-registration__text">Нажимая кнопку, вы соглашаетесь с условиями
                <a href="#">политики обработки персональных данных</a></p>
        </form>

        <form class="form-recover">
            <h3 class="form-recover__title">Восстановить пароль</h3>
            <div class="form-recover-wrap">
                <p>Если вы забыли пароль, введите email. <br/>Контрольная строка для смены пароля, а также ваши
                    регистрационные данные, будут высланы вам по электронной почте.</p>
                <div class="input-wrap">
                    <span class="input-wrap__title">Email:</span>
                    <div class="input-form">
                        <input type="email" class="login-input" name="form-recover__email" title=""/>
                    </div>
                </div>
                <input type="submit" class="form__submit" value="Высдать" title="Зарегистрироваться"/>
            </div>
        </form>

    </div>
</div>
