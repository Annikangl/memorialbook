@extends('layouts.app')
@php /** @var \App\Models\Profile\Profile $profile */@endphp

@section('content')
    <div class="member-card">
        <div class="container">
            <div class="member-card__row row">
                <div class="member-card__side -content col">
                    <div class="member-card__header">
                        <div class="member-card-header__avatar">
                            <div class="member-card-header-avatar__image">
                                <img class="member-card-header-avatar__img"
                                     src="{{ asset('storage/' . $profile->avatar)  }}" alt="{{ $profile->full_name }}">
                            </div>
                            @if($profile->user_id === auth()->id())
                            <a class="member-card-header-avatar__edit-link" href="{{ route('profile.edit', $profile ) }}">
                                <svg xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.8 16.9h-3c-.4 0-.8-.4-.8-.9v-3c0-.2.1-.4.2-.6L11.8.9c1.1-1.1 3.1-1.1 4.2 0 .6.6.9 1.3.9 2.1s-.3 1.5-.9 2.1l-1.2 1.2L4.4 16.6c-.2.2-.4.3-.6.3zm-2.1-1.7h1.8L13 5.7l-1.8-1.8-9.5 9.5v1.8zM12.3 2.7l1.8 1.8.7-.7c.2-.2.4-.6.4-.9 0-.3-.1-.7-.4-.9-.5-.5-1.3-.5-1.8 0l-.7.7z"/>
                                </svg>
                            </a>
                            @endif
                        </div>
                        <div class="member-card-header__content">
                            <h1 class="member-card__name">
                                <span>{{ $profile->full_name }}</span>
                                <span class="member-card__religion"></span>
                            </h1>
                            <div class="member-card__dates">{{ $profile->lifeExpectancy }}</div>
                        </div>
                    </div>
                    <div class="member-card__info">
                        <div class="member-card-info__text">Причина смерти: {{ $profile->death_reason }}</div>
                        <div class="member-card-info__text">{{ $profile->description }}</div>
                    </div>

                    @if (!empty($profile->hobbies))
                        <div class="member-card__hobbies">
                            @foreach($profile->hobbies as $hobby)
                                <div class="member-card-hobbies__item">
                                    <div class="member-card-hobbies__label">{{ $hobby->title }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <ul class="social">
                        <li class="social__item">
                            <a href="#" class="social__link">
                                <img src="{{ asset('assets/media/media/icons/social/facebook.svg') }}" alt="facebook" title="facebook"/>
                            </a>
                        </li>
                        <li class="social__item">
                            <a href="#" class="social__link">
                                <img src="{{ asset('assets/media/media/icons/social/instagram.svg') }}" alt="instagram" title="instagram"/>
                            </a>
                        </li>
                        <li class="social__item">
                            <a href="#" class="social__link">
                                <img src="{{ asset('assets/media/media/icons/social/twitter.svg') }}" alt="instagram" title="instagram"/>
                            </a>
                        </li>
                    </ul>
                    <div class="member-card__relatives">
                        <div class="member-card-relatives__header">
                            <h4 class="member-card-relatives__title">Родственники</h4>
                            <a class="member-card-relatives__header-link" href="../tree">Семейное дерево</a>
                        </div>
                        <div class="member-card-relatives__content">
                            <div class="member-card-relatives__list">

                                @if (!empty($relatives))
                                    @foreach ($relatives as $relative)
                                        <div class="member-card-relatives__item">
                                            <a class="member-card-relatives-item__link"
                                               href="{{ route('profile.show', ['slug' => $relative->slug]) }}">
                                                <div class="member-card-relatives-item__content">
                                                    <div class="member-card-relatives-item__avatar">
                                                        <img class="member-card-relatives-item__image"
                                                             src="{{ asset('storage/' . $relative->avatar ) }}"
                                                             alt="avatar">
                                                    </div>
                                                    <div class="member-card-relatives-item__name">
                                                        {{ $relative->full_name }}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="member-card-relatives__item -not-mobile">
                                    <a class="view-relatives" href="../tree">
                                        <div class="member-card-relatives-item__content">
                                            <div class="view-relatives__icon">
                                                <svg xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.8 19.3v5c0 .5-.3.8-.8.8-.4 0-.7-.3-.7-.8v-5c-1.5 1-3 1.4-4.7 1.1-1.2-.2-2.2-.9-2.9-1.7-1.4-1.6-2-4.3 0-6.7C.2 10.7-.3 9.2.5 7.3 1.2 5.7 2.6 5 4.4 4.9c0-.4 0-.7.1-.9.7-2.4 3.1-4.1 5.8-4 2.6.1 4.8 1.9 5.3 4.4.1.3.2.4.6.5 1.8.1 3 1 3.6 2.6.6 1.6.1 3-1.2 4.2l-.1.1v.1c.9 1.1 1.4 2.4 1.2 3.9-.1 1.2-.7 2.3-1.6 3.1-1.9 1.8-4.4 2-7.3.4zm0-8.6.2.1c.3-.3.5-.6.8-.9.4-.4.9-.5 1.2-.2.3.3.3.8-.1 1.2-.6.6-1.2 1.1-1.8 1.7-.2.2-.3.4-.3.6v2.9c0 .6.1 1 .6 1.4 1.6 1.6 4.1 1.7 5.7.1 1.6-1.5 1.5-4-.2-5.4-.7-.6-.6-1.1.2-1.5 1.2-.6 1.7-1.8 1.3-2.9-.4-1.2-1.6-1.8-2.9-1.6-1 .2-1.2 0-1.3-1-.1-2-1.6-3.6-3.6-3.9-2-.1-3.9 1.1-4.6 2.9-.1.4-.1.9-.2 1.4 0 .6-.4.9-1.1.8h-.3c-.6-.1-1.2 0-1.7.4-.5.2-.9.7-1 1.2-.4 1.2.2 2.3 1.4 2.9.7.4.8.9.2 1.4l-.1.1c-.5.4-.8.9-1 1.5s-.4 1.1-.3 1.7c.1.6.3 1.2.6 1.7s.8.9 1.4 1.2c1.6.8 3.4.5 4.7-.7.4-.5.7-.8.7-1.5 0-.4-.1-.8-.5-1.1-.8-.8-1.7-1.5-2.4-2.4-.1-.1-.2-.2-.2-.4V12c0-.2.3-.5.6-.5s.6.1.8.3c.6.5 1.1 1 1.8 1.7V6.1c0-.6.3-.9.8-.9s.8.3.8.9V10l-.2.7z"/>
                                                </svg>
                                            </div>
                                            <div class="member-card-relatives-item__name">Смотреть семейное древо
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="member-card__side -gallery col">
                    <div class="member-card__gallery">
                        <div class="member-card-gallery__items">
                            @foreach($profile->galleries as $gallery)
                                @if ($gallery->isVideo())
                                    <div class="member-card-gallery__item">
                                        <a class="member-card-gallery__link -video"
                                           href="{{ asset('storage/' . $gallery->item ) }}">
                                            <video class="member-card-gallery__video"
                                                   src="{{ asset('storage/' . $gallery->item ) }}" muted=""></video>
                                            <div class="member-card-gallery__play">
                                                <svg class="video-play" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M33 19.5 0 39V0l33 19.5z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    <div class="member-card-gallery__item">
                                        <a class="member-card-gallery__link"
                                           href="{{ asset('storage/' . $gallery->item ) }}"
                                           data-popup-gallery-item="">
                                            <img class="member-card-gallery__image"
                                                 src="{{ asset('storage/' . $gallery->item_sm ) }}" alt="">
                                        </a>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
