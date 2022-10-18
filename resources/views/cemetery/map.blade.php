@extends('layouts.app')

@section('content')
    <div class="map">
        <div class="map__nav">
            <a class="map-nav__button" href="#slideout-places" role="button" data-slideout=""
               data-slideout-options="{&quot;type&quot;:&quot;people&quot;,&quot;position&quot;:&quot;top&quot;}">
                <span class="map-nav-button__text">Поиск</span>
                <span class="search-filter__icon">
                    <svg xmlns="http://www.w3.org/2000/svg">
              <path
                  d="M15 18c-.6 0-1-.4-1-1v-1.2c-.4-.1-.8-.4-1.1-.7-.6-.5-.9-1.3-.9-2.1s.3-1.6.9-2.1c.3-.3.7-.6 1.1-.7V1c0-.6.4-1 1-1s1 .4 1 1v9.2c.4.1.8.4 1.1.7.6.6.9 1.3.9 2.1s-.3 1.6-.9 2.1c-.3.3-.7.6-1.1.7V17c0 .6-.4 1-1 1zm0-4c.3 0 .5-.1.7-.3s.3-.4.3-.7-.1-.5-.3-.7c-.4-.4-1-.4-1.4 0-.2.2-.3.4-.3.7s.1.5.3.7.4.3.7.3zm-6 4c-.6 0-1-.4-1-1V7.8c-.4-.1-.8-.4-1.1-.7C6.3 6.6 6 5.8 6 5s.3-1.6.9-2.1c.3-.3.7-.6 1.1-.7V1c0-.6.4-1 1-1s1 .4 1 1v1.2c.4.1.8.4 1.1.7.6.5.9 1.3.9 2.1s-.3 1.6-.9 2.1c-.3.3-.7.6-1.1.7V17c0 .6-.4 1-1 1zM9 4c-.3 0-.5.1-.7.3-.2.2-.3.4-.3.7s.1.5.3.7c.4.4 1 .4 1.4 0 .2-.2.3-.4.3-.7s-.1-.5-.3-.7C9.5 4.1 9.3 4 9 4zM3 18c-.6 0-1-.4-1-1v-1.2c-.4-.1-.8-.4-1.1-.7-.6-.5-.9-1.3-.9-2.1s.3-1.6.9-2.1c.3-.3.7-.6 1.1-.7V1c0-.6.4-1 1-1s1 .4 1 1v9.2c.4.1.8.4 1.1.7.6.5.9 1.3.9 2.1s-.3 1.6-.9 2.1c-.3.3-.7.6-1.1.7V17c0 .6-.4 1-1 1zm0-4c.3 0 .5-.1.7-.3.2-.2.3-.4.3-.7s-.1-.5-.3-.7c-.4-.4-1-.4-1.4 0-.2.2-.3.4-.3.7s.1.5.3.7c.2.2.4.3.7.3z"/>
            </svg>
                </span>
                <span class="map-nav-button__badge badge badge-primary">{{ $count_filters }}</span>
            </a>
        </div>
        <div class="map__view">
            <div class="map-view__item">
                <a class="map-view__link active" href="#">На карте</a>
            </div>
            <div class="map-view__item">
                <a class="map-view__link" href="{{ route('cemetery.search.list') . '?NAME=' . request('NAME') . '&ADDRESS=' . request('ADDRESS') }}">Списком</a>
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
