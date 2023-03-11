@extends('layouts.app')

@section('content')

    @php /** @var \App\Models\Community\Community $community */@endphp

    <section class="community">
        <div class="community-banner">
            <img src="{{ $community->getFirstMediaUrl('banners', 'thumb_900') }}" class="bg-img" alt="banner"
                 title="banner"/>
        </div>
        <div class="community-preview">
            <div class="community-preview-title">
                <div class="community-preview__logo">
                    <img src="{{ $community->getFirstMediaUrl('avatars', 'thumb') }}" class="bg-img" alt="avatar"
                         title="{{ $community->title }}"/>
                </div>
                <h4 class="community-name">{{ $community->title }}</h4>
                <h5 class="community-country">{{ $community->subtitle }}</h5>
                <div class="followers-wrap">
                    <span class="followers-number">Followers: {{ $followersCount }}</span>
                    <ul class="followers">

                        @foreach($followers as $follower)
                            @if($follower->avatar)
                                <li class="followers__item" style="border-radius: 50px">
                                    <img src="{{ $follower->getFirstMediaUrl('avatars', 'thumb') }}"
                                         class="bg-img"
                                         alt="{{ $follower->full_name }}"
                                         title="{{ $follower->full_name }}"/>
                                </li>
                            @endif
                        @endforeach

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
                @if($community->isSubscribe(auth()->id()))
                    <button type="button"
                            class="white-btn btn community_subscribe"
                            id="community_subscribe"
                            data-slug="{{ $community->slug }}">
                        Unsubscribe
                    </button>
                @else
                    <button type="button"
                            class="blue-btn btn community_subscribe"
                            id="community_subscribe"
                            data-slug="{{ $community->slug }}">
                        Subscribe
                    </button>
                @endif
            </div>
        </div>

        <ul class="community-nav">
            <li class="community-nav__item current">Memory wall</li>
            <li class="community-nav__item">Memorials</li>
            <li class="community-nav__item">Photos</li>
            <li class="community-nav__item">Videos</li>
        </ul>

        @include('includes.partials.tabs.memory-wall')

        @include('includes.partials.tabs.memorials')

        @include('includes.partials.tabs.photos')

        @include('includes.partials.tabs.videos')

        <x-modal id="search-post-modal" class="search_post_modal"
                 long="hystmodal__window--long">
            <div class="modal-search" id="modal-search">

                <form class="search-form">
                    <div class="search-input-wrap">
                        <svg class="search-input__icon" viewBox="0 0 20 20" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M14.3248 12.8987L19.7048 18.2787C19.8939 18.468 20 18.7246 20 18.9921C19.9999 19.2596 19.8935 19.5161 19.7043 19.7052C19.515 19.8943 19.2584 20.0005 18.9909 20.0004C18.7234 20.0003 18.4669 19.894 18.2778 19.7047L12.8978 14.3247C11.2895 15.5704 9.26705 16.1566 7.24189 15.9641C5.21674 15.7716 3.341 14.8148 1.99625 13.2884C0.6515 11.7619 -0.0612416 9.78056 0.00301976 7.74729C0.0672812 5.71402 0.903718 3.7816 2.34217 2.34315C3.78063 0.904695 5.71305 0.0682577 7.74631 0.00399633C9.77958 -0.0602651 11.761 0.652477 13.2874 1.99723C14.8138 3.34198 15.7706 5.21772 15.9631 7.24287C16.1556 9.26802 15.5694 11.2905 14.3238 12.8987H14.3248ZM7.99977 13.9997C9.59107 13.9997 11.1172 13.3676 12.2424 12.2424C13.3676 11.1172 13.9998 9.59104 13.9998 7.99974C13.9998 6.40845 13.3676 4.88232 12.2424 3.7571C11.1172 2.63189 9.59107 1.99974 7.99977 1.99974C6.40847 1.99974 4.88235 2.63189 3.75713 3.7571C2.63191 4.88232 1.99977 6.40845 1.99977 7.99974C1.99977 9.59104 2.63191 11.1172 3.75713 12.2424C4.88235 13.3676 6.40847 13.9997 7.99977 13.9997Z"
                                  fill="#4F4F4F"/>
                        </svg>
                        <input type="search" class="search-input" placeholder="Поиск" title="Поиск"/>
                    </div>
                </form>

                <div class="result-search-placeholder">
                    <h5 class="result-search-placeholder__title">Что-то ищете?</h5>
                    <p class="result-search-placeholder__text">Поиск публикаций, фото, видео и пр. от Biker Сlub
                        «Sons of Anarchy»</p>
                </div>

                <article class="community-article">
                    <div class="article-author">
                        <div class="article-author-avatar">
                            <img src="{{ $community->getFirstMediaUrl('avatars', 'thumb') }}" class="bg-img" alt=""
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
            </div>
        </x-modal>

    </section>
@endsection
