@extends('layouts.app')

@section('content')
    <section class="map">

        <x-search-filter
            :count_filters="$count_filters"
            modalHref="#slideout-people"
            slideoutOptions="{&quot;type&quot;:&quot;people&quot;,&quot;position&quot;:&quot;top&quot;}"
        ></x-search-filter>

        <!--map result start-->
        <div class="map-results">
            <div class="map-results__title-wrap">
                <span
                    class="map-results__title">
                    {{ __('map.founded', ['count' => $profiles->total(), 'entity' => 'people']) }}
                </span>
                <button type="button" class="map-results__unwrap">
                    {{ __('map.unwrap') }}
                    <svg xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                    </svg>
                </button>
            </div>

            <ul class="map-results__list">
                @foreach($profiles as $profile)
                    <li class="map-results__item" data-lat="{{ $profile->latitude }}"
                        data-lng="{{ $profile->longitude }}">
                        <a href="{{ route('profile.show', ['slug' => $profile->slug]) }}" class="map-results__link">
                            <div class="map-results__img">
                                <img src="{{ $profile->getFirstMediaUrl('avatars', 'thumb') }}" class="bg-img"
                                     alt="{{ $profile->full_name }}"
                                     title="{{ $profile->full_name }}"/>
                            </div>
                            <div class="map-results__info">
                                <span class="map-results__name">{{ $profile->full_name }}</span>
                                <span class="map-results__years">{{ $profile->yearBirth }} - {{ $profile->yearDeath }} г.</span>
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
    <script>
        // function unwrap result search
        if (document.querySelector('.map-results')) {
            let buttonUnwrap = document.querySelector('.map-results__unwrap');

            let mapResultsUnwrap = function () {
                let listResult = document.querySelector('.map-results');
                listResult.classList.toggle('unwrap');
            }

            buttonUnwrap.addEventListener('click', mapResultsUnwrap);
        }

    </script>
@endsection
