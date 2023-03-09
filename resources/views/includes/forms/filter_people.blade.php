<form class="form-search-people" action="{{ route('profile.search.map') }}">
    <h3 class="form-search-people__title">{{ __('modals.title_search_people') }}</h3>
    <p>{{ __('modals.people_modal_text') }}</p>
    <div class="input-wrap">
        <span class="input-wrap__title">{{ __('modals.input_fullName') }}:</span>
        <div class="input-form">
            <input type="text" class="input-text" name="full_name" title="Full Name"  value="{{ request('full_name') }}"/>
        </div>
    </div>
    <div class="form-search-people__row">
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('modals.input_birthYear') }}</span>
            <div class="input-form">
                <input type="text" class="input-text" name="birth_date" value="{{ request('birth_date') }}" title="Date birth"/>
            </div>
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('modals.input_deathYear') }}</span>
            <div class="input-form">
                <input type="text" class="input-text" name="death_date" value="{{ request('death_date') }}" title="Date death"/>
            </div>
        </div>
        <input type="submit" value="{{ __('modals.btn_show') }}" class="btn blue-btn"/>
    </div>
</form>
