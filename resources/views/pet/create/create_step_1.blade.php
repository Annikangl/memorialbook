<div class="steep">
    <div class="steep-wrap grid-col-2">
        <div class="user-avatar  @error('avatar') no-valid @enderror">
            <div class="preview-avatar">
                <label class="preview-avatar-wrap">
                    <input type="file" accept=".jpg,.jpeg,.png" class="input-avatar" name="avatar" id="change-avatar"/>
                    <span class="preview-avatar-wrap__text">{{ __('create-pet.input_selectPhoto') }}</span>
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
            <button type="button" class="delete-avatar hide">{{ __('create-pet.input_removePhoto') }}</button>
        </div>
        @error('avatar')
            <span class="is-invalid">{{ $message }}</span>
        @enderror

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create-pet.input_petName') }}:</span>
            <div class="input-form @error('name') no-valid @enderror">
                <input type="text" class="input-text input-required"
                       id="first_name"
                       name="name"
                       placeholder="{{ __('create_profile.John') }}"
                       value="{{ old('name') }}"
                       title="{{ __('create-pet.input_petName') }}">
            </div>
            @error('name')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create-pet.input_breed') }}:</span>
            <div class="input-form @error('breed')  no-valid @enderror">
                <input type="text" class="input-text input-required"
                       id="last_name"
                       name="breed"
                       placeholder="{{ __('create_profile.sheepdog') }}"
                       value="{{ old('breed') }}"
                       title="{{ __('create-pet.input_breed') }}">
            </div>
            @error('breed')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="steep-wrap grid-col-2">
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create-pet.input_birthDate') }}:</span>
            <div class="input-form @error('dateBirth')  no-valid @enderror">
                <input type="text" class="input-text input-required mask-data"
                       name="dateBirth"
                       placeholder="{{ __('create_profile.dmy') }}"
                       value="{{ old('dateBirth') }}"
                       title={{ __('create-pet.input_birthDate') }}>
            </div>
            @error('dateBirth')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create-pet.input_birthPlace') }}:</span>
            <div class="input-form @error('birthPlace') no-valid @enderror">
                <input type="text" class="input-text"
                       name="birthPlace"
                       value="{{ old('birthPlace') }}"
                       title={{ __('create-pet.input_birthPlace') }}>
            </div>
            @error('birthPlace')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create-pet.input_deathDate') }}:</span>
            <div class="input-form @error('dateBirth') no-valid @enderror">
                <input type="text" class="input-text input-required mask-data"
                       name="dateDeath"
                       placeholder="{{ __('create_profile.dmy') }}"
                       value="{{ old('dateBirth') }}"
                       title={{ __('create-pet.input_deathDate') }}>
            </div>
            @error('dateBirth')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create-pet.input_burialPlace') }}:</span>
            <div class="input-form @error('burialPlace') no-valid @enderror">
                <input type="text" class="input-text"
                       id="burial_place"
                       name="burialPlace"
                       placeholder="{{ __('create_cemetery.Select burial place') }}"
                       value="{{ old('burialPlace') }}"
                       title={{ __('create-pet.input_burialPlace') }}>
            </div>
            @error('burialPlace')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
            <input type="hidden" id="burial_coords" name="burialCoords"
                   value="{{ old('burialCoords') }}">
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_deathCause') }}:</span>
            <div class="input-form @error('deathReason')  no-valid @enderror">
                <input type="text" class="input-text" id="death_reason"
                       name="deathReason"
                       placeholder="{{ __('create_profile.input_deathCause') }}"
                       value="{{ old('deathReason') }}"
                       title="{{ __('create_profile.input_deathCause') }}">
            </div>
            @error('deathReason')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
