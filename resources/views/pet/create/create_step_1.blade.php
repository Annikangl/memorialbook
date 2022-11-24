<div class="steep">
    <div class="steep-wrap grid-col-2">
        <div class="user-avatar">
            <div class="preview-avatar">
                <label class="preview-avatar-wrap">
                    <input type="file" accept=".jpg,.jpeg,.png" class="input-avatar" name="avatar" id="change-avatar"/>
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

        <div class="input-wrap">
            <span class="input-wrap__title">Имя питомца:</span>
            <div class="input-form">
                <input type="text" class="input-text input-required" name="name" value="{{ old('name') }}"
                       title="Имя питомца">
            </div>
        </div>

        <div class="input-wrap">
            <span class="input-wrap__title">Порода:</span>
            <div class="input-form">
                <input type="text" class="input-text input-required" name="breed" value="{{ old('breed') }}"
                       title="Порода">
            </div>
        </div>
    </div>
    <div class="steep-wrap grid-col-2">
        <div class="input-wrap">
            <span class="input-wrap__title">Дата рождения:</span>
            <div class="input-form">
                <input type="text" class="input-text input-required mask-data" name="birth_date"
                       {{ old('birth_date') }} title="Дата рождения">
            </div>
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">Место рождения:</span>
            <div class="input-form">
                <input type="text" class="input-text" name="birth_place" value="{{ old('birth_place') }}"
                       title="Место рождения">
            </div>
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">Дата смерти:</span>
            <div class="input-form">
                <input type="text" class="input-text input-required mask-data" name="death_date"
                       value="{{ old('death_date') }}" title="Дата смерти">
            </div>
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">Место захоронения:</span>
            <div class="input-form">
                <input type="text" class="input-text" name="burial_place" value="{{ old('burial_place') }}"
                       title="Место захоронения">
            </div>
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">Причина смерти:</span>

            <div class="select-form">
                <div class="select">
                    <input type="hidden" class="select__output" id="death_reason_hidden" name="death_reason" readonly>
                    <input type="text" class="select__output" id="pet_death_reason" name="death_reason"
                           placeholder="Выберите причину" readonly>
                    <ul class="select-list">
                        @foreach($deathReasons as $reason)
                            <li class="select-list__item" data-name="death_reason" data-id="{{ $reason->id }}">{{ $reason->title }}</li>
                        @endforeach
                    </ul>
                </div>
                <svg aria-hidden="true" class="select-arrow">
                    <path d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                </svg>
            </div>

        </div>
    </div>
</div>
