<div class="steep">
    <div class="steep-wrap grid-col-2_3">

        <div class="user-avatar">
            <div class="preview-avatar">
                <label class="preview-avatar-wrap">
                    <input type="file" accept=".jpg,.jpeg,.png" name="avatar" class="input-avatar" id="change-avatar"/>
                    <span class="preview-avatar-wrap__text">{{ __('create_cemetery.input_selectPhoto') }}</span>
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
            <button type="button" class="delete-avatar hide">{{ __('create_cemetery.input_removePhoto') }}</button>
        </div>
        <h3 class="name-cemetery @error('avatar') no-valid @enderror">{{ __('create_cemetery.Cemetery title') }}</h3>
        @error('avatar')
        <span class="is-invalid">{{ $message }}</span>
        @enderror

    </div>
    <div class="steep-wrap grid-col-2">
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_cemetery.input_name') }}:</span>
            <div class="input-form  @error('title') no-valid @enderror">
                <input type="text" class="input-text input-required"
                       id="first_name"
                       name="title"
                       value="{{ old('title') }}"
                       title="{{ __('create_cemetery.input_name') }}">
            </div>
            @error('title')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_cemetery.input_nameLatin') }}:</span>
            <div class="input-form  @error('titleEn') no-valid @enderror">
                <input type="text"
                       class="input-text"
                       id="last_name"
                       name="titleEn"
                       value="{{ old('titleEn') }}"
                       title={{ __('create_cemetery.input_nameLatin') }}>
            </div>
            @error('titleEn')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_cemetery.input_signature') }}:</span>
            <div class="input-form  @error('subtitle')  no-valid @enderror">
                <input type="text" class="input-text"
                       name="subtitle"
                       value="{{ old('subtitle') }}"
                       title="{{ __('create_cemetery.input_signature') }}">
            </div>
            @error('subtitle')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_cemetery.Location') }}:</span>
            <div class="input-form @error('address') @enderror">
                <input type="text" class="input-text"
                       id="cemetery_address"
                       name="address"
                       value="{{ old('address') }}"
                       placeholder="{{ __('create_cemetery.Location') }}"
                       title="{{ __('create_cemetery.Location') }}">
            </div>
            @error('address')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
            <input type="hidden" id="cemetery_address_coords" name="addressCoords"
                   value="{{ old('addressCoords') }}">
        </div>

    </div>
    <div class="steep-wrap grid-col-2">
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_cemetery.Email') }}:</span>
            <div class="input-form @error('email') no-valid @enderror">
                <input type="email" class="input-text input-required"
                       name="email"
                       value="{{ old('email') }}"
                       title="{{ __('create_cemetery.input_email') }}">
            </div>
            @error('email')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_cemetery.input_phone') }}:</span>
            <div class="input-form @error('phone') no-valid @enderror">
                <input type="tel" class="input-text"
                       name="phone"
                       value="{{ old('phone') }}"
                       title="{{ __('create_cemetery.input_phone') }}">
            </div>
            @error('phone')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_cemetery.input_schedule') }}:</span>
            <div class="input-form @error('schedule') no-valid @enderror">
                <input type="text" class="input-text"
                       name="schedule"
                       value="{{ old('schedule') }}"
                       title="{{ __('create_cemetery.input_schedule') }}">
            </div>
            @error('schedule')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
