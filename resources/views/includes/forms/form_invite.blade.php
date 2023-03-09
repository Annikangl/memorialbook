<form class="form-invite hide" id="form-invite">
    <button type="button" class="form-invite__close" title="Закрыть"></button>
    <h5 class="form-invite__title">{{ __('modals.invite_title') }}</h5>
    <p class="form-invite__text">{{ __('modals.invite_subtitle') }}</p>
    <div class="form-invite-input-wrap">
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('modals.input_email') }}:</span>
            <div class="input-form">
                <input type="email" class="input-text" name="" title=""/>
            </div>
        </div>
        <input type="submit" class="form-invite__submit btn white-btn" value="{{ __('modals.btn_submit') }}" title=""/>
    </div>
    <div class="linked-profiles-wrap">
        <span class="linked-profiles__title">{{ __('modals.related_profiles') }}</span>

        <ul class="linked-profiles">
            <li class="linked-profiles__item">
                <div class="linked-profiles__profile">
                    <div class="linked-profiles__img">
                        <img src="{{ asset('assets/media/media/empty_profile_avatar.png') }}" class="bg-img" alt="" title=""/>
                    </div>
                    <span class="linked-profiles__name">Алексей В.Н.</span>
                </div>
                <span class="linked-profiles__status">Administrator</span>
            </li>
            <li class="linked-profiles__item">
                <div class="linked-profiles__profile">
                    <div class="linked-profiles__img">
                        <img src="{{ asset('assets/media/media/empty_profile_avatar.png') }}" class="bg-img" alt="" title=""/>
                    </div>
                    <span class="linked-profiles__name">Алексей В.Н.</span>
                </div>
                <span class="linked-profiles__status">Full access</span>
            </li>
            <li class="linked-profiles__item">
                <div class="linked-profiles__profile">
                    <div class="linked-profiles__img">
                        <img src="{{ asset('assets/media/media/empty_profile_avatar.png') }}" class="bg-img" alt="" title=""/>
                    </div>
                    <span class="linked-profiles__name">Алексей В.Н.</span>
                </div>
                <span class="linked-profiles__status wait-status">Pending confirm</span>
            </li>
        </ul>

    </div>
</form>
