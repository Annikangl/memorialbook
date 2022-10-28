@extends('layouts.app')

@section('content')
    <section class="map">

        <x-search-filter
            :count_filters="$count_filters"
            list="true"
            modalHref="#slideout-places"
            slideoutOptions="{&quot;type&quot;:&quot;places&quot;,&quot;position&quot;:&quot;top&quot;}"
            hrefList="{{ route('cemetery.search.list') . '?NAME=' . request('NAME') . '&ADDRESS=' . request('ADDRESS') }}"
        >
        </x-search-filter>

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

