@extends('layouts.app')

@section('content')
    <section class="family-card">
        <div class="family-card-banner">
            <img src="{{ asset('assets/media/media/family/banner_small.webp') }}"
                 data-src="{{ asset('assets/media/media/family/banner.webp') }}"
                 class="bg-img"
                 alt="Баннер семейного захоронения" title="Биннер"/>
        </div>
        <ul class="family-card-nav">
            @foreach($burial->humans as $human)
                <li class="family-card-nav__item" data-src="{{ route('profile.human.show', $human->slug) }}">
                    <div class="family-card-img">
                        <img src="{{ $human->getFirstMediaUrl('avatars', 'thumb') }}" class="bg-img" alt="Аватар профиля"
                             title="Аватар"/>
                    </div>
                    <span class="family-card__name">{{ $human->fullName }}</span>
                    <time class="family-card__live">{{ $human->lifeExpectancy }}</time>
                    <p class="family-card__death">Причина смерти: <span>{{ $human->death_reason }}</span></p>
                </li>


                <li class="family-card-nav__item" title="Добавить">
                    <a href="{{ route('profile.burial.create') }}">
                        <svg viewBox="0 0 41 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M40.9167 23.9115H23.4167V41.4115H17.5833V23.9115H0.0833435V18.0781H17.5833V0.578125H23.4167V18.0781H40.9167V23.9115Z"
                                fill="#BEC5CC"/>
                        </svg>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="family-info">
            <div class="member-info">
                <div class="member-info-wrap">
                    <div class="member-avatar">
                        <div class="member-avatar__wrap">
                            <img src="{{ $firstHuman->getFirstMediaUrl('avatars', 'thumb') }}"
                                 class="bg-img" alt="Аватар профиля" title="Аватар профиля"/>
                        </div>
                    </div>
                    <div class="member-name-wrap">
                        <span class="member-name">{{ $firstHuman->fullName }}</span>
                        <span class="member-ages">{{ $firstHuman->lifeExpectancy }}</span>
                    </div>
                </div>
                <div class="member-info-biography">
                    <p class="member-info__death">Причина смерти: <span class="reason">{{ $firstHuman->death_reason }}</span></p>

                    <ul class="social">
                        <li class="social__item">
                            <a href="#" class="social__link">
                                <img src="{{ asset('assets/img/social/facebook.svg') }}" alt="" title="facebook"/>
                            </a>
                        </li>
                        <li class="social__item">
                            <a href="#" class="social__link">
                                <img src="{{ asset('assets/img/social/instagram.svg') }}" alt="" title="instagram"/>
                            </a>
                        </li>
                        <li class="social__item">
                            <a href="#" class="social__link">
                                <img src="{{ asset('assets/img/social/twitter.svg') }}" alt="" title="twitter"/>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="relatives">
                    <h3 class="relatives__title">Родственники</h3>
                    <ul class="relatives-list">
                        @if (!empty($relatives))
                            @foreach ($relatives as $relative)
                                <li class="relatives-list__item">
                                    <a href="{{ route('profile.human.show', $relative->slug ) }}" class="relatives__link">
                                        <div class="relatives__avatar">
                                            <img src="{{ asset('storage/'. $relative->avatar ) }}"
                                                 class="bg-img" alt="avatar" title="avatar"/>
                                        </div>
                                        <span class="relatives__name">{{ $relative->full_name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <a href="#" class="view-relatives">
                        <div class="view-relatives__icon">
                            <svg xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.8 19.3v5c0 .5-.3.8-.8.8-.4 0-.7-.3-.7-.8v-5c-1.5 1-3 1.4-4.7 1.1-1.2-.2-2.2-.9-2.9-1.7-1.4-1.6-2-4.3 0-6.7C.2 10.7-.3 9.2.5 7.3 1.2 5.7 2.6 5 4.4 4.9c0-.4 0-.7.1-.9.7-2.4 3.1-4.1 5.8-4 2.6.1 4.8 1.9 5.3 4.4.1.3.2.4.6.5 1.8.1 3 1 3.6 2.6.6 1.6.1 3-1.2 4.2l-.1.1v.1c.9 1.1 1.4 2.4 1.2 3.9-.1 1.2-.7 2.3-1.6 3.1-1.9 1.8-4.4 2-7.3.4zm0-8.6.2.1c.3-.3.5-.6.8-.9.4-.4.9-.5 1.2-.2.3.3.3.8-.1 1.2-.6.6-1.2 1.1-1.8 1.7-.2.2-.3.4-.3.6v2.9c0 .6.1 1 .6 1.4 1.6 1.6 4.1 1.7 5.7.1 1.6-1.5 1.5-4-.2-5.4-.7-.6-.6-1.1.2-1.5 1.2-.6 1.7-1.8 1.3-2.9-.4-1.2-1.6-1.8-2.9-1.6-1 .2-1.2 0-1.3-1-.1-2-1.6-3.6-3.6-3.9-2-.1-3.9 1.1-4.6 2.9-.1.4-.1.9-.2 1.4 0 .6-.4.9-1.1.8h-.3c-.6-.1-1.2 0-1.7.4-.5.2-.9.7-1 1.2-.4 1.2.2 2.3 1.4 2.9.7.4.8.9.2 1.4l-.1.1c-.5.4-.8.9-1 1.5s-.4 1.1-.3 1.7c.1.6.3 1.2.6 1.7s.8.9 1.4 1.2c1.6.8 3.4.5 4.7-.7.4-.5.7-.8.7-1.5 0-.4-.1-.8-.5-1.1-.8-.8-1.7-1.5-2.4-2.4-.1-.1-.2-.2-.2-.4V12c0-.2.3-.5.6-.5s.6.1.8.3c.6.5 1.1 1 1.8 1.7V6.1c0-.6.3-.9.8-.9s.8.3.8.9V10l-.2.7z"/>
                            </svg>
                        </div>
                        <span class="view-relatives__text">Смотреть семейное древо</span>
                    </a>
                </div>
            </div>
            <div class="member-images-wrap">
                <ul class="member-images">
                    @forelse($firstHuman->getMedia('gallery') as $gallery)
                        <li class="member-images__item">
                            @if($gallery->mime_type === 'video/mp4')
                                <a href="{{ $gallery->getUrl() }}" class="gallery">
                                    <video src="{{ $gallery->getUrl() }}" class="bg-img"></video>
                                    <svg class="video-play" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M33 19.5 0 39V0l33 19.5z"/>
                                    </svg>
                                </a>
                            @else
                                <a href="{{ $gallery->getUrl() }}" class="gallery">
                                    <img src="{{ $gallery->getUrl('thumb_500') }}" class="bg-img" alt="{{ $gallery->name }}"
                                         title="{{ $gallery->name }}"/>
                                </a>
                            @endif
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>


    </section>
@endsection
