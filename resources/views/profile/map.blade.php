@extends('layouts.app')

@section('content')

    <div class="map">
        <div class="map__nav">
            <a class="map-nav__button" href="#slideout-people" role="button" data-slideout=""
               data-slideout-options="{&quot;type&quot;:&quot;people&quot;,&quot;position&quot;:&quot;top&quot;}">
                <span class="map-nav-button__text">Поиск</span>
                <span class="map-nav-button__icon">
                                <svg style="width: 18px; height: 18px;" aria-hidden="true">
                                    <use xlink:href="../assets/media/sprite.svg?1644862971818#sprite-filter"></use>
                                </svg>
                            </span>
                <span class="map-nav-button__badge badge badge-primary">5</span>
            </a>
        </div>
        <div class="map__view">
            <div class="map-view__item">
                <a class="map-view__link active" href="../map">На карте</a>
            </div>
{{--            <div class="map-view__item">--}}
{{--                <a class="map-view__link" href="../list">Списком</a>--}}
{{--            </div>--}}
        </div>
        <div class="map__results">
            <button class="map-results__title" type="button">
                <div class="map-results-title__text">Найдено 2 279 человек</div>
                <div class="map-results-title__comment">
                    <div class="map-results-title-comment__text -default">Показать</div>
                    <div class="map-results-title-comment__text -active">Скрыть</div>
                    <div class="map-results-title-comment__icon">
                        <svg style="width: 14px; height: 8px;" aria-hidden="true">
                            <use xlink:href="../assets/media/sprite.svg?1644862971818#sprite-arrow"></use>
                        </svg>
                    </div>
                </div>
            </button>
            <div class="map-results__content">
                <div class="map-results__items">
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f1.png" alt="Георг VI">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Георг VI</div>
                                <div class="map-results__dates">1895 - 1952 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f2.png" alt="Елизавета Боуз-Лайон">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Елизавета Боуз-Лайон</div>
                                <div class="map-results__dates">1900 - 2002 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f5.png" alt="Елизавета II">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Елизавета II</div>
                                <div class="map-results__dates">род. в 1962 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f3.png" alt="Филипп, герцог Эдинбургский">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Филипп, герцог Эдинбургский</div>
                                <div class="map-results__dates">1921 - 2021 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f8.png" alt="Чарльз, принц Уэльский">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Чарльз, принц Уэльский</div>
                                <div class="map-results__dates">род. в 1948 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f9.png" alt="Диана, принцесса Уэльская">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Диана, принцесса Уэльская</div>
                                <div class="map-results__dates">1961 - 1997 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f14.png" alt="Уильям, герцог Кембриджский">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Уильям, герцог Кембриджский</div>
                                <div class="map-results__dates">род. в 1982 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f13.png" alt="Кэтрин, герцогиня Кембриджская">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Кэтрин, герцогиня Кембриджская</div>
                                <div class="map-results__dates">род. в 1982 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f17.png" alt="Джордж Кембриджский">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Джордж Кембриджский</div>
                                <div class="map-results__dates">род. в 2013 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f18.png" alt="Шарлотта Кембриджская">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Шарлотта Кембриджская</div>
                                <div class="map-results__dates">род. в 2015 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f19.png" alt="Луи Кембриджский">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Луи Кембриджский</div>
                                <div class="map-results__dates">род. в 2013 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f15.png" alt="Гарри, герцог Сассекский">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Гарри, герцог Сассекский</div>
                                <div class="map-results__dates">род. в 1984 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f16.png" alt="Меган, герцогиня Сассекская">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Меган, герцогиня Сассекская</div>
                                <div class="map-results__dates">род. в 1981 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f7.png" alt="Камилла, герцогиня Корнуолльская">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Камилла, герцогиня Корнуолльская</div>
                                <div class="map-results__dates">род. в 1947 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f10.png" alt="Принцесса Анна">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Принцесса Анна</div>
                                <div class="map-results__dates">род. в 1950 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f11.png" alt="Эндрю, герцог Йоркский">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Эндрю, герцог Йоркский</div>
                                <div class="map-results__dates">род. в 1960 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f12.png" alt="Эдвард, граф Уэссекский">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Эдвард, граф Уэссекский</div>
                                <div class="map-results__dates">род. в 1964 г.</div>
                            </div>
                        </a>
                    </div>
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="../assets/uploads/tree/f6.png" alt="Маргарет, принцесса Великобритании">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">Маргарет, принцесса Великобритании</div>
                                <div class="map-results__dates">1930 - 2002 г.</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="map__container"></div>
        <script>
            window.markersContent = [{
                "title": "Айдахо",
                "coords": "44.3509, -114.613"
            }, {
                "title": "Айова",
                "coords": "42.0751, -93.496"
            }, {
                "title": "Алабама",
                "coords": "32.7794, -86.8287"
            }, {
                "title": "Аляска",
                "coords": "64.0685, -152.2782"
            }, {
                "title": "Аризона",
                "coords": "34.2744, -111.6602"
            }, {
                "title": "Арканзас",
                "coords": "34.8938, -92.4426"
            }, {
                "title": "Вайоминг",
                "coords": "42.9957, -107.5512"
            }, {
                "title": "Вашингтон",
                "coords": "47, -120"
            }]
        </script>
    </div>

@endsection
