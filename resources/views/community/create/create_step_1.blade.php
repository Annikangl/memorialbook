<div class="steep">
    <div class="steep-wrap grid-col-2_3">

        <div class="user-avatar @error('avatar') no-valid @enderror">
            <div class="preview-avatar">
                <label class="preview-avatar-wrap">
                    <input type="file" accept=".jpg,.jpeg,.png"
                           class="input-avatar"
                           id="change-avatar"
                           name="avatar"/>
                    <span class="preview-avatar-wrap__text">{{ __('create_community.input_selectPhoto') }}</span>
                </label>
                <label class="preview-avatar__icon" for="change-avatar">
                    <svg>
                        <path class="st0"
                              d="M18.1 19.1h-15c-.8 0-1.6-.3-2.2-.9-.6-.6-.9-1.4-.9-2.3V6.3c0-.8.3-1.6.9-2.2s1.4-.9 2.2-.9h1c.2 0 .4 0 .5-.1.2-.1.4-.2.5-.4L6 1.4c.3-.4.7-.8 1.1-1C7.5.1 8 0 8.5 0h4.1c.5 0 1 .1 1.5.4.5.2.8.6 1.1 1l.9 1.3c.1.2.2.3.4.4s.3.1.5.1h1c.8 0 1.6.3 2.2.9.6.6.9 1.4.9 2.2v9.6c0 .8-.3 1.6-.9 2.2-.5.6-1.3 1-2.1 1zM3.1 5.2c-.3 0-.6.1-.8.3S2 6 2 6.3v9.6c0 .3.1.6.3.8.2.2.5.3.8.3H18c.3 0 .6-.1.8-.3.2-.2.3-.5.3-.8V6.3c0-.3-.1-.6-.3-.8-.2-.2-.5-.3-.8-.3h-1c-.5 0-1-.1-1.5-.4-.5-.2-.8-.6-1.1-1l-.9-1.3c-.1-.2-.2-.3-.4-.4s-.2-.1-.4-.1H8.5c-.1 0-.3 0-.5.1s-.3.3-.4.4l-.9 1.3c-.3.4-.7.8-1.1 1-.5.2-1 .4-1.5.4h-1z"/>
                        <path class="st0"
                              d="M10.6 14.8c-1.1 0-2.2-.4-3-1.2-.8-.8-1.2-1.8-1.2-3 0-1.1.4-2.2 1.2-3 .8-.8 1.9-1.2 3-1.2s2.2.4 3 1.2c.8.8 1.2 1.9 1.2 3s-.4 2.2-1.2 3-1.9 1.2-3 1.2zm0-6.4c-.6 0-1.1.2-1.6.6-.4.4-.6 1-.6 1.6 0 .6.2 1.1.6 1.6.8.8 2.3.8 3.1 0 .4-.4.6-1 .6-1.6s-.2-1.1-.6-1.6c-.3-.4-.9-.6-1.5-.6z"/>
                    </svg>
                </label>
            </div>
            <button type="button" class="delete-avatar hide">{{ __('create_community.input_removePhoto') }}</button>
        </div>
        <h3 class="name-cemetery">{{ __('create_community.input_communityPicture') }}</h3>
        @error('avatar')
        <span class="is-invalid">{{ $message }}</span>
        @enderror
    </div>
    <div class="steep-wrap">
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_community.input_title') }}:</span>
            <div class="input-form @error('title') no-valid @enderror">
                <input type="text" class="input-text input-required" id="first_name" name="title"
                       value="{{ old('title') }}"
                       title="{{ __('create_community.input_title') }}">
            </div>
            @error('title')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_community.input_location') }}:</span>
            <div class="input-form @error('community_address') no-valid @enderror" style="position:relative;">
                <input type="text"
                       class="input-text"
                       id="community_address"
                       name="community_address"
                       title="{{ __('create_community.input_location') }}"
                       readonly
                       value="{{ old('community_address') }}">
                <a href="#" style="position:absolute;"
                   class="communityAddressModal"
                   data-hystmodal="#community_address_location"
                   title="{{ __('create_community.choose_from_map') }}">
                    <img src="{{ asset('assets/media/media/icons/location.svg') }}"
                         alt="{{ __('create_community.choose_from_map') }}" width="20"/>
                </a>
                <input
                    type="hidden"
                    name="community_address_coords"
                    id="community_address_coords"
                    value="{{ old('community_address_coords') }}">
            </div>
            @error('community_address')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
            @error('community_address_coords')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="steep-wrap grid-col-2">
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_community.input_email') }}:</span>
            <div class="input-form  @error('email') no-valid @enderror">
                <input type="email" class="input-text input-required" name="email" value="{{ old('email') }}"
                       title="{{ __('create_community.input_email') }}">
            </div>
            @error('email')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_community.input_phone') }}:</span>
            <div class="input-form  @error('phone') no-valid @enderror">
                <input type="tel" class="input-text mask-tel" name="{{ __('create_community.input_phone') }}"
                       value="{{ old('phone') }}" title="phone">
            </div>
            @error('phone')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_community.input_website') }}</span>
            <div class="input-form  @error('website') no-valid @enderror">
                <input type="text" class="input-text"
                       name="{{ __('create_community.input_website') }}"
                       placeholder="https://yoursite.com"
                       value="{{ old('website') }}"
                       title="website">
            </div>
            @error('website')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
