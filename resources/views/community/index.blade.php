@extends('layouts.app')

@section('title')
 Communities
@endsection

@section('content')
    <section class="list">
        <div class="section-title">Communities</div>
        <ul class="communities">
            @forelse($communities as $community)
                <li class="cemeteries__item">
                    <a href="{{ route('community.show', ['slug' => $community->slug ]) }}" class="cemeteries__link">
                        <div class="cemeteries-img">
                            <img src="{{ $community->getFirstMediaUrl('avatars', 'thumb')  }}" class="bg-img"
                                 alt="{{ $community->title }}" title="{{ $community->title }}"/>
                        </div>
                        <div class="cemeteries-info">
                            <h5 class="cemeteries-info__title">{{ $community->title }}</h5>
                        </div>
                    </a>
                </li>
            @empty
            <p>Communities is not available now</p>
            @endforelse
        </ul>
    </section>
@endsection
