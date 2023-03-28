<div class="steep hide">
    <div class="steep-wrap">


        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_pictureAndMovies') }}:</span>
            <div class="input-photo  @error('profiles_files.*') no-valid @enderror">
                <input type="file" name="profiles_files[]" class="load_files_profile" accept=".jpg,.jpeg,.png,.mp4">
            </div>
            @error('profile_images.*')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_description') }}:</span>
            <textarea class="textarea-form @error('description') no-valid @enderror"
                      placeholder="{{ __('create_profile.placeholder_description') }}"
                      id="description"
                      name="description"
                      title="{{ __('create_profile.input_description') }}">{{ old('description') }}</textarea>
            @error('description')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.religion_views') }}:</span>

            <div class="select-form @error('religious_id') no-valid @enderror">
                <div class="select">
                    <input type="hidden" class="select__output" id="religious_id_hidden" name="religious_id" readonly>
                    <input type="text" class="select__output" placeholder="{{ __('create_profile.choose_from_list') }}"
                           readonly>

                    <ul class="select-list">
                        @foreach($religions as $religion)
                            <li class="select-list__item" data-name="religious_id" data-id="{{$religion->id }}"
                                id="religious_id">
                                {{$religion->title}}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <svg aria-hidden="true" class="select-arrow">
                    <path d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                </svg>
            </div>
            @error('religious_id')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
