<div class="community-content community-tab current">
    <div class="community-content-left">

        @include('includes.posts', ['posts' => $community->posts ])

    </div>

    <div class="community-content-right">

        <article class="community-article">
            <div class="community-content-title-wrap">
                <h6 class="community-content__title">Информация</h6>
            </div>

            <p class="article-text">{!! nl2br($community->description) !!}</p>
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
                            <img src="img/community/avatar-1.png" class="bg-img" alt="" title=""/>
                        </div>
                        <span class="article-profile__date">1964 - 2008 г.</span>
                        <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                    </li>
                    <li class="article-profile__item swiper-slide">
                        <div class="article-profile__img">
                            <img src="img/community/avatar-2.png" class="bg-img" alt="" title=""/>
                        </div>
                        <span class="article-profile__date">1964 - 2008 г.</span>
                        <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                    </li>
                    <li class="article-profile__item swiper-slide">
                        <div class="article-profile__img">
                            <img src="img/community/avatar-3.png" class="bg-img" alt="" title=""/>
                        </div>
                        <span class="article-profile__date">1964 - 2008 г.</span>
                        <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                    </li>
                    <li class="article-profile__item swiper-slide">
                        <div class="article-profile__img">
                            <img src="img/community/avatar-4.png" class="bg-img" alt="" title=""/>
                        </div>
                        <span class="article-profile__date">1964 - 2008 г.</span>
                        <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                    </li>
                    <li class="article-profile__item swiper-slide">
                        <div class="article-profile__img">
                            <img src="img/community/avatar-5.png" class="bg-img" alt="" title=""/>
                        </div>
                        <span class="article-profile__date">1964 - 2008 г.</span>
                        <a href="#" class="article-profile__name">Иванов Михаил Петрович</a>
                    </li>
                    <li class="article-profile__item swiper-slide">
                        <div class="article-profile__img">
                            <img src="img/community/avatar-5.png" class="bg-img" alt="" title=""/>
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
                    <a href="img/community/avatar-1.png" class="community-photo__link gallery"
                       data-fancybox="slider-profile">
                        <img src="img/community/avatar-1.png" class="bg-img" alt="" title=""/>
                    </a>
                </li>
                <li class="community-photo__item">
                    <a href="img/community/avatar-1.png" class="community-photo__link gallery"
                       data-fancybox="slider-profile">
                        <img src="img/community/avatar-2.png" class="bg-img" alt="" title=""/>
                    </a>
                </li>
                <li class="community-photo__item">
                    <a href="img/community/avatar-1.png" class="community-photo__link gallery"
                       data-fancybox="slider-profile">
                        <img src="img/community/avatar-3.png" class="bg-img" alt="" title=""/>
                    </a>
                </li>
                <li class="community-photo__item">
                    <a href="img/community/avatar-1.png" class="community-photo__link gallery"
                       data-fancybox="slider-profile">
                        <img src="img/community/avatar-4.png" class="bg-img" alt="" title=""/>
                    </a>
                </li>
                <li class="community-photo__item">
                    <a href="img/community/avatar-1.png" class="community-photo__link gallery"
                       data-fancybox="slider-profile">
                        <img src="img/community/avatar-5.png" class="bg-img" alt="" title=""/>
                    </a>
                </li>
                <li class="community-photo__item community-photo-hide">
                    <a href="img/community/avatar-1.png" class="community-photo__link gallery"
                       data-fancybox="slider-profile">
                        <img src="img/community/avatar-5.png" class="bg-img" alt="" title=""/>
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
                <video class="bg-img" loop poster="img/community/poster.png">
                    <source src="video/video.mp4" type="video/mp4"/>
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
