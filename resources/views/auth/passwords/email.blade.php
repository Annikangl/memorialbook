<form class="form-recover" action="{{ route('password.email') }}" method="POST">
    @csrf
    <h3 class="form-recover__title">{{ __('auth.forgot_title') }}</h3>
    <div class="form-recover-wrap">
        <p>{{ __('auth.forgot_modal_text') }}</p>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('auth.input_email') }}:</span>
            <div class="input-form">
                <input type="email" class="input-text" name="form-recover__email" title="Email"/>
            </div>
        </div>
        <input type="submit" class="form__submit blue-btn btn" value="{{ __('auth.submit_btn') }}" title="submit"/>
    </div>
</form>
