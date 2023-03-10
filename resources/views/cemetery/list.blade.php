@extends('layouts.app')

@php /** @var \App\Models\Cemetery\Cemetery $cemetery */ @endphp

@section('content')
    <section class="list">

        <!--button filter start-->
        <x-search-filter
            :count_filters="$count_filters"
            list="true"
            modalHref="#slideout-places"
            slideoutOptions="{&quot;type&quot;:&quot;places&quot;,&quot;position&quot;:&quot;top&quot;}"
            hrefMap="{{ route('cemetery.search.map') . '?NAME=' . request('NAME') . '&ADDRESS=' . request('ADDRESS') }}"
        >
        </x-search-filter>
        <!--button filter end-->

        <!--list cemeteries start-->
        <ul class="cemeteries">
            @foreach($cemeteries as $cemetery)
                <li class="cemeteries__item">
                    <a href="{{ route('cemetery.show', ['slug' => $cemetery->slug ]) }}" class="cemeteries__link">
                        <div class="cemeteries-img">
                            <img src="{{ asset('storage/' . $cemetery->avatar) }}" class="bg-img"
                                 alt="{{ $cemetery->title }}" title=""/>
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
            <button type="button" class="button-more">{{ __('cemeteries_list.load more') }}</button>

            <x-paginator :paginator="$cemeteries"></x-paginator>
        </div>
        <!--cemeteries pagination end-->

    </section>
@endsection
