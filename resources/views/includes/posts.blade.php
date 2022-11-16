@foreach($posts as $post)
    {{--TODO pinner article--}}
    <article class="community-article">
        <div class="article-author">
            <div class="article-author-avatar">
                <img src="{{ asset('storage/' . $post->author->avatar) }}" class="bg-img" alt="" title=""/>
            </div>
            <div class="article-author-name-wrap">
                <h6 class="article-author__name">{{ $post->author->fullName[0] }}</h6>
                <span class="article-author__mark">запись закреплена</span>
                <time class="article-author-date">{{ $post->published_at }}</time>
            </div>
        </div>

        @if ($post->galleries->count() > 1)

            <div class="swiper article-slider">
                <ul class="article-slider-list swiper-wrapper">

                    @foreach($post->galleries as $item)
                        <li class="article-slider-list__item swiper-slide">
                            <a href="{{ asset('storage/' . $item->item) }}" class="article-slider-list__link gallery"
                               data-fancybox="img-slider">
                                <img src="{{ asset('storage/' . $item->item) }}" alt="" title=""/>
                            </a>
                        </li>
                    @endforeach

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

        @elseif($post->galleries->count() === 1)
            <img src="{{ asset('storage/' . $post->galleries->first()->item) }}" class="article-img" alt="post image"
                 title="post image"/>
        @endif

        <p class="article-text">{{ $post->description }}</p>

        <button type="button" class="article-repost">
            <svg class="article-repost__icon" viewBox="0 0 20 18" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M18.8978 8.59977L11.5644 1.26643C11.4362 1.13828 11.2729 1.051 11.0951 1.01565C10.9173 0.980296 10.733 0.998449 10.5656 1.06781C10.3981 1.13718 10.255 1.25464 10.1542 1.40535C10.0535 1.55606 9.99971 1.73325 9.99967 1.91452V5.1641C7.49561 5.39583 5.16813 6.55364 3.47272 8.41096C1.77732 10.2683 0.836007 12.6914 0.833008 15.2062V16.5812C0.833153 16.7715 0.892508 16.957 1.00284 17.112C1.11318 17.267 1.26902 17.3839 1.44876 17.4464C1.62849 17.5088 1.82321 17.5138 2.00591 17.4606C2.18861 17.4074 2.35022 17.2987 2.46834 17.1495C3.3664 16.0816 4.46828 15.2033 5.70962 14.566C6.95096 13.9287 8.30686 13.5452 9.69809 13.4379C9.74392 13.4324 9.85851 13.4233 9.99967 13.4141V16.5812C9.99971 16.7625 10.0535 16.9396 10.1542 17.0904C10.255 17.2411 10.3981 17.3585 10.5656 17.4279C10.733 17.4972 10.9173 17.5154 11.0951 17.48C11.2729 17.4447 11.4362 17.3574 11.5644 17.2293L18.8978 9.89593C19.0696 9.72403 19.1661 9.49092 19.1661 9.24785C19.1661 9.00478 19.0696 8.77167 18.8978 8.59977ZM11.833 14.3684V12.4562C11.833 12.2131 11.7364 11.9799 11.5645 11.808C11.3926 11.6361 11.1595 11.5395 10.9163 11.5395C10.6826 11.5395 9.72834 11.5854 9.48451 11.6174C7.01397 11.8451 4.66231 12.7837 2.71401 14.3198C2.93515 12.298 3.89425 10.4288 5.40768 9.07016C6.92111 7.71149 8.88251 6.95879 10.9163 6.95618C11.1595 6.95618 11.3926 6.85961 11.5645 6.6877C11.7364 6.51579 11.833 6.28263 11.833 6.03952V4.12735L16.9535 9.24785L11.833 14.3684Z"/>
            </svg>
            <span class="article-repost__number">430</span>
        </button>
    </article>
@endforeach

{{--    <article class="community-article">--}}
{{--        <div class="article-author">--}}
{{--            <div class="article-author-avatar">--}}
{{--                <img src="img/community/logo.png" class="bg-img" alt="" title=""/>--}}
{{--            </div>--}}
{{--            <div class="article-author-name-wrap">--}}
{{--                <h6 class="article-author__name">Biker Сlub «Sons of Anarchy»</h6>--}}
{{--                <time class="article-author-date">23 октября 2022 г.</time>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <p class="article-text">Были добавлены 2 профиля.</p>--}}
{{--        <ul class="article-profile">--}}
{{--            <li class="article-profile__item">--}}
{{--                <div class="article-profile__img">--}}
{{--                    <img src="img/community/avatar-1.png" class="bg-img" alt="" title=""/>--}}
{{--                </div>--}}
{{--                <span class="article-profile__date">1964 - 2008 г.</span>--}}
{{--                <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>--}}
{{--            </li>--}}
{{--            <li class="article-profile__item">--}}
{{--                <div class="article-profile__img">--}}
{{--                    <img src="img/community/avatar-2.png" class="bg-img" alt="" title=""/>--}}
{{--                </div>--}}
{{--                <span class="article-profile__date">1964 - 2008 г.</span>--}}
{{--                <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </article>--}}


