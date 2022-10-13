<div class="form__form-group -submit form-group">
    <span>Войти через: &nbsp;</span>
    <a href="{{ route('social.login', ['driver' => 'facebook']) }}" style="margin-right: 10px;">Facebook</a>
    <a href="{{ route('social.login', ['driver' => 'apple']) }}">Apple</a>
</div>
