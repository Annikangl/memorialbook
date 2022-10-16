<div class="filter -people" id="slideout-people">
    <form class="form" action="{{ route('profile.search.map') }}" method="get">
        <div class="container">
            <div class="form__top">
                <div class="form__inner">
                    <div class="form__left">
                        <div class="form__title">Поиск людей</div>
                    </div>
                    <div class="form__right">
                        <div class="form__form-group form-group">
                            <div class="form__message">Введите фамилию, имя, отчество
                                профиля, который вы хотите найти. Если
                                вы не уверенны в датах, укажите примерные.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__items">
                <div class="form__inner">
                    <div class="form__left">
                        <div class="form__row row">
                            <div class="form__col -fio col">
                                <div class="form__form-group form-group">
                                    <label class="form__label" for="filter-people-fio">ФИО:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control"
                                               type="text" id="filter-people-fio"
                                               name="FIO" placeholder=" " value="{{ request('FIO') }}">
                                        <button class="form__button -close close"
                                                type="button"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form__right">
                        <div class="form__row row">
                            <div class="form__col -birth col">
                                <div class="form__form-group form-group">
                                    <label class="form__label"
                                           for="filter-people-birth">Год
                                        рождения:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control"
                                               type="text" id="filter-people-birth"
                                               name="BIRTH" placeholder="XXXX-XXXX г."
                                               value="{{ request('BIRTH') }}"
                                               data-mask="9999-9999">
                                        <button class="form__button -close close"
                                                type="button"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form__col -death col">
                                <div class="form__form-group form-group">
                                    <label class="form__label"
                                           for="filter-people-death">Год смерти:</label>
                                    <div class="form__input-container">
                                        <input class="form__input form-control"
                                               type="text" id="filter-people-death"
                                               name="DEATH" placeholder="XXXX-XXXX г."
                                               value="{{ request('DEATH') }}"
                                               data-mask="9999-9999">
                                        <button class="form__button -close close"
                                                type="button"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form__col -submit col">
                                <div class="form__form-group -submit form-group">
                                    <button
                                        class="form__button -submit btn btn-primary btn-lg"
                                        type="submit">
                                        <span>Показать</span>
                                        <span>2 799</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
