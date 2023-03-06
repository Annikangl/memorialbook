@extends('layouts.app')

@section('content')
    <style>
        .footer {
            display: none !important;
        }
    </style>
    <section class="qr-page">
        <div class="qr-code__banner">
            <img src="{{ asset('assets/media/media/family/banner_small.webp') }}"
                 data-src="{{ asset('assets/media/media/family/banner.webp') }}"
                 class="bg-img"
                 alt="Баннер семейного захоронения" title="Биннер"/>
            <span class="qr-code__mark">Family burial</span>
        </div>

        <div class="qr-code-slider swiper">
            <button type="button" class="qr-code-slider__prev">
                <svg
                    width="8"
                    height="12"
                    viewBox="0 0 8 12"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M1.29007 9.88L5.17007 6L1.29007 2.12C1.19749 2.02742 1.12405 1.91751 1.07394 1.79654C1.02384 1.67558 0.998047 1.54593 0.998047 1.415C0.998047 1.28407 1.02384 1.15442 1.07394 1.03346C1.12405 0.912494 1.19749 0.802583 1.29007 0.710001C1.38265 0.617419 1.49256 0.543979 1.61352 0.493874C1.73449 0.443769 1.86414 0.41798 1.99507 0.41798C2.126 0.41798 2.25565 0.443769 2.37661 0.493874C2.49757 0.543979 2.60749 0.617419 2.70007 0.710001L7.29007 5.3C7.68007 5.69 7.68007 6.32 7.29007 6.71L2.70007 11.3C2.60755 11.3927 2.49767 11.4663 2.37669 11.5164C2.25572 11.5666 2.12604 11.5924 1.99507 11.5924C1.8641 11.5924 1.73442 11.5666 1.61344 11.5164C1.49247 11.4663 1.38258 11.3927 1.29007 11.3C0.910068 10.91 0.900068 10.27 1.29007 9.88Z"
                        fill="#175ED9"
                    />
                </svg>
            </button>

            <ul class="qr-code-slider__list swiper-wrapper">
                @foreach($familyBurial->humans as $human)
                <li class="qr-code-slider__item swiper-slide">
                    <div class="qr-code-slider__avatar">
                        <img src="{{ $human->getFirstMediaUrl('avatars', 'thumb') }}" class="bg-img" alt="Аватар профиля"
                             title="Аватар"/>
                    </div>
                    <span class="qr-code-slider__name">{{ $human->fullName }}</span>
                </li>
                @endforeach
            </ul>

            <button type="button" class="qr-code-slider__next">
                <svg
                    width="8"
                    height="12"
                    viewBox="0 0 8 12"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M1.29007 9.88L5.17007 6L1.29007 2.12C1.19749 2.02742 1.12405 1.91751 1.07394 1.79654C1.02384 1.67558 0.998047 1.54593 0.998047 1.415C0.998047 1.28407 1.02384 1.15442 1.07394 1.03346C1.12405 0.912494 1.19749 0.802583 1.29007 0.710001C1.38265 0.617419 1.49256 0.543979 1.61352 0.493874C1.73449 0.443769 1.86414 0.41798 1.99507 0.41798C2.126 0.41798 2.25565 0.443769 2.37661 0.493874C2.49757 0.543979 2.60749 0.617419 2.70007 0.710001L7.29007 5.3C7.68007 5.69 7.68007 6.32 7.29007 6.71L2.70007 11.3C2.60755 11.3927 2.49767 11.4663 2.37669 11.5164C2.25572 11.5666 2.12604 11.5924 1.99507 11.5924C1.8641 11.5924 1.73442 11.5666 1.61344 11.5164C1.49247 11.4663 1.38258 11.3927 1.29007 11.3C0.910068 10.91 0.900068 10.27 1.29007 9.88Z"
                        fill="#175ED9"
                    />
                </svg>
            </button>
        </div>

        <div class="qr-profile__info">
            <p class="qr-profile__info-text">
                Head of the State Museum contemporary art.
            </p>
            <span class="qr-profile__info-item">{{ $human->lifeExpectancy }}</span>
            <span class="qr-profile__info-item">Причина смерти: {{ $human->death_reason }}</span>
        </div>

        <a href="{{ route('profile.family.show', $familyBurial) }}" class="full-profile-link blue-btn">View full profile</a>

        <div class="member-images-wrap">
            <div class="member-images__style">
                <button type="button" class="btn-style-grid">
                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M20 0H0V20H20V0ZM6 18H2V14H6V18ZM6 12H2V8H6V12ZM6 6H2V2H6V6ZM12 18H8V14H12V18ZM12 12H8V8H12V12ZM12 6H8V2H12V6ZM18 18H14V14H18V18ZM18 12H14V8H18V12ZM18 6H14V2H18V6Z"
                            fill="#333333"
                        />
                    </svg>
                </button>
                <button type="button" class="btn-style-inline">
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M20 4H4H2V6V18V20H4H20H22V18V6V4H20ZM20 6H4V18H20V6Z"
                            fill="#333333"
                        />
                        <rect x="2" y="21" width="20" height="1" fill="#333333" />
                        <rect x="2" y="2" width="20" height="1" fill="#333333" />
                    </svg>
                </button>
            </div>
            <ul class="member-images">
                @forelse($human->getMedia('gallery') as $gallery)

                <li class="member-images__item">
                    @if($gallery->mime_type === 'video/mp4')
                    <a href="{{ $gallery->getUrl() }}" class="gallery">
                        <video
                            src="{{ $gallery->getUrl() }}"
                            class="bg-img"
                        ></video>
                        <svg class="video-play" xmlns="http://www.w3.org/2000/svg">
                            <path d="M33 19.5 0 39V0l33 19.5z" />
                        </svg>
                    </a>
                    @else
                        <a
                            href="{{ $gallery->getUrl() }}"
                            class="gallery"
                            rel="gallery"
                        >
                            <img
                                src="{{ $gallery->getUrl('thumb_500') }}"
                                class="bg-img"
                                alt=""
                                title="{{ $gallery->name }}"
                            />
                        </a>
                    @endif
                </li>
                @empty
                @endforelse
            </ul>
        </div>
    </section>
@endsection
