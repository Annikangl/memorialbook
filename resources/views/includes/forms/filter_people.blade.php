<form class="form-search-people" action="{{ route('profile.search.map') }}">
    <h3 class="form-search-people__title">Поиск людей</h3>
    <p>Введите фамилию, имя, отчество профиля, который вы хотите найти. <br/>Если вы не уверенны в датах, укажите примерные.</p>
    <div class="input-wrap">
        <span class="input-wrap__title">ФИО:</span>
        <div class="input-form">
            <input type="text" class="input-text" name="full_name" title="Full Name"  value="{{ request('full_name') }}"/>
        </div>
    </div>
    <div class="form-search-people__row">
        <div class="input-wrap">
            <span class="input-wrap__title">Год рождения:</span>
            <div class="input-form">
                <input type="text" class="input-text" name="birth_date" value="{{ request('birth_date') }}" title="Date birth"/>
            </div>
        </div>
        <div class="input-wrap">
            <span class="input-wrap__title">Год смерти:</span>
            <div class="input-form">
                <input type="text" class="input-text" name="death_date" value="{{ request('death_date') }}" title="Date death"/>
            </div>
        </div>
        <input type="submit" value="Показать" class="btn blue-btn"/>
    </div>
</form>
