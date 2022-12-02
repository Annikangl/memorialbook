@extends('layouts.app')

@section('content')

    <section class="new-password">
        <h2 class="new-password__title">Новый пароль</h2>
        <form class="form-new-password" method="post" action="{{ route('password.update') }}">
            @csrf
            <div class="form-new-password__wrap">
                <div class="input-wrap">
                    <span class="input-wrap__title">Пароль:</span>
                    <div class="input-form">
                        <input type="email" class="input-text" name="login-form__mail" title=""/>
                    </div>
                </div>
                <div class="input-wrap">
                    <span class="input-wrap__title">Повторите пароль:</span>
                    <div class="input-form">
                        <input type="email" class="input-text" name="login-form__mail" title=""/>
                    </div>
                </div>
                <input type="submit" class="form__submit btn blue-btn" value="Сохранить пароль" title="Войти"/>
            </div>
            <p class="form-new-password__text">Пароль должен быть не менее 8 символов длиной, содержать латинские символы верхнего регистра (A-Z), содержать
                латинские символы нижнего регистра (a-z), содержать цифры (0-9), содержать знаки пунктуации ,.<> /?;:'"[]{}\|`
                ~!@#$%^&*()-_+=).</p>
        </form>
    </section>
@endsection
