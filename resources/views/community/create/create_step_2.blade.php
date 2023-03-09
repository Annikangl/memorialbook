<div class="steep hide">
    <div class="steep-wrap">

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_community.input_banner') }}:</span>
            <div class="input-photo input-banner @error('community_banner') no-valid @enderror">

                <label class="input-photo-load">
                    <svg style="width: 20px; height: 20px;" aria-hidden="true">
                        <path d="M10.5 21c-.6 0-1-.4-1-1v-8.5H1c-.6 0-1-.4-1-1s.4-1 1-1h8.5V1c0-.6.4-1 1-1s1 .4 1 1v8.5H20c.6 0 1 .4 1 1s-.4 1-1 1h-8.5V20c0 .6-.4 1-1 1z"/>
                    </svg>
                    <span class="input-photo-load__text">{{ __('create_community.upload_banner') }}</span>
                    <input type="file" class="load-files-community" name="community_banner" accept=".jpg,.jpeg,.png"/>
                </label>
            </div>
            @error('community_banner')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_community.input_pictureAndMovies') }}:</span>
            <div class="input-photo @error('community_gallery.*') no-valid @enderror">

                <label class="input-photo-load">
                    <svg style="width: 20px; height: 20px;" aria-hidden="true">
                        <path d="M10.5 21c-.6 0-1-.4-1-1v-8.5H1c-.6 0-1-.4-1-1s.4-1 1-1h8.5V1c0-.6.4-1 1-1s1 .4 1 1v8.5H20c.6 0 1 .4 1 1s-.4 1-1 1h-8.5V20c0 .6-.4 1-1 1z"/>
                    </svg>
                    <span class="input-photo-load__text">{{ __('create_community.input_addPhotoAndMovies') }}</span>
                    <input type="file" class="load-files-community"
                           name="community_gallery[]"
                           accept=".jpg,.jpeg,.png,.mp4"
                           multiple/>
                </label>
            </div>
            @error('community_gallery.*')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_community.description') }}:</span>
            <textarea
                class="textarea-form @error('description') no-valid @enderror"
                placeholder="{{ __('create_community.placeholder_description') }}"
                name="description"
                title="{{ __('create_community.description') }}"></textarea>
            @error('description')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

    </div>
</div>
