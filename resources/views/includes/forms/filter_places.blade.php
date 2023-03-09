<form class="form-search-places" action="{{ route('cemetery.search.map') }}" method="get">
    <h3 class="form-search-places__title">{{ __('modals.title_search_places') }}</h3>
    <p>{{ __('modals.place_modal_text') }}</p>
    <div class="input-wrap">
        <span class="input-wrap__title">{{__('modals.input_place_title')}}:</span>
        <div class="input-form">
            <input type="text" class="input-text" name="place_name" value="{{ request('place_name') }}" title="Place name"/>
        </div>
    </div>
    <div class="form-search-places__row">
        <div class="input-wrap">
            <span class="input-wrap__title">{{ __('modals.input_place_location') }}:</span>
            <div class="input-form">
                <input type="text" class="input-text" name="place" title="Place" value="{{ request('place') }}"/>
            </div>
        </div>
        <input type="submit" value="{{ __('modals.btn_show') }}" class="btn blue-btn"/>
    </div>
</form>
