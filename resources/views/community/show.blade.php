@extends('layouts.app')

@section('content')
    <section class="community">
        <div class="community-banner">
            <img src="{{ asset('storage/uploads/community/community-banner.png') }}"
                 class="bg-img"
                 alt=""
                 title=""/>
        </div>
        <div class="community-preview">
            <div class="community-preview-title">
                <div class="community-preview__logo">
                    <img src="{{ asset('storage/uploads/community/logo.png') }}" class="bg-img" alt="" title=""/>
                </div>
                <h4 class="community-name">Biker Сlub «Sons of Anarchy»</h4>
                <h5 class="community-country">Арлингтон, Virginia, Соединенные Штаты</h5>
                <div class="followers-wrap">
                    <span class="followers-number">Подписчики: 173</span>
                    <ul class="followers">
                        <li class="followers__item">
                            <img src="{{ asset('storage/uploads/community/followers/img-1.png') }}" class="bg-img"
                                 alt="" title=""/>
                        </li>
                        <li class="followers__item">
                            <img src="{{ asset('storage/uploads/community/followers/img-2.png') }}" class="bg-img"
                                 alt="" title=""/>
                        </li>
                        <li class="followers__item">
                            <img src="{{ asset('storage/uploads/community/followers/img-3.png') }}" class="bg-img"
                                 alt="" title=""/>
                        </li>
                        <li class="followers__item">
                            <img src="{{ asset('storage/uploads/community/followers/img-4.png') }}" class="bg-img"
                                 alt="" title=""/>
                        </li>
                        <li class="followers__item">
                            <img src="{{ asset('storage/uploads/community/followers/img-5.png') }}" class="bg-img"
                                 alt="" title=""/>
                        </li>
                        <li class="followers__item">
                            <img src="{{ asset('storage/uploads/community/followers/img-6.png') }}" class="bg-img"
                                 alt="" title=""/>
                        </li>
                        <li class="followers__item">
                            <img src="{{ asset('storage/uploads/community/followers/img-7.png') }}" class="bg-img"
                                 alt="" title=""/>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="community-preview-buttons">
                <button type="button" class="button-search" data-hystmodal="#search-post-modal">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M14.3248 12.8987L19.7048 18.2787C19.8939 18.468 20 18.7246 20 18.9921C19.9999 19.2596 19.8935 19.5161 19.7043 19.7052C19.515 19.8943 19.2584 20.0005 18.9909 20.0004C18.7234 20.0003 18.4669 19.894 18.2778 19.7047L12.8978 14.3247C11.2895 15.5704 9.26705 16.1566 7.24189 15.9641C5.21674 15.7716 3.341 14.8148 1.99625 13.2884C0.6515 11.7619 -0.0612416 9.78056 0.00301976 7.74729C0.0672812 5.71402 0.903718 3.7816 2.34217 2.34315C3.78063 0.904695 5.71305 0.0682577 7.74631 0.00399633C9.77958 -0.0602651 11.761 0.652477 13.2874 1.99723C14.8138 3.34198 15.7706 5.21772 15.9631 7.24287C16.1556 9.26802 15.5694 11.2905 14.3238 12.8987H14.3248ZM7.99977 13.9997C9.59107 13.9997 11.1172 13.3676 12.2424 12.2424C13.3676 11.1172 13.9998 9.59104 13.9998 7.99974C13.9998 6.40845 13.3676 4.88232 12.2424 3.7571C11.1172 2.63189 9.59107 1.99974 7.99977 1.99974C6.40847 1.99974 4.88235 2.63189 3.75713 3.7571C2.63191 4.88232 1.99977 6.40845 1.99977 7.99974C1.99977 9.59104 2.63191 11.1172 3.75713 12.2424C4.88235 13.3676 6.40847 13.9997 7.99977 13.9997Z"/>
                    </svg>
                </button>
                <x-modal id="search-post-modal" class="search_post_modal"
                    long="hystmodal__window--long">
                    <div class="modal-search" id="modal-search">

                        <form class="search-form">
                            <div class="search-input-wrap">
                                <svg class="search-input__icon" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.3248 12.8987L19.7048 18.2787C19.8939 18.468 20 18.7246 20 18.9921C19.9999 19.2596 19.8935 19.5161 19.7043 19.7052C19.515 19.8943 19.2584 20.0005 18.9909 20.0004C18.7234 20.0003 18.4669 19.894 18.2778 19.7047L12.8978 14.3247C11.2895 15.5704 9.26705 16.1566 7.24189 15.9641C5.21674 15.7716 3.341 14.8148 1.99625 13.2884C0.6515 11.7619 -0.0612416 9.78056 0.00301976 7.74729C0.0672812 5.71402 0.903718 3.7816 2.34217 2.34315C3.78063 0.904695 5.71305 0.0682577 7.74631 0.00399633C9.77958 -0.0602651 11.761 0.652477 13.2874 1.99723C14.8138 3.34198 15.7706 5.21772 15.9631 7.24287C16.1556 9.26802 15.5694 11.2905 14.3238 12.8987H14.3248ZM7.99977 13.9997C9.59107 13.9997 11.1172 13.3676 12.2424 12.2424C13.3676 11.1172 13.9998 9.59104 13.9998 7.99974C13.9998 6.40845 13.3676 4.88232 12.2424 3.7571C11.1172 2.63189 9.59107 1.99974 7.99977 1.99974C6.40847 1.99974 4.88235 2.63189 3.75713 3.7571C2.63191 4.88232 1.99977 6.40845 1.99977 7.99974C1.99977 9.59104 2.63191 11.1172 3.75713 12.2424C4.88235 13.3676 6.40847 13.9997 7.99977 13.9997Z" fill="#4F4F4F"/>
                                </svg>
                                <input type="search" class="search-input" placeholder="Поиск" title="Поиск"/>
                            </div>
                        </form>

                        <div class="result-search-placeholder">
                            <h5 class="result-search-placeholder__title">Что-то ищете?</h5>
                            <p class="result-search-placeholder__text">Поиск публикаций, фото, видео и пр. от Biker Сlub «Sons of Anarchy»</p>
                        </div>

