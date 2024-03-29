<div class="steep">
    <div class="steep-wrap grid-col-2">
        <div class="user-avatar @error('avatar') no-valid @enderror">
            <div class="preview-avatar">
                <label class="preview-avatar-wrap">
                    <input type="file" accept=".jpg,.jpeg,.png" class="input-avatar"
                           id="change-avatar" name="avatar"/>
                    <span class="preview-avatar-wrap__text">{{ __('create_profile.input_selectPhoto') }}</span>
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
            <button type="button" class="delete-avatar hide">{{ __('create_profile.input_removePhoto') }}</button>
        </div>
        @error('avatar')
        <span class="is-invalid">{{ $message }}</span>
        @enderror

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_firstName') }}:</span>
            <div class="input-form @error('first_name')  no-valid @enderror">
                <input type="text" class="input-text input-required" placeholder="{{ __('create_profile.John') }}"
                       id="first_name" name="first_name" value="{{ old('first_name') }}"
                       title="{{ __('create_profile.input_firstName') }}">
            </div>
            @error('first_name')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_lastName') }}:</span>
            <div class="input-form @error('first_name')  no-valid @enderror">
                <input type="text" class="input-text input-required" placeholder="{{ __('create_profile.Doe') }}"
                       id="last_name" name="last_name" value="{{ old('last_name') }}"
                       title="{{ __('create_profile.input_lastName') }}">
            </div>
            @error('last_name')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.Gender') }}</span>

            <select name="gender" id="select-gender" class="@error('gender') no-valid @enderror">
                <option disabled selected value>{{ __('create_profile.Select gender') }}</option>
                @foreach($genders as $gender)
                    <option value="{{ $gender }}" @selected(old('gender') == $gender)>{{ $gender }}</option>
                @endforeach
            </select>
            @error('gender')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

    </div>
    <div class="steep-wrap grid-col-2">
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_birthDate') }}:</span>
            <div class="input-form @error('date_birth')  no-valid @enderror">
                <input type="text" class="input-text input-required mask-data"
                       placeholder="{{ __('create_profile.dmy') }}" id="date_birth" name="date_birth"
                       value="{{ old('date_birth') }}"
                       title="{{ __('create_profile.input_birthDate') }}">
            </div>
            @error('date_birth')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_birthPlace') }}:</span>
            <div class="input-form @error('birth_place')  no-valid @enderror">
                <input type="text" class="input-text"
                       name="birth_place"
                       placeholder="{{ __('create_profile.country_and_city') }}"
                       value="{{ old('birth_place') }}"
                       title="{{ __('create_profile.input_birthPlace') }}">
            </div>
            @error('birth_place')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_deathDate') }}:</span>
            <div class="input-form @error('date_death')  no-valid @enderror">
                <input type="text" class="input-text mask-data" placeholder="{{ __('create_profile.dmy') }}"
                       id="date_death" name="date_death" value="{{ old('date_death') }}"
                       title="{{ __('create_profile.input_deathDate') }}">
            </div>
            @error('date_death')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.Location') }}:</span>
            <div class="input-form">
                <input type="text" class="input-text"
                       placeholder="{{ __('create_profile.Select burial place') }}"
                       id="burial_place"
                       name="burial_place"
                       value="{{ old('burial_place') }}"
                       title="{{ __('create_profile.Location') }}">
            </div>
            <input type="hidden" id="burial_coords" name="burial_coords"
                   value="{{ old('burial_coords') }}">
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_deathCause') }}:</span>
            <div class="input-form @error('death_reason')  no-valid @enderror">
                <input type="text" class="input-text" id="death_reason" name="death_reason"
                       placeholder="{{ __('create_profile.input_deathCause') }}"
                       value="{{ old('death_reason') }}"
                       title="{{ __('create_profile.input_deathCause') }}">
            </div>
            @error('death_reason')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_deathCertificate') }}:</span>
            <div class="input-form @error('death_certificate')  no-valid @enderror">
                <input type="file" class="profileDocument" id="death_certificate" name="death_certificate" accept=".pdf"
                       title="{{ __('create_profile.input_deathCertificate') }}">
            </div>
            @error('death_certificate')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="steep-wrap grid-col-2">
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_father') }}</span>

            <select name="father_id" id="select-father" class="@error('father_id') no-valid @enderror">
                <option disabled selected value>{{ __('create_profile.Select father') }}</option>
                @foreach($fathers as $father)
                    <option
                        value="{{ $father->id }}" @selected(old('father_id') == $father->id)>{{ $father->full_name }}</option>
                @endforeach
            </select>
            @error('father_id')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_mother') }}</span>

            <select name="mother_id" id="select-mother" class="@error('mother_id') no-valid @enderror">
                <option disabled selected value>{{ __('create_profile.Select mother') }}</option>
                @foreach($mothers as $mother)
                    <option value="{{ $mother->id }}" @selected(old('mother_id') == $mother->id)>
                        {{ $mother->full_name }}
                    </option>
                @endforeach
            </select>

            @error('mother_id')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_spouse') }}</span>
            <select name="spouse_id" id="select-spouse" class="@error('spouse_id') no-valid @enderror">
                <option disabled selected value>{{ __('create_profile.Select husband or wife') }}</option>
                @foreach($humans as $human)
                    <option value="{{ $human->id }}" @selected(old('spouse_id') == $human->id)>
                        {{ $human->full_name }}
                    </option>
                @endforeach
            </select>
            @error('spouse_id')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>



