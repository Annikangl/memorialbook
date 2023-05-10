<div class="steep hide">

    <div class="steep-wrap grid-col-2_3">
        <div class="user-current-avatar"></div>
        <div class="user-total-info">
            <h3 class="user-total-info__name"></h3>
        </div>
    </div>
    <div class="steep-wrap">
        <span class="text-public">{{ __('create_profile.input_publicAccessSetting') }}</span>
        <ul class="settings-public grid-col-3">
            <li class="settings-public__item">
                <label class="settings-wrap">
                    <input type="radio" class="settings-wrap__radio" name="access" value="public" checked/>
                    <span class="settings-wrap__title">{{ __('edit-profile.Public') }}</span>
                    <span class="settings-wrap__desc">{{ __('edit-profile.Profile information is visible to all users') }}</span>
                </label>
            </li>
            <li class="settings-public__item">
                <label class="settings-wrap">
                    <input type="radio" class="settings-wrap__radio" name="access" value="available"/>
                    <span class="settings-wrap__title">{{ __('edit-profile.Available') }}</span>
                    <span
                        class="settings-wrap__desc">{{ __('edit-profile.Some of the profile information is hidden') }}</span>
                </label>
            </li>
            <li class="settings-public__item">
                <label class="settings-wrap">
                    <input type="radio" class="settings-wrap__radio" name="access" value="private"/>
                    <span class="settings-wrap__title">{{ __('edit-profile.Private') }}</span>
                    <span class="settings-wrap__desc">{{ __('edit-profile.Some of the profile information is hidden') }}</span>
                </label>
            </li>
        </ul>
    </div>
</div>

