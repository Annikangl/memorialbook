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

            @include('includes.profiles-slider', ['profiles' => $community->humans ])
        </article>

        <article class="community-article">
            <div class="community-content-title-wrap">
                <h6 class="community-content__title">Фото</h6>
                <a href="#" class="community-content__link">Все</a>
            </div>

            @include('includes.photo-slider', ['photos' => $community->galleries ])

        </article>

        @if($community->hasVideo())

            <article class="community-article">
            <div class="community-content-title-wrap">
                <h6 class="community-content__title">Видео</h6>
                <a href="#" class="community-content__link">Все</a>
            </div>

            <div class="community-content-video">
                @include('includes.video-block')
            </div>
        </article>

        @endif

    </div>
</div>
