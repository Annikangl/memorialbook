@extends('layouts.app')
@php /** @var \App\Models\Profile\Human\Human $human */@endphp

@section('content')
    <section class="member-card">
        <div class="member-info">
            <div class="member-info-wrap">
                <div class="member-avatar">
                    <div class="member-avatar__wrap">
                        <img src="{{ $human->getFirstMediaUrl('avatars', 'thumb') }}" class="bg-img" alt="avatar"
                             title="avatar"/>
                    </div>
                    @if($human->user_id === auth()->id())
                        <a href="{{ route('profile.human.edit', $human) }}" class="member-avatar__change-link">
                            <svg xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.8 16.9h-3c-.4 0-.8-.4-.8-.9v-3c0-.2.1-.4.2-.6L11.8.9c1.1-1.1 3.1-1.1 4.2 0 .6.6.9 1.3.9 2.1s-.3 1.5-.9 2.1l-1.2 1.2L4.4 16.6c-.2.2-.4.3-.6.3zm-2.1-1.7h1.8L13 5.7l-1.8-1.8-9.5 9.5v1.8zM12.3 2.7l1.8 1.8.7-.7c.2-.2.4-.6.4-.9 0-.3-.1-.7-.4-.9-.5-.5-1.3-.5-1.8 0l-.7.7z"/>
                            </svg>
                        </a>
                    @endif
                </div>
                <div class="member-name-wrap">
                    <span class="member-name">{{ $human->full_name }}</span>
                    <span class="member-ages">{{ $human->lifeExpectancy }}</span>
                </div>
            </div>
            <div class="member-info-biography">
                <p class="member-info__death">
                    {{ __('show_profile.Death cause') }}: <span class="reason">{{ $human->death_reason }}</span>
                </p>
                <p>{{ $human->description }}</p>


{{--                <ul class="social">--}}
{{--                    <li class="social__item">--}}
{{--                        <a href="#" class="social__link">--}}
{{--                            <img src="{{ asset('assets/img/social/facebook.svg') }}"--}}
{{--                                 alt="facebook"--}}
{{--                                 title="facebook"/>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="social__item">--}}
{{--                        <a href="#" class="social__link">--}}
{{--                            <img src="{{ asset('assets/img/social/instagram.svg') }}"--}}
{{--                                 alt="instagram"--}}
{{--                                 title="instagram"/>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="social__item">--}}
{{--                        <a href="#" class="social__link">--}}
{{--                            <img src="{{ asset('assets/img/social/twitter.svg') }}"--}}
{{--                                 alt="twitter"--}}
{{--                                 title="twitter"/>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
            <div class="relatives">
                <h3 class="relatives__title">{{ __('show_profile.Kinsfolk') }}</h3>
                <ul class="relatives-list">
                    @if (!empty($relatives))
                        @foreach ($relatives as $relative)
                            <li class="relatives-list__item">
                                <a href="{{ route('profile.human.show', $relative->slug ) }}" class="relatives__link">
                                    <div class="relatives__avatar">
                                        <img src="{{  $relative->getFirstMediaUrl('avatars') }}"
                                             class="bg-img" alt="{{ $relative->fullName }}"
                                             title="{{ $relative->fullName }}"/>
                                    </div>
                                    <span class="relatives__name">{{ $relative->full_name }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <a href="{{ route('tree') }}" class="view-relatives">
                    <div class="view-relatives__icon">
                        <svg xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.8 19.3v5c0 .5-.3.8-.8.8-.4 0-.7-.3-.7-.8v-5c-1.5 1-3 1.4-4.7 1.1-1.2-.2-2.2-.9-2.9-1.7-1.4-1.6-2-4.3 0-6.7C.2 10.7-.3 9.2.5 7.3 1.2 5.7 2.6 5 4.4 4.9c0-.4 0-.7.1-.9.7-2.4 3.1-4.1 5.8-4 2.6.1 4.8 1.9 5.3 4.4.1.3.2.4.6.5 1.8.1 3 1 3.6 2.6.6 1.6.1 3-1.2 4.2l-.1.1v.1c.9 1.1 1.4 2.4 1.2 3.9-.1 1.2-.7 2.3-1.6 3.1-1.9 1.8-4.4 2-7.3.4zm0-8.6.2.1c.3-.3.5-.6.8-.9.4-.4.9-.5 1.2-.2.3.3.3.8-.1 1.2-.6.6-1.2 1.1-1.8 1.7-.2.2-.3.4-.3.6v2.9c0 .6.1 1 .6 1.4 1.6 1.6 4.1 1.7 5.7.1 1.6-1.5 1.5-4-.2-5.4-.7-.6-.6-1.1.2-1.5 1.2-.6 1.7-1.8 1.3-2.9-.4-1.2-1.6-1.8-2.9-1.6-1 .2-1.2 0-1.3-1-.1-2-1.6-3.6-3.6-3.9-2-.1-3.9 1.1-4.6 2.9-.1.4-.1.9-.2 1.4 0 .6-.4.9-1.1.8h-.3c-.6-.1-1.2 0-1.7.4-.5.2-.9.7-1 1.2-.4 1.2.2 2.3 1.4 2.9.7.4.8.9.2 1.4l-.1.1c-.5.4-.8.9-1 1.5s-.4 1.1-.3 1.7c.1.6.3 1.2.6 1.7s.8.9 1.4 1.2c1.6.8 3.4.5 4.7-.7.4-.5.7-.8.7-1.5 0-.4-.1-.8-.5-1.1-.8-.8-1.7-1.5-2.4-2.4-.1-.1-.2-.2-.2-.4V12c0-.2.3-.5.6-.5s.6.1.8.3c.6.5 1.1 1 1.8 1.7V6.1c0-.6.3-.9.8-.9s.8.3.8.9V10l-.2.7z"/>
                        </svg>
                    </div>
                    <span class="view-relatives__text">View family tree</span>
                </a>
            </div>
        </div>
        <div class="member-images-wrap">
            <ul class="member-images">
                @forelse($human->getMedia('gallery') as $gallery)
                    <li class="member-images__item">
                        @if($gallery->mime_type === 'video/mp4')
                            <a href="{{$gallery->getUrl() }}" class="gallery">
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
    </section>

@endsection
