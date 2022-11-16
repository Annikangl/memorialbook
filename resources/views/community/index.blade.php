@extends('layouts.app')

@section('title')
    <title>Мои сообщества</title>
@endsection

@section('content')
    <section class="list">
        <div class="section-title">Сообщества</div>
        <ul class="communities">
            @forelse($communities as $community)
                <li class="cemeteries__item">
                    <a href="{{ route('community.show', ['slug' => $community->slug ]) }}" class="cemeteries__link">
                        <div class="cemeteries-img">
                            <img src="{{ asset('storage/' . $community->avatar) }}" class="bg-img"
                                 alt="{{ $community->title }}" title=""/>
                        </div>
                        <div class="cemeteries-info">
                            <h5 class="cemeteries-info__title">{{ $community->title }}</h5>
                        </div>
                    </a>
                </li>
            @empty
            <p>Вы не состоите ни в одном сообществе</p>
            @endforelse
        </ul>
    </section>
@endsection
