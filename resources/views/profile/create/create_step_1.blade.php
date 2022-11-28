<div class="steep">
    <div class="steep-wrap grid-col-2">
        <div class="user-avatar @error('avatar') no-valid @enderror">
            <div class="preview-avatar">
                <label class="preview-avatar-wrap">
                    <input type="file" accept=".jpg,.jpeg,.png" class="input-avatar"
                           id="change-avatar" name="avatar"/>
                    <span class="preview-avatar-wrap__text">Выберите фото</span>
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
            <button type="button" class="delete-avatar hide">Удалить фото</button>
        </div>
        @error('avatar')
            <span class="is-invalid">{{ $message }}</span>
        @enderror

        <div class="input-wrap">
            <span class="input-wrap__title">Имя:</span>
            <div class="input-form @error('first_name')  no-valid @enderror">
                <input type="text" class="input-text input-required" placeholder="Иван"
                       id="first_name" name="first_name" value="{{ old('first_name') }}" title="">
            </div>
            @error('first_name')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">Фамилия:</span>
            <div class="input-form @error('first_name')  no-valid @enderror">
                <input type="text" class="input-text input-required" placeholder="Иванов"
                       id="last_name" name="last_name" value="{{ old('last_name') }}" title="">
            </div>
            @error('last_name')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">Пол</span>

            <div class="select-form @error('gender') no-valid @enderror">
                <div class="select">
                    <input type="hidden" class="select__output" id="gender_hidden" name="gender" readonly>
                    <input type="text" class="select__output" placeholder="Выберите пол" readonly>
                    <ul class="select-list">
                        @foreach($genders as $gender)
                            <li class="select-list__item" data-name="gender" data-id="{{ $gender}}">
                                {{ $gender }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <svg aria-hidden="true" class="select-arrow">
                    <path
                        d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                </svg>
            </div>
            @error('gender')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

    </div>
    <div class="steep-wrap grid-col-2">
        <div class="input-wrap">
            <span class="input-wrap__title">Дата рождения:</span>
            <div class="input-form @error('date_birth')  no-valid @enderror">
                <input type="text" class="input-text input-required mask-data"
                       placeholder="дд.мм.гггг" id="date_birth" name="date_birth" value="{{ old('date_birth') }}"
                       title="date birth">
            </div>
            @error('date_birth')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">Место рождения:</span>
            <div class="input-form @error('birth_place')  no-valid @enderror">
                <input type="text" class="input-text"
                       name="birth_place"
                       placeholder="Страна, город"
                       value="{{ old('birth_place') }}"
                       title="Место рождения">
            </div>
            @error('birth_place')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">Дата смерти:</span>
            <div class="input-form @error('date_death')  no-valid @enderror">
                <input type="text" class="input-text mask-data" placeholder="дд.мм.гггг"
                       id="date_death" name="date_death" value="{{ old('date_death') }}" title="">
            </div>
            @error('date_death')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">Место захоронения:</span>
            <div class="input-form @error('burial_place')  no-valid @enderror" style="position:relative;">
                <input type="text" class="input-text"
                       id="burial_place"
                       name="burial_place"
                       title="Место захоронения"
                       placeholder="Выбрать на карте"
                       readonly
                       value="{{ old('burial_place') }}">
                <a class="burialPlaceModal" data-hystmodal="#burial_place_location" href="#" style="position:absolute;"
                   title="Указать на карте">
                    <img src="{{ asset('assets/media/media/icons/location.svg') }}" alt="Указать на карте" width="20">
                </a>
                <input type="hidden" name="burial_place_coords" id="burial_place_coords"
                       value="{{ old('burial_place_coords') }}">
            </div>
            @error('burial_place')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">Причина смерти:</span>
            <div class="input-form @error('death_reason')  no-valid @enderror">
                <input type="text" class="input-text" id="death_reason" name="death_reason"
                       value="{{ old('death_reason') }}"
                       title="">
            </div>
            @error('death_reason')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">Свидетельство о смерти:</span>
            <div class="input-form @error('death_certificate')  no-valid @enderror">
                <input type="file" class="profileDocument" id="death_certificate" name="death_certificate" accept=".pdf">
            </div>
            @error('death_certificate')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="steep-wrap grid-col-2">
        <div class="input-wrap">
            <span class="input-wrap__title">Отец</span>
            <div class="select-form @error('father_id') no-valid @enderror">
                <div class="select">
                    <input type="hidden" class="select__output" id="father_id_hidden" name="father_id" readonly>
                    <input type="text" class="select__output" placeholder="Выберите из списка" readonly>

                    <ul class="select-list">
                        @foreach($fathers as $father)
                            <li class="select-list__item" data-name="father_id" data-id="{{ $father->id }}" id="father_id">
                                {{$father->first_name.' '.$father->last_name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <svg aria-hidden="true" class="select-arrow">
                    <path
                        d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                </svg>
            </div>
            @error('father_id')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">Мать</span>
            <div class="select-form @error('mother_id') no-valid @enderror">
                <div class="select">
                    <input type="hidden" class="select__output" id="mother_id_hidden" name="mother_id" readonly>
                    <input type="text" class="select__output" placeholder="Выберите из списка" readonly>

                    <ul class="select-list">
                        @foreach($mothers as $mother)
                            <li class="select-list__item" data-name="mother_id" data-id="{{ $mother->id }}">
                                {{$mother->first_name.' '.$mother->last_name}}
                            </li>
                        @endforeach
                    </ul>
                </div>

                <svg aria-hidden="true" class="select-arrow">
                    <path
                        d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                </svg>
            </div>
            @error('mother_id')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">Супруг / Супруга</span>
            <div class="select-form @error('spouse_id') no-valid @enderror">
                <div class="select">
                    <input type="hidden" class="select__output" id="spouse_id_hidden" name="spouse_id" readonly>
                    <input type="text" class="select__output" placeholder="Выберите из списка" readonly>
                    <ul class="select-list">
                        @foreach($profiles as $profile)
                            <li class="select-list__item" data-name="spouse_id" data-id="{{ $profile->id }}">
                                {{$profile->first_name.' '.$profile->last_name}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <svg aria-hidden="true" class="select-arrow">
                    <path
                        d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                </svg>
            </div>
            @error('spouse_id')
                <span class="is-invalid">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>


