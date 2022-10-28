@extends('layouts.app')

@php /** @var \App\Models\Cemetery\Cemetery $cemetery */ @endphp

@section('content')
    <section class="list">

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
                <a href="{{ route('cemetery.search.map') . '?NAME=' . request('NAME') . '&ADDRESS=' . request('ADDRESS') }}" class="select-search__map active">На карте</a>
                <a
                    href="{{ route('cemetery.search.list') . '?NAME=' . request('NAME') . '&ADDRESS=' . request('ADDRESS') }}"
                    class="select-search__list active">Списком</a>
            </div>
        </div>
        <!--button filter end-->

        <!--list cemeteries start-->
        <ul class="cemeteries">
            @foreach($cemeteries as $cemetery)
            <li class="cemeteries__item">
                <a href="{{ route('cemetery.show', ['slug' => $cemetery->slug ]) }}" class="cemeteries__link">
                    <div class="cemeteries-img">
                        <img src="{{ asset('storage/' . $cemetery->avatar) }}" class="bg-img" alt="{{ $cemetery->title }}" title=""/>
                    </div>
                    <div class="cemeteries-info">
                        <h5 class="cemeteries-info__title">{{ $cemetery->title }}</h5>
                        <span class="cemeteries-info__city">{{ $cemetery->address }}</span>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        <!--list cemeteries end-->

        <!--cemeteries pagination start-->
        <div class="cemeteries-buttons">
            <button type="button" class="button-more">Показать еще</button>

            <x-paginator :paginator="$cemeteries"></x-paginator>
        </div>
        <!--cemeteries pagination end-->

    </section>
@endsection
