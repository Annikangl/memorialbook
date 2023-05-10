<div class="steep hide">
    <div class="steep-wrap">

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('edit-profile.Downloaded pictures and movies') }}:</span>
            <div class="input-photo">
                @foreach($human->getMedia('gallery') as $item)
                    <div class="input-photo-preview">
                        <button type="button" class="delete-resource">
                            <svg
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M3.41421 0.585779C2.63316 -0.19527 1.36684 -0.19527 0.585786 0.585779C-0.195262 1.36683 -0.195262 2.63316 0.585786 3.41421L7.17157 9.99999L0.585787 16.5858C-0.195262 17.3668 -0.195262 18.6332 0.585787 19.4142C1.36684 20.1953 2.63316 20.1953 3.41421 19.4142L10 12.8284L16.5858 19.4142C17.3668 20.1953 18.6332 20.1953 19.4142 19.4142C20.1953 18.6332 20.1953 17.3668 19.4142 16.5858L12.8284 9.99999L19.4142 3.41421C20.1953 2.63316 20.1953 1.36683 19.4142 0.585779C18.6332 -0.19527 17.3668 -0.19527 16.5858 0.585779L10 7.17157L3.41421 0.585779Z"
                                    fill="white"
                                />
                            </svg>
                        </button>
                        <input type="file" hidden="hidden" name="load-resource"/>
                        <img class="bg-img" src="{{ $item->getUrl('thumb_500') }}" alt="{{ $item->name }}"/>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('edit-profile.Pictures and movies') }}:</span>
            <div class="input-photo  @error('gallery.*') no-valid @enderror">
                <input type="file" name="gallery[]" class="load_files_profile" accept=".jpg,.jpeg,.png,.mp4">
            </div>
            @error('gallery.*')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">Описание:</span>
            <textarea class="textarea-form" placeholder="Текст описания..." id="description" name="description"
                       title="{{ $human->description }}">{{ $human->description }}</textarea>
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('edit-profile.Select religion view') }}:</span>

            <label for="select-religion"></label>
            <select name="religion_id" id="select-religion" class="@error('religion_id') no-valid @enderror">
                <option disabled selected value>{{ __('create_profile.Select religion view') }}</option>
                @foreach($religions as $religion)
                    <option value="{{ $religion->id }}" @selected($religion->id == $human->religion_id)>
                        {{ $religion->title }}
                    </option>
                @endforeach
            </select>

            @error('religion_id')
            <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
