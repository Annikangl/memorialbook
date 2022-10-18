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
                <span class="map-nav-button__badge badge badge-primary">{{ $count_filters }}</span>
            </a>
        </div>
        <div class="map__view">
            <div class="map-view__item">
                <a class="map-view__link active" href="#">На карте</a>
            </div>
{{--            <div class="map-view__item">--}}
{{--                <a class="map-view__link" href="../list">Списком</a>--}}
{{--            </div>--}}
        </div>
        <div class="map__results">
            <button class="map-results__title" type="button">
                <div class="map-results-title__text">Найдено {{ $profiles->count() }} человек</div>
                <div class="map-results-title__comment">
                    <div class="map-results-title-comment__text -default">Показать</div>
                    <div class="map-results-title-comment__text -active">Скрыть</div>
                    <div class="map-results-title-comment__icon">
                        <svg style="width: 14px; height: 8px;" aria-hidden="true">
                            <use xlink:href="{{ asset('assets/media/media/sprite.svg?#sprite-arrow') }}"></use>
                        </svg>
                    </div>
                </div>
            </button>
            <div class="map-results__content">
                <div class="map-results__items">
                    @foreach($profiles as $profile)
                    <div class="map-results__item">
                        <a class="map-results__link" href="javascript:void(0)">
                            <div class="map-results__image">
                                <img class="map-results-image__image" src="{{ asset('assets/uploads/tree/f1.png') }}" alt="Георг VI">
                            </div>
                            <div class="map-results__info">
                                <div class="map-results__name">{{ $profile->fullName }}</div>
                                <div class="map-results__dates">{{ $profile->date_birth }} - {{ $profile->date_death }} г.</div>
                            </div>
                        </a>
                    </div>
                    @endforeach

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
