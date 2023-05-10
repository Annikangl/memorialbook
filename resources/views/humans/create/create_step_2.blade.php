<div class="steep hide">
    <div class="steep-wrap">

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('create_profile.input_pictureAndMovies') }}:</span>
            <div class="input-photo  @error('gallery.*') no-valid @enderror">
                <input type="file" name="gallery[]" class="load_files_profile" accept=".jpg,.jpeg,.png,.mp4">
            </div>
            @error('gallery.*')
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

            <select name="religion_id" id="select-religion" class="@error('religion_id') no-valid @enderror">
                <option disabled selected value>{{ __('create_profile.Select religion view') }}</option>
                @foreach($religions as $religion)
                    <option value="{{ $religion->id }}" @selected(old('religion_id') == $religion->id)>
                        {{ $religion->title }}
                    </option>
                @endforeach
            </select>

            @error('religious_id')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
