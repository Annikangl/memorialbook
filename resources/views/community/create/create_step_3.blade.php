<div class="steep hide">

    <div class="steep-wrap grid-col-2_3">
        <div class="user-current-avatar"></div>
        <div class="user-total-info">
            <h3 class="user-total-info__name">Сообщество</h3>

{{--            <div class="status-moderation">--}}
{{--                <span class="status-moderation__title">Статус модерации:</span>--}}
{{--                <p class="status-moderation__text -status-error">Публикация отклонена 14:31 22.10.2021</p>--}}
{{--            </div>--}}

{{--            <p class="moderation-text">Документы не соответствуют установленному образцу</p>--}}
        </div>
    </div>

    <div class="steep-wrap">
        <span class="input-wrap__title">{{ __('create_community.input_confirmingDocument') }}:</span>
        <div class="input-photo">

            <label class="input-photo-load">
                <svg style="width: 20px; height: 20px;" aria-hidden="true">
                    <path d="M10.5 21c-.6 0-1-.4-1-1v-8.5H1c-.6 0-1-.4-1-1s.4-1 1-1h8.5V1c0-.6.4-1 1-1s1 .4 1 1v8.5H20c.6 0 1 .4 1 1s-.4 1-1 1h-8.5V20c0 .6-.4 1-1 1z"/>
                </svg>
                <span class="input-photo-load__text">{{ __('create_community.upload_documents') }}</span>
                <input type="file" class="load-files-community" name="community_documents[]" accept=".pdf" multiple/>
            </label>
        </div>

    </div>

    <div class="steep-wrap">
        <span class="text-public">{{ __('create_community.input_publicAccessSetting') }}</span>
        <ul class="settings-public grid-col-2">
            <li class="settings-public__item">
                <label class="settings-wrap">
                    <input type="radio" class="settings-wrap__radio"  name="settings-public" value="Открытый" checked/>
                    <span class="settings-wrap__title">{{ __('create_community.input_public') }}</span>
                    <span class="settings-wrap__desc">{{ __('create_community.input_public_subtitle') }}</span>
                </label>
            </li>
            <li class="settings-public__item">
                <label class="settings-wrap">
                    <input type="radio" class="settings-wrap__radio" name="settings-public" value="Закрытый"/>
                    <span class="settings-wrap__title">{{ __('create_community.input_private') }}</span>
                    <span class="settings-wrap__desc">{{ __('create_community.input_private_subtitle') }}</span>
                </label>
            </li>
        </ul>
    </div>
</div>
