<div class="steep hide">

    <div class="steep-wrap grid-col-2_3">
        <div class="user-current-avatar"></div>
        <div class="user-total-info">
            <h3 class="user-total-info__name"></h3>

{{--            <div class="status-moderation">--}}
{{--                <span class="status-moderation__title">Статус модерации:</span>--}}
{{--                <p class="status-moderation__text -status-error">Публикация отклонена 14:31 22.10.2021</p>--}}
{{--            </div>--}}

{{--            <p class="moderation-text">Свидетельство о смерти не соответствует установленному образцу</p>--}}
        </div>
    </div>
    <div class="steep-wrap">
        <span class="text-public">{{ __('create_profile.input_publicAccessSetting') }}</span>
        <ul class="settings-public grid-col-3">
            <li class="settings-public__item">
                <label class="settings-wrap">
                    <input type="radio" class="settings-wrap__radio" name="access" value="Открытый" checked/>
                    <span class="settings-wrap__title">{{ __('create_profile.input_public') }}</span>
                    <span class="settings-wrap__desc">{{ __('create_profile.input_public_subtitle') }}</span>
                </label>
            </li>
            <li class="settings-public__item">
                <label class="settings-wrap">
                    <input type="radio" class="settings-wrap__radio" name="access" value="Доступный"/>
                    <span class="settings-wrap__title">{{ __('create_profile.input_available') }}</span>
                    <span
                        class="settings-wrap__desc">{{ __('create_profile.input_available_subtitle') }}</span>
                </label>
            </li>
            <li class="settings-public__item">
                <label class="settings-wrap">
                    <input type="radio" class="settings-wrap__radio" name="access" value="Закрытый"/>
                    <span class="settings-wrap__title">{{ __('create_profile.input_private') }}</span>
                    <span class="settings-wrap__desc">{{ __('create_profile.input_private_subtitle') }}</span>
                </label>
            </li>
        </ul>
    </div>
</div>

