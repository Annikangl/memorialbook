<form class="form-search-people" action="{{ route('profile.humans.search.map') }}">
    <h3 class="form-search-people__title">{{ __('modals.title_search_people') }}</h3>
    <p>{{ __('modals.people_modal_text') }}</p>
    <div class="input-wrap">
        <span class="input-wrap__title">{{ __('modals.input_fullName') }}:</span>
        <div class="input-form">
            <input type="text" class="input-text"
                   name="name"
                   placeholder="John Doe"
                   value="{{ request('name') }}"
                   required
                   title="Full Name"/>
        </div>
    </div>
    <div class="form-search-people__row">
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('modals.input_birthYear') }}</span>
            <div class="input-form">
                <input type="text" class="input-text mask-year"
                       id="birth-year-search"
                       name="birthYear"
                       placeholder="1900-2023 y."
                       value="{{ request('birthYear') }}"
                       required
                       title="Date birth"/>
            </div>
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('modals.input_deathYear') }}</span>
            <div class="input-form">
                <input type="text" class="input-text mask-year"
                       name="deathYear"
                       placeholder="1900-2023 y."
                       value="{{ request('deathYear') }}"
                       required
                       title="Date death"/>
            </div>
        </div>
        <input type="submit" value="{{ __('modals.btn_show') }}" class="btn blue-btn"/>
    </div>
</form>
