@extends('layouts.app')

@section('content')
    <section class="map">
        <!--button filter start-->
        <div class="search">
            <div class="search-filter" href="#slideout-places" role="button" data-slideout=""
                 data-slideout-options="{&quot;type&quot;:&quot;places&quot;,&quot;position&quot;:&quot;top&quot;}">
                <span class="search-filter__title">Поиск</span>
                <div class="search-filter__icon">
                    <svg xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 18c-.6 0-1-.4-1-1v-1.2c-.4-.1-.8-.4-1.1-.7-.6-.5-.9-1.3-.9-2.1s.3-1.6.9-2.1c.3-.3.7-.6 1.1-.7V1c0-.6.4-1 1-1s1 .4 1 1v9.2c.4.1.8.4 1.1.7.6.6.9 1.3.9 2.1s-.3 1.6-.9 2.1c-.3.3-.7.6-1.1.7V17c0 .6-.4 1-1 1zm0-4c.3 0 .5-.1.7-.3s.3-.4.3-.7-.1-.5-.3-.7c-.4-.4-1-.4-1.4 0-.2.2-.3.4-.3.7s.1.5.3.7.4.3.7.3zm-6 4c-.6 0-1-.4-1-1V7.8c-.4-.1-.8-.4-1.1-.7C6.3 6.6 6 5.8 6 5s.3-1.6.9-2.1c.3-.3.7-.6 1.1-.7V1c0-.6.4-1 1-1s1 .4 1 1v1.2c.4.1.8.4 1.1.7.6.5.9 1.3.9 2.1s-.3 1.6-.9 2.1c-.3.3-.7.6-1.1.7V17c0 .6-.4 1-1 1zM9 4c-.3 0-.5.1-.7.3-.2.2-.3.4-.3.7s.1.5.3.7c.4.4 1 .4 1.4 0 .2-.2.3-.4.3-.7s-.1-.5-.3-.7C9.5 4.1 9.3 4 9 4zM3 18c-.6 0-1-.4-1-1v-1.2c-.4-.1-.8-.4-1.1-.7-.6-.5-.9-1.3-.9-2.1s.3-1.6.9-2.1c.3-.3.7-.6 1.1-.7V1c0-.6.4-1 1-1s1 .4 1 1v9.2c.4.1.8.4 1.1.7.6.5.9 1.3.9 2.1s-.3 1.6-.9 2.1c-.3.3-.7.6-1.1.7V17c0 .6-.4 1-1 1zm0-4c.3 0 .5-.1.7-.3.2-.2.3-.4.3-.7s-.1-.5-.3-.7c-.4-.4-1-.4-1.4 0-.2.2-.3.4-.3.7s.1.5.3.7c.2.2.4.3.7.3z"/>
                    </svg>
                    <span class="search-filter__current-filters">{{ $count_filters }}</span>
                </div>
            </div>

            <div class="select-search">
                <a href="#" class="select-search__map active">На карте</a>
                <a
                    href="{{ route('cemetery.search.list') . '?NAME=' . request('NAME') . '&ADDRESS=' . request('ADDRESS') }}"
                    class="select-search__list">Списком</a>
            </div>
        </div>
        <!--button filter end-->

        <!--map result start-->
        <div class="map-results">
            <div class="map-results__title-wrap">
                <span class="map-results__title">Найдено {{ $cemeteries->total() }} кладбищ</span>
                <button type="button" class="map-results__unwrap">
                    Развернуть
                    <svg xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                    </svg>
                </button>
            </div>

            <ul class="map-results__list">
                @foreach($cemeteries as $cemetery)
                    <li class="map-results__item" data-lat="{{ $cemetery->latitude }}"
                        data-lng="{{ $cemetery->longitude }}">
                        <a href="{{ route('cemetery.show', ['slug' => $cemetery->slug]) }}" class="map-results__link">
                            <div class="map-results__img">
                                <img src="{{ asset('storage/' . $cemetery->avatar) }}" class="bg-img"
                                     alt="{{ $cemetery->title }}"
                                     title="{{ $cemetery->title }}"/>
                            </div>
                            <div class="map-results__info">
                                <span class="map-results__name">{{ $cemetery->title }}</span>
                                <span class="map-results__years">{{ $cemetery->email  }}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!--map result end-->

        <div class="map-wrap"></div>
    </section>

@endsection

@section('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO1W6X1LgXeZzrDSNL6YMbZm9Z9NAPH5Y&callback=initMap&v=weekly"
        defer
    ></script>
@endsection
