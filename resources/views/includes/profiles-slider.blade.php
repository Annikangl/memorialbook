<div class="swiper article-profile-slider">
    <ul class="article-profile swiper-wrapper">

        @foreach($profiles as $profile)
        <li class="article-profile__item swiper-slide">
            <div class="article-profile__img">
                <img src="{{ asset('storage/' . $profile->avatar ) }}" class="bg-img" alt="avatar" title="profile avatar"/>
            </div>
            <span class="article-profile__date">{{ $profile->yearBirth }} . {{ $profile->yearDeath }} г.</span>
            <a href="{{ route('profile.show', ['slug' => $profile->slug ]) }}" class="article-profile__name">{{ $profile->fullName }}</a>
        </li>
        @endforeach
    </ul>
</div>