{{--                        <article class="community-article">--}}
{{--                            <div class="article-author">--}}
{{--                                <div class="article-author-avatar">--}}
{{--                                    <img src="{{ asset('storage/uploads/community/logo.png') }}" class="bg-img" alt="" title=""/>--}}
{{--                                </div>--}}
{{--                                <div class="article-author-name-wrap">--}}
{{--                                    <h6 class="article-author__name">Biker Сlub «Sons of Anarchy»</h6>--}}
{{--                                    <time class="article-author-date">23 октября 2022 г.</time>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <img src="{{ asset('storage/uploads/community/img-1.jpg') }}" class="article-img" alt="" title=""/>--}}

{{--                            <p class="article-text">A large foam brick wall was constructed and weathered to look like the real deal.--}}
{{--                                Artists then worked around the clock to spray paint the characters in great detail.</p>--}}

{{--                            <button type="button" class="article-repost">--}}
{{--                                <svg class="article-repost__icon" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M18.8978 8.59977L11.5644 1.26643C11.4362 1.13828 11.2729 1.051 11.0951 1.01565C10.9173 0.980296 10.733 0.998449 10.5656 1.06781C10.3981 1.13718 10.255 1.25464 10.1542 1.40535C10.0535 1.55606 9.99971 1.73325 9.99967 1.91452V5.1641C7.49561 5.39583 5.16813 6.55364 3.47272 8.41096C1.77732 10.2683 0.836007 12.6914 0.833008 15.2062V16.5812C0.833153 16.7715 0.892508 16.957 1.00284 17.112C1.11318 17.267 1.26902 17.3839 1.44876 17.4464C1.62849 17.5088 1.82321 17.5138 2.00591 17.4606C2.18861 17.4074 2.35022 17.2987 2.46834 17.1495C3.3664 16.0816 4.46828 15.2033 5.70962 14.566C6.95096 13.9287 8.30686 13.5452 9.69809 13.4379C9.74392 13.4324 9.85851 13.4233 9.99967 13.4141V16.5812C9.99971 16.7625 10.0535 16.9396 10.1542 17.0904C10.255 17.2411 10.3981 17.3585 10.5656 17.4279C10.733 17.4972 10.9173 17.5154 11.0951 17.48C11.2729 17.4447 11.4362 17.3574 11.5644 17.2293L18.8978 9.89593C19.0696 9.72403 19.1661 9.49092 19.1661 9.24785C19.1661 9.00478 19.0696 8.77167 18.8978 8.59977ZM11.833 14.3684V12.4562C11.833 12.2131 11.7364 11.9799 11.5645 11.808C11.3926 11.6361 11.1595 11.5395 10.9163 11.5395C10.6826 11.5395 9.72834 11.5854 9.48451 11.6174C7.01397 11.8451 4.66231 12.7837 2.71401 14.3198C2.93515 12.298 3.89425 10.4288 5.40768 9.07016C6.92111 7.71149 8.88251 6.95879 10.9163 6.95618C11.1595 6.95618 11.3926 6.85961 11.5645 6.6877C11.7364 6.51579 11.833 6.28263 11.833 6.03952V4.12735L16.9535 9.24785L11.833 14.3684Z"/>--}}
{{--                                </svg>--}}
{{--                                <span class="article-repost__number">26</span>--}}
{{--                            </button>--}}
{{--                        </article>--}}
                    </div>
                </x-modal>
                <button type="button"
                        class="blue-btn btn community_subscribe"
                        id="community_subscribe"
                data-slug="sons_of_anarchy">
                    Подписаться
                </button>
            </div>
        </div>
        <ul class="community-nav">
            <li class="community-nav__item current">Стена памяти</li>
            <li class="community-nav__item">Мемориалы</li>
            <li class="community-nav__item">Фото</li>
            <li class="community-nav__item">Видео</li>
        </ul>

        <div class="community-content">
            <div class="community-content-left">
                <article class="community-article">
                    <div class="article-author">
                        <div class="article-author-avatar">
                            <img src="{{ asset('storage/uploads/community/avatar-1.png') }}" class="bg-img" alt=""
                                 title=""/>
                        </div>
                        <div class="article-author-name-wrap">
                            <h6 class="article-author__name">Public Name</h6>
                            <span class="article-author__mark">запись закреплена</span>
                            <time class="article-author-date">23 октября 2022 г.</time>
                        </div>
                    </div>

                    <div class="swiper article-slider">
                        <ul class="article-slider-list swiper-wrapper">
                            <li class="article-slider-list__item swiper-slide">
                                <a href="{{ asset('storage/uploads/community/poster.png') }}"
                                   class="article-slider-list__link gallery" data-fancybox="img-slider">
                                    <img src="{{ asset('storage/uploads/community/poster.png') }}" alt="" title=""/>
                                </a>
                            </li>
                            <li class="article-slider-list__item swiper-slide">
                                <a href="{{ asset('storage/uploads/community/poster.png') }}"
                                   class="article-slider-list__link gallery" data-fancybox="img-slider">
                                    <img src="{{ asset('storage/uploads/community/poster.png') }}" alt="" title=""/>
                                </a>
                            </li>
                            <li class="article-slider-list__item swiper-slide">
                                <a href="{{ asset('storage/uploads/community/poster.png') }}"
                                   class="article-slider-list__link gallery" data-fancybox="img-slider">
                                    <img src="{{ asset('storage/uploads/community/poster.png') }}" alt="" title=""/>
                                </a>
                            </li>
                            <li class="article-slider-list__item swiper-slide">
                                <a href="{{ asset('storage/uploads/community/poster.png') }}"
                                   class="article-slider-list__link gallery" data-fancybox="img-slider">
                                    <img src="{{ asset('storage/uploads/community/poster.png') }}" alt="" title=""/>
                                </a>
                            </li>
                        </ul>

                        <button type="button" class="arrows-left">
                            <svg width="8" height="13" viewBox="0 0 8 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.63862 11.8789L0.773231 6.01346" stroke-width="2"/>
                                <line x1="7.13484" y1="1.06648" x2="1.73484" y2="6.46648" stroke-width="2"/>
                            </svg>
                        </button>
                        <button type="button" class="arrows-right">
                            <svg width="9" height="13" viewBox="0 0 9 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.00006 1.36133L7.86544 7.22677" stroke-width="2"/>
                                <line x1="1.50383" y1="12.1738" x2="6.90383" y2="6.77375" stroke-width="2"/>
                            </svg>
                        </button>

                        <ul class="swiper-pagination"></ul>
                    </div>

                    <p class="article-text">FX's original series, Sons of Anarchy, is an adrenalized drama with darkly
                        comedic
                        undertones that explores a notorious outlaw motorcycle club's (MC) desire to protect its
                        livelihood while
                        ensuring that their simple, sheltered town of Charming, California remains exactly that,
                        Charming.</p>
                    <p class="article-text">The MC must confront threats from drug dealers, corporate developers, and
                        overzealous law officers. Behind the MC's familial lifestyle and legally thriving automotive
                        shop is a
                        ruthless and illegally thriving arms business. The seduction of money, power, and blood.</p>

                    <button type="button" class="article-repost">
                        <svg class="article-repost__icon" viewBox="0 0 20 18" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.8978 8.59977L11.5644 1.26643C11.4362 1.13828 11.2729 1.051 11.0951 1.01565C10.9173 0.980296 10.733 0.998449 10.5656 1.06781C10.3981 1.13718 10.255 1.25464 10.1542 1.40535C10.0535 1.55606 9.99971 1.73325 9.99967 1.91452V5.1641C7.49561 5.39583 5.16813 6.55364 3.47272 8.41096C1.77732 10.2683 0.836007 12.6914 0.833008 15.2062V16.5812C0.833153 16.7715 0.892508 16.957 1.00284 17.112C1.11318 17.267 1.26902 17.3839 1.44876 17.4464C1.62849 17.5088 1.82321 17.5138 2.00591 17.4606C2.18861 17.4074 2.35022 17.2987 2.46834 17.1495C3.3664 16.0816 4.46828 15.2033 5.70962 14.566C6.95096 13.9287 8.30686 13.5452 9.69809 13.4379C9.74392 13.4324 9.85851 13.4233 9.99967 13.4141V16.5812C9.99971 16.7625 10.0535 16.9396 10.1542 17.0904C10.255 17.2411 10.3981 17.3585 10.5656 17.4279C10.733 17.4972 10.9173 17.5154 11.0951 17.48C11.2729 17.4447 11.4362 17.3574 11.5644 17.2293L18.8978 9.89593C19.0696 9.72403 19.1661 9.49092 19.1661 9.24785C19.1661 9.00478 19.0696 8.77167 18.8978 8.59977ZM11.833 14.3684V12.4562C11.833 12.2131 11.7364 11.9799 11.5645 11.808C11.3926 11.6361 11.1595 11.5395 10.9163 11.5395C10.6826 11.5395 9.72834 11.5854 9.48451 11.6174C7.01397 11.8451 4.66231 12.7837 2.71401 14.3198C2.93515 12.298 3.89425 10.4288 5.40768 9.07016C6.92111 7.71149 8.88251 6.95879 10.9163 6.95618C11.1595 6.95618 11.3926 6.85961 11.5645 6.6877C11.7364 6.51579 11.833 6.28263 11.833 6.03952V4.12735L16.9535 9.24785L11.833 14.3684Z"/>
                        </svg>
                        <span class="article-repost__number">430</span>
                    </button>
                </article>

                <article class="community-article">
                    <div class="article-author">
                        <div class="article-author-avatar">
                            <img src="{{ asset('storage/uploads/community/logo.png') }}" class="bg-img" alt=""
                                 title=""/>
                        </div>
                        <div class="article-author-name-wrap">
                            <h6 class="article-author__name">Biker Сlub «Sons of Anarchy»</h6>
                            <time class="article-author-date">23 октября 2022 г.</time>
                        </div>
                    </div>

                    <p class="article-text">Были добавлены 2 профиля.</p>
                    <ul class="article-profile">
                        <li class="article-profile__item">
                            <div class="article-profile__img">
                                <img src="{{ asset('storage/uploads/community/avatar-1.png') }}" class="bg-img" alt=""
                                     title=""/>
                            </div>
                            <span class="article-profile__date">1964 - 2008 г.</span>
                            <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                        </li>
                        <li class="article-profile__item">
                            <div class="article-profile__img">
                                <img src="{{ asset('storage/uploads/community/avatar-2.png') }}" class="bg-img" alt=""
                                     title=""/>
                            </div>
                            <span class="article-profile__date">1964 - 2008 г.</span>
                            <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                        </li>
                    </ul>
                </article>

                <article class="community-article">
                    <div class="article-author">
                        <div class="article-author-avatar">
                            <img src="{{ asset('storage/uploads/community/logo.png') }}" class="bg-img" alt=""
                                 title=""/>
                        </div>
                        <div class="article-author-name-wrap">
                            <h6 class="article-author__name">Biker Сlub «Sons of Anarchy»</h6>
                            <time class="article-author-date">23 октября 2022 г.</time>
                        </div>
                    </div>

                    <img src="{{ asset('storage/uploads/community/img-1.jpg') }}" class="article-img" alt="" title=""/>

                    <p class="article-text">A large foam brick wall was constructed and weathered to look like the real
                        deal.
                        Artists then worked around the clock to spray paint the characters in great detail.</p>

                    <button type="button" class="article-repost">
                        <svg class="article-repost__icon" viewBox="0 0 20 18" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.8978 8.59977L11.5644 1.26643C11.4362 1.13828 11.2729 1.051 11.0951 1.01565C10.9173 0.980296 10.733 0.998449 10.5656 1.06781C10.3981 1.13718 10.255 1.25464 10.1542 1.40535C10.0535 1.55606 9.99971 1.73325 9.99967 1.91452V5.1641C7.49561 5.39583 5.16813 6.55364 3.47272 8.41096C1.77732 10.2683 0.836007 12.6914 0.833008 15.2062V16.5812C0.833153 16.7715 0.892508 16.957 1.00284 17.112C1.11318 17.267 1.26902 17.3839 1.44876 17.4464C1.62849 17.5088 1.82321 17.5138 2.00591 17.4606C2.18861 17.4074 2.35022 17.2987 2.46834 17.1495C3.3664 16.0816 4.46828 15.2033 5.70962 14.566C6.95096 13.9287 8.30686 13.5452 9.69809 13.4379C9.74392 13.4324 9.85851 13.4233 9.99967 13.4141V16.5812C9.99971 16.7625 10.0535 16.9396 10.1542 17.0904C10.255 17.2411 10.3981 17.3585 10.5656 17.4279C10.733 17.4972 10.9173 17.5154 11.0951 17.48C11.2729 17.4447 11.4362 17.3574 11.5644 17.2293L18.8978 9.89593C19.0696 9.72403 19.1661 9.49092 19.1661 9.24785C19.1661 9.00478 19.0696 8.77167 18.8978 8.59977ZM11.833 14.3684V12.4562C11.833 12.2131 11.7364 11.9799 11.5645 11.808C11.3926 11.6361 11.1595 11.5395 10.9163 11.5395C10.6826 11.5395 9.72834 11.5854 9.48451 11.6174C7.01397 11.8451 4.66231 12.7837 2.71401 14.3198C2.93515 12.298 3.89425 10.4288 5.40768 9.07016C6.92111 7.71149 8.88251 6.95879 10.9163 6.95618C11.1595 6.95618 11.3926 6.85961 11.5645 6.6877C11.7364 6.51579 11.833 6.28263 11.833 6.03952V4.12735L16.9535 9.24785L11.833 14.3684Z"/>
                        </svg>
                        <span class="article-repost__number">26</span>
                    </button>
                </article>

                <article class="community-article">
                    <div class="article-author">
                        <div class="article-author-avatar">
                            <img src="{{ asset('storage/uploads/community/logo.png') }}" class="bg-img" alt=""
                                 title=""/>
                        </div>
                        <div class="article-author-name-wrap">
                            <h6 class="article-author__name">Biker Сlub «Sons of Anarchy»</h6>
                            <time class="article-author-date">23 октября 2022 г.</time>
                        </div>
                    </div>
                    <div class="community-content-title-wrap">
                        <h6 class="community-content__title">Сбор пожертвований</h6>
                    </div>

                    <img src="{{ asset('storage/uploads/community/img-2.png') }}" class="article-img" alt="" title=""/>

                    <p class="article-text">A different side of two SOA alums. See Ally Walker’s new film, Sex, Death
                        and
                        Bowling, starring Drea De Matteo in theaters November 6th.</p>
                    <p class="article-text">Get tickets here:
                        <a href="#">http://www.laemmle.com/theaters/25/2015-11-06#get-tickets</a></p>

                    <button type="button" class="article-repost">
                        <svg class="article-repost__icon" viewBox="0 0 20 18" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.8978 8.59977L11.5644 1.26643C11.4362 1.13828 11.2729 1.051 11.0951 1.01565C10.9173 0.980296 10.733 0.998449 10.5656 1.06781C10.3981 1.13718 10.255 1.25464 10.1542 1.40535C10.0535 1.55606 9.99971 1.73325 9.99967 1.91452V5.1641C7.49561 5.39583 5.16813 6.55364 3.47272 8.41096C1.77732 10.2683 0.836007 12.6914 0.833008 15.2062V16.5812C0.833153 16.7715 0.892508 16.957 1.00284 17.112C1.11318 17.267 1.26902 17.3839 1.44876 17.4464C1.62849 17.5088 1.82321 17.5138 2.00591 17.4606C2.18861 17.4074 2.35022 17.2987 2.46834 17.1495C3.3664 16.0816 4.46828 15.2033 5.70962 14.566C6.95096 13.9287 8.30686 13.5452 9.69809 13.4379C9.74392 13.4324 9.85851 13.4233 9.99967 13.4141V16.5812C9.99971 16.7625 10.0535 16.9396 10.1542 17.0904C10.255 17.2411 10.3981 17.3585 10.5656 17.4279C10.733 17.4972 10.9173 17.5154 11.0951 17.48C11.2729 17.4447 11.4362 17.3574 11.5644 17.2293L18.8978 9.89593C19.0696 9.72403 19.1661 9.49092 19.1661 9.24785C19.1661 9.00478 19.0696 8.77167 18.8978 8.59977ZM11.833 14.3684V12.4562C11.833 12.2131 11.7364 11.9799 11.5645 11.808C11.3926 11.6361 11.1595 11.5395 10.9163 11.5395C10.6826 11.5395 9.72834 11.5854 9.48451 11.6174C7.01397 11.8451 4.66231 12.7837 2.71401 14.3198C2.93515 12.298 3.89425 10.4288 5.40768 9.07016C6.92111 7.71149 8.88251 6.95879 10.9163 6.95618C11.1595 6.95618 11.3926 6.85961 11.5645 6.6877C11.7364 6.51579 11.833 6.28263 11.833 6.03952V4.12735L16.9535 9.24785L11.833 14.3684Z"/>
                        </svg>
                        <span class="article-repost__number">153</span>
                    </button>
                </article>

            </div>

            <div class="community-content-right">

                <article class="community-article">
                    <div class="community-content-title-wrap">
                        <h6 class="community-content__title">Информация</h6>
                    </div>

                    <p class="article-text">FX's original series, Sons of Anarchy, is an adrenalized drama with darkly
                        comedic
                        undertones that explores a notorious outlaw motorcycle club's (MC) desire to protect its
                        livelihood while
                        ensuring that their simple, sheltered town of Charming, California remains exactly that,
                        Charming.</p>
                    <p class="article-text">The MC must confront threats from drug dealers, corporate developers, and
                        overzealous law officers. Behind the MC's familial lifestyle and legally thriving automotive
                        shop is a
                        ruthless and illegally thriving arms business. The seduction of money, power, and blood.</p>
                    <p class="article-text"> Website: <a href="#">www.sonsofanarchy.com</a></p>
                </article>

                <article class="community-article">
                    <div class="community-content-title-wrap">
                        <h6 class="community-content__title">Люди</h6>
                        <div class="community-content-arrows">
                            <button type="button" class="arrows-left">
                                <svg width="8" height="13" viewBox="0 0 8 13" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.63862 11.8789L0.773231 6.01346" stroke-width="2"/>
                                    <line x1="7.13484" y1="1.06648" x2="1.73484" y2="6.46648" stroke-width="2"/>
                                </svg>
                            </button>
                            <button type="button" class="arrows-right">
                                <svg width="9" height="13" viewBox="0 0 9 13" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.00006 1.36133L7.86544 7.22677" stroke-width="2"/>
                                    <line x1="1.50383" y1="12.1738" x2="6.90383" y2="6.77375" stroke-width="2"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="swiper article-profile-slider">
                        <ul class="article-profile swiper-wrapper">
                            <li class="article-profile__item swiper-slide">
                                <div class="article-profile__img">
                                    <img src="{{ asset('storage/uploads/community/avatar-1.png') }}" class="bg-img"
                                         alt="" title=""/>
                                </div>
                                <span class="article-profile__date">1964 - 2008 г.</span>
                                <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                            </li>
                            <li class="article-profile__item swiper-slide">
                                <div class="article-profile__img">
                                    <img src="{{ asset('storage/uploads/community/avatar-2.png') }}" class="bg-img"
                                         alt="" title=""/>
                                </div>
                                <span class="article-profile__date">1964 - 2008 г.</span>
                                <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                            </li>
                            <li class="article-profile__item swiper-slide">
                                <div class="article-profile__img">
                                    <img src="{{ asset('storage/uploads/community/avatar-3.png') }}" class="bg-img"
                                         alt="" title=""/>
                                </div>
                                <span class="article-profile__date">1964 - 2008 г.</span>
                                <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                            </li>
                            <li class="article-profile__item swiper-slide">
                                <div class="article-profile__img">
                                    <img src="{{ asset('storage/uploads/community/avatar-4.png') }}" class="bg-img"
                                         alt="" title=""/>
                                </div>
                                <span class="article-profile__date">1964 - 2008 г.</span>
                                <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                            </li>
                            <li class="article-profile__item swiper-slide">
                                <div class="article-profile__img">
                                    <img src="{{ asset('storage/uploads/community/avatar-5.png') }}" class="bg-img"
                                         alt="" title=""/>
                                </div>
                                <span class="article-profile__date">1964 - 2008 г.</span>
                                <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                            </li>
                            <li class="article-profile__item swiper-slide">
                                <div class="article-profile__img">
                                    <img src="{{ asset('storage/uploads/community/avatar-1.png') }}" class="bg-img"
                                         alt="" title=""/>
                                </div>
                                <span class="article-profile__date">1964 - 2008 г.</span>
                                <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                            </li>
                        </ul>
                    </div>
                </article>

                <article class="community-article">
                    <div class="community-content-title-wrap">
                        <h6 class="community-content__title">Фото</h6>
                        <a href="#" class="community-content__link">Все</a>
                    </div>

                    <ul class="community-photo">
                        <li class="community-photo__item">
                            <a href="{{ asset('storage/uploads/community/avatar-1.png') }}"
                               class="community-photo__link gallery" data-fancybox="slider-profile">
                                <img src="{{ asset('storage/uploads/community/avatar-1.png') }}" class="bg-img" alt=""
                                     title=""/>
                            </a>
                        </li>
                        <li class="community-photo__item">
                            <a href="{{ asset('storage/uploads/community/avatar-2.png') }}"
                               class="community-photo__link gallery" data-fancybox="slider-profile">
                                <img src="{{ asset('storage/uploads/community/avatar-2.png') }}" class="bg-img" alt=""
                                     title=""/>
                            </a>
                        </li>
                        <li class="community-photo__item">
                            <a href="{{ asset('storage/uploads/community/avatar-3.png') }}"
                               class="community-photo__link gallery" data-fancybox="slider-profile">
                                <img src="{{ asset('storage/uploads/community/avatar-3.png') }}" class="bg-img" alt=""
                                     title=""/>
                            </a>
                        </li>
                        <li class="community-photo__item">
                            <a href="{{ asset('storage/uploads/community/avatar-4.png') }}"
                               class="community-photo__link gallery" data-fancybox="slider-profile">
                                <img src="{{ asset('storage/uploads/community/avatar-4.png') }}" class="bg-img" alt=""
                                     title=""/>
                            </a>
                        </li>
                        <li class="community-photo__item">
                            <a href="{{ asset('storage/uploads/community/avatar-5.png') }}"
                               class="community-photo__link gallery" data-fancybox="slider-profile">
                                <img src="{{ asset('storage/uploads/community/avatar-5.png') }}" class="bg-img" alt=""
                                     title=""/>
                            </a>
                        </li>
                        <li class="community-photo__item community-photo-hide">
                            <a href="{{ asset('storage/uploads/community/avatar-1.png') }}"
                               class="community-photo__link gallery" data-fancybox="slider-profile">
                                <img src="{{ asset('storage/uploads/community/avatar-1.png') }}" class="bg-img" alt=""
                                     title=""/>
                            </a>
                        </li>
                    </ul>
                </article>

                <article class="community-article">
                    <div class="community-content-title-wrap">
                        <h6 class="community-content__title">Видео</h6>
                        <a href="#" class="community-content__link">Все</a>
                    </div>

                    <div class="community-content-video">
                        <video class="bg-img" loop poster="{{ asset('storage/uploads/community/poster.png') }}">
                            <source src="{{ asset('storage/uploads/community/video/video.mp4') }}" type="video/mp4"/>
                            no support tag video
                        </video>
                        <button class="btn-play-video">
                            <svg width="52" height="53" viewBox="0 0 52 53" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M26 52.2402C40.3594 52.2402 52 40.5996 52 26.2402C52 11.8808 40.3594 0.240234 26 0.240234C11.6406 0.240234 0 11.8808 0 26.2402C0 40.5996 11.6406 52.2402 26 52.2402ZM20 36.6325L38 26.2402L20 15.8479L20 36.6325Z"
                                      fill="white"/>
                            </svg>
                        </button>
                    </div>
                </article>

            </div>
        </div>
    </section>
@endsection
