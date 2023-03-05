<form class="form-search-places" action="{{ route('cemetery.search.map') }}" method="get">
    <h3 class="form-search-places__title">Поиск мест</h3>
    <p>Введите фамилию, имя, отчество профиля, который вы хотите найти. <br/>Если вы не уверенны в датах, укажите примерные.</p>
    <div class="input-wrap">
        <span class="input-wrap__title">Название:</span>
        <div class="input-form">
            <input type="text" class="input-text" name="place_name" value="{{ request('place_name') }}" title="Place name"/>
        </div>
    </div>
    <div class="form-search-places__row">
        <div class="input-wrap">
            <span class="input-wrap__title">Местоположение:</span>
            <div class="input-form">
                <input type="text" class="input-text" name="place" title="Place" value="{{ request('place') }}"/>
            </div>
        </div>
        <input type="submit" value="Показать" class="btn blue-btn"/>
    </div>
</form>
