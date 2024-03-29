<div class="news-wrapper">
    <h5 class="news-title"> {{__('home.news_line')}}</h5>
    <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M6.00041 9.5C6.66563 9.49983 7.31203 9.72076 7.83799 10.1281C8.36394 10.5354 8.7396 11.1059 8.90591 11.75H17.2504C17.4378 11.7497 17.6186 11.8195 17.7571 11.9458C17.8956 12.072 17.9818 12.2456 17.9987 12.4322C18.0157 12.6189 17.9621 12.8051 17.8486 12.9542C17.7351 13.1034 17.5698 13.2046 17.3854 13.238L17.2504 13.25L8.90591 13.2515C8.74016 13.8961 8.36474 14.4674 7.83873 14.8752C7.31273 15.2831 6.66602 15.5045 6.00041 15.5045C5.3348 15.5045 4.68809 15.2831 4.16208 14.8752C3.63608 14.4674 3.26065 13.8961 3.09491 13.2515L0.750406 13.25C0.562987 13.2503 0.382231 13.1805 0.243731 13.0542C0.105232 12.928 0.019027 12.7544 0.00209278 12.5678C-0.0148414 12.3811 0.0387221 12.1949 0.152235 12.0458C0.265749 11.8966 0.430985 11.7954 0.615406 11.762L0.750406 11.75H3.09491C3.26121 11.1059 3.63688 10.5354 4.16283 10.1281C4.68878 9.72076 5.33519 9.49983 6.00041 9.5ZM6.00041 11C5.60258 11 5.22105 11.158 4.93975 11.4393C4.65844 11.7206 4.50041 12.1022 4.50041 12.5C4.50041 12.8978 4.65844 13.2794 4.93975 13.5607C5.22105 13.842 5.60258 14 6.00041 14C6.39823 14 6.77976 13.842 7.06107 13.5607C7.34237 13.2794 7.50041 12.8978 7.50041 12.5C7.50041 12.1022 7.34237 11.7206 7.06107 11.4393C6.77976 11.158 6.39823 11 6.00041 11ZM12.0004 0.5C12.6656 0.499831 13.312 0.720764 13.838 1.12806C14.3639 1.53535 14.7396 2.10591 14.9059 2.75H17.2504C17.4378 2.74966 17.6186 2.81949 17.7571 2.94576C17.8956 3.07203 17.9818 3.24558 17.9987 3.43223C18.0157 3.61889 17.9621 3.80511 17.8486 3.95425C17.7351 4.10338 17.5698 4.20461 17.3854 4.238L17.2504 4.25L14.9059 4.2515C14.7402 4.89614 14.3647 5.46736 13.8387 5.87523C13.3127 6.2831 12.666 6.50446 12.0004 6.50446C11.3348 6.50446 10.6881 6.2831 10.1621 5.87523C9.63608 5.46736 9.26065 4.89614 9.09491 4.2515L0.750406 4.25C0.562987 4.25034 0.382231 4.18051 0.243731 4.05424C0.105232 3.92797 0.019027 3.75442 0.00209278 3.56777C-0.0148414 3.38111 0.0387221 3.19489 0.152235 3.04575C0.265749 2.89662 0.430985 2.79539 0.615406 2.762L0.750406 2.75H9.09491C9.26121 2.10591 9.63688 1.53535 10.1628 1.12806C10.6888 0.720764 11.3352 0.499831 12.0004 0.5ZM12.0004 2C11.6026 2 11.2211 2.15804 10.9397 2.43934C10.6584 2.72064 10.5004 3.10218 10.5004 3.5C10.5004 3.89782 10.6584 4.27936 10.9397 4.56066C11.2211 4.84196 11.6026 5 12.0004 5C12.3982 5 12.7798 4.84196 13.0611 4.56066C13.3424 4.27936 13.5004 3.89782 13.5004 3.5C13.5004 3.10218 13.3424 2.72064 13.0611 2.43934C12.7798 2.15804 12.3982 2 12.0004 2Z"
            fill="#838385"/>
    </svg>

    @forelse($news as $newsItem)

        <div class="news-wrap">
            <div class="news-title-profile">
                <div class="news-title-profile__img">
                    <img src="{{ $newsItem->author->getFirstMediaUrl('avatars', 'thumb') }}" class="bg-img"
                         alt="" title=""/>
                </div>
                <div class="news-title-profile__title">
                    <span class="news-title-profile__name">{{ $newsItem->author->username }}</span>
                    <span class="news-title-profile__time">{{ $newsItem->title }}</span>
                </div>
            </div>

            @if($newsItem->hasGallery())
                <ul class="news-add-photo">

                    @foreach($newsItem->galleries as $gallery)
                        <li class="news-add-photo__item">
                            <a href="{{ asset('storage/' . $gallery->item) }}"
                               class="gallery">
                                <img src="{{ asset('storage/' . $gallery->item) }}" class="bg-img"
                                     alt="" title=""/>
                            </a>
                        </li>
                    @endforeach

                </ul>
            @elseif($newsItem->hasProfile())
                <div class="swiper swiper-profiles">
                    <ul class="list-profiles swiper-wrapper">
                        <li class="list-profiles__item swiper-slide">
                            <div class="list-profiles-img-wrap">
                                <div class="list-profiles__img">
                                    <img src="{{ $newsItem->human->getFirstMediaUrl('avatars', 'thumb') }}"
                                         class="bg-img"
                                         alt="{{ $newsItem->human->full_name }}"
                                         title="{{ $newsItem->human->full_name }}"/>
                                </div>
                            </div>
                            <span class="profile-time">{{ $newsItem->human->lifeExpectancy }} г.</span>
                            <a href="{{ route('profile.show', ['slug' => $newsItem->human->slug ]) }}"
                               class="profile-text">
                                {{ $newsItem->human->full_name }}
                            </a>
                        </li>
                    </ul>
                </div>
            @endif

        </div>

    @empty
        <div class="news-wrap">
            <p>{{__('home.no_news')}}</p>
        </div>

    @endforelse
</div>
