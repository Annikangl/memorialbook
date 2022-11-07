@extends('layouts.app')

@section('content')
    <section class="news">
        <nav class="news-menu-nav">
            <ul class="news-menu">
                {{--                <li class="news-menu__item">--}}
                {{--                    <a href="#" class="news-menu__link">Люди</a>--}}
                {{--                </li>--}}
                {{--                <li class="news-menu__item">--}}
                {{--                    <a href="#" class="news-menu__link"> Места</a>--}}
                {{--                </li>--}}
                <li class="news-menu__item">
                    <a href="#" class="news-menu__link">Сообщества</a>
                </li>
                <li class="news-menu__item">
                    <a href="#" class="news-menu__link">Питомцы</a>
                </li>
                {{--                <li class="news-menu__item">--}}
                {{--                    <a href="#" class="news-menu__link">Семейное дерево</a>--}}
                {{--                </li>--}}
                {{--                <li class="news-menu__item">--}}
                {{--                    <a href="#" class="news-menu__link">Магазин</a>--}}
                {{--                </li>--}}
                <li class="news-menu__item active">
                    <a href="#" class="news-menu__link">Новости</a>
                </li>
            </ul>
        </nav>
        <div class="news-content">
            <div class="news-wrap">
                <div class="profiles-title-wrap">
                    <h3 class="profiles-title">Ваши профили ({{ $profiles->count() }})</h3>
                    <div class="profiles-title-arrows">
                        <button type="button" class="arrows-left">
                            <svg width="9" height="13" viewBox="0 0 9 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.99897 11.6387L1.13358 5.77323" stroke-width="2"/>
                                <line x1="7.49519" y1="0.826247" x2="2.09519" y2="6.22625" stroke-width="2"/>
                            </svg>
                        </button>
                        <button type="button" class="arrows-right">
                            <svg width="9" height="13" viewBox="0 0 9 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.00103 1.12109L7.86642 6.98654" stroke-width="2"/>
                                <line x1="1.50481" y1="11.9335" x2="6.90481" y2="6.53352" stroke-width="2"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="swiper swiper-profiles">
                    <ul class="list-profiles swiper-wrapper">
                        <li class="list-profiles__item swiper-slide">
                            <a href="{{ route('profile.create') }}" class="list-profiles__link" title="Создать профиль">
                                <div class="list-profiles__img">
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18.2012 8.27148V11.3301H0.658203V8.27148H18.2012ZM11.0645 0.800781V19.4336H7.8125V0.800781H11.0645Z"/>
                                    </svg>
                                </div>
                                <span class="profile-text">Создать профиль</span>
                            </a>
                        </li>
                        @forelse($profiles as $profile)
                            <li class="list-profiles__item swiper-slide">
                                <div class="list-profiles-img-wrap">
                                    <div class="list-profiles__img">
                                        <img src="{{ asset('storage/' . $profile->avatar) }}" class="bg-img"
                                             alt="{{ $profile->full_name }}"
                                             title="{{ $profile->full_name }}"/>
                                    </div>
                                    <a href="#" class="list-profiles-mark" title="Редактировать профиль">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.7215 3.30173L14.6992 6.27942L11.7215 3.30173ZM12.9847 2.03857C13.3796 1.64371 13.9151 1.42188 14.4735 1.42188C15.032 1.42188 15.5675 1.64371 15.9624 2.03857C16.3572 2.43344 16.5791 2.96899 16.5791 3.52742C16.5791 4.08584 16.3572 4.62139 15.9624 5.01626L4.36827 16.6104H1.4209V13.6024L12.9847 2.03857V2.03857Z"
                                                stroke-width="1.68421" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                                <span class="profile-time">{{ $profile->yearBirth}} {{ $profile->yearDeath }} г.</span>
                                <a href="{{ route('profile.show', ['slug' => $profile->slug]) }}"
                                   class="profile-text">{{ $profile->full_name }}</a>
                            </li>
                        @empty

                        @endforelse

                    </ul>
                </div>
            </div>
            <div class="news-wrap">
                <div class="profiles-title-wrap">
                    <h3 class="profiles-title">Связанные профили</h3>
                    <div class="profiles-title-arrows">
                        <button type="button" class="arrows-left">
                            <svg width="9" height="13" viewBox="0 0 9 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.99897 11.6387L1.13358 5.77323" stroke-width="2"/>
                                <line x1="7.49519" y1="0.826247" x2="2.09519" y2="6.22625" stroke-width="2"/>
                            </svg>
                        </button>
                        <button type="button" class="arrows-right">
                            <svg width="9" height="13" viewBox="0 0 9 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.00103 1.12109L7.86642 6.98654" stroke-width="2"/>
                                <line x1="1.50481" y1="11.9335" x2="6.90481" y2="6.53352" stroke-width="2"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="swiper swiper-profiles">
                    <ul class="list-profiles swiper-wrapper">
                        @forelse($relatives as $relative)
                            <li class="list-profiles__item swiper-slide">
                                <div class="list-profiles-img-wrap">
                                    <div class="list-profiles__img">
                                        <img src="{{ asset('storage/' . $relative->avatar) }}" class="bg-img"
                                             alt="{{ $relative->full_name }}"
                                             title="{{ $relative->full_name }}"/>
                                    </div>
                                    <a href="#" class="list-profiles-mark" title="Редактировать профиль">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.7215 3.30173L14.6992 6.27942L11.7215 3.30173ZM12.9847 2.03857C13.3796 1.64371 13.9151 1.42188 14.4735 1.42188C15.032 1.42188 15.5675 1.64371 15.9624 2.03857C16.3572 2.43344 16.5791 2.96899 16.5791 3.52742C16.5791 4.08584 16.3572 4.62139 15.9624 5.01626L4.36827 16.6104H1.4209V13.6024L12.9847 2.03857V2.03857Z"
                                                stroke-width="1.68421" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                                <span class="profile-time">{{ $relative->yearBirth}} {{ $relative->yearDeath }}г.</span>
                                <a href="{{ route('profile.show', ['slug' => $relative->slug ]) }}"
                                   class="profile-text">
                                    {{ $relative->full_name }}
                                </a>
                            </li>
                        @empty

                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="news-wrap">
                <div class="profiles-title-wrap">
                    <h3 class="profiles-title">Питомцы</h3>
                </div>
                <div class="swiper swiper-profiles">
                    <ul class="list-profiles swiper-wrapper">
                        <li class="list-profiles__item swiper-slide">
                            <a href="{{ route('profile.create') }}" class="list-profiles__link" title="Создать профиль">
                                <div class="list-profiles__img">
                                    <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18.2012 8.27148V11.3301H0.658203V8.27148H18.2012ZM11.0645 0.800781V19.4336H7.8125V0.800781H11.0645Z"/>
                                    </svg>
                                </div>
                                <span class="profile-text">Создать профиль</span>
                            </a>
                        </li>
                        @forelse($pets as $pet)
                            <li class="list-profiles__item swiper-slide">
                                <div class="list-profiles-img-wrap">
                                    <div class="list-profiles__img">
                                        <img src="{{ asset('storage/' . $pet->avatar) }}" class="bg-img"
                                             alt="{{ $pet->full_name }}"
                                             title=""/>
                                    </div>
                                    <a href="#" class="list-profiles-mark" title="Редактировать профиль">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.7215 3.30173L14.6992 6.27942L11.7215 3.30173ZM12.9847 2.03857C13.3796 1.64371 13.9151 1.42188 14.4735 1.42188C15.032 1.42188 15.5675 1.64371 15.9624 2.03857C16.3572 2.43344 16.5791 2.96899 16.5791 3.52742C16.5791 4.08584 16.3572 4.62139 15.9624 5.01626L4.36827 16.6104H1.4209V13.6024L12.9847 2.03857V2.03857Z"
                                                stroke-width="1.68421" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                                <span class="profile-time">{{ $pet->yearBirth }} - {{ $pet->yearDeath }}г.</span>
                                <a href="#" class="profile-text">
                                    {{ $pet->full_name }}
                                </a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>

            @include('includes.partials.news')

        </div>
        <div class="qr-code"></div>
    </section>
@endsection
