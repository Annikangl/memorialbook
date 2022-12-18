@extends('layouts.app')

@section('content')
    <section class="pet-card">
        <div class="pet-banner">
            <img src="{{ $pet->getFirstMediaUrl('banner', 'thumb_900')}}" class="bg-img" alt="" title=""/>
        </div>
        <div class="pet-card-wrap">
            <div class="member-info">
                <div class="member-info-wrap">
                    <div class="pet-avatar">
                        <div class="member-avatar__wrap">
                            <img src="{{ $pet->getFirstMediaUrl('avatars', 'thumb') }}" class="bg-img" alt="{{ $pet->name }}"
                                 title="{{ $pet->name }}"/>
                        </div>
                        <a href="#" class="member-avatar__change-link">
                            <svg width="24" height="20" viewBox="0 0 24 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M17.7255 0.178076C17.6635 0.209867 17.5742 0.288572 17.527 0.35295C17.4799 0.417328 16.8801 2.01858 16.1942 3.9113C15.5083 5.80401 14.9327 7.36692 14.9152 7.38448C14.8585 7.44103 5.59237 7.85568 4.98626 7.82875C3.41532 7.75899 2.04274 6.96337 1.14277 5.601C0.972692 5.34348 0.786995 5.10025 0.730099 5.06045C0.511569 4.90768 0.139425 5.02412 0.0339821 5.27831C-0.0387676 5.45361 0.00236813 5.63091 0.18572 5.93244C0.937044 7.16779 2.13265 8.1248 3.4368 8.53462C3.65697 8.60382 3.83709 8.67836 3.83709 8.70022C3.83709 8.72213 3.78662 8.80711 3.72494 8.88909C3.66326 8.97108 3.53675 9.19006 3.44384 9.37579C2.83435 10.5937 2.8525 12.0532 3.49576 13.5479C3.64496 13.8945 3.65782 13.9537 3.60298 14.0416C3.56874 14.0966 3.25659 14.5275 2.90931 14.9992C2.56207 15.4709 2.26286 15.9239 2.24447 16.0058C2.19968 16.2053 2.80016 19.4866 2.91287 19.6583C3.02202 19.8246 3.28117 19.8909 3.74051 19.8701C4.10806 19.8534 4.13395 19.845 4.26355 19.7002C4.34366 19.6107 4.39995 19.495 4.39995 19.4198C4.39995 19.3495 4.31406 18.8203 4.20909 18.2439C4.10412 17.6676 4.0355 17.1805 4.05665 17.1615C4.07776 17.1425 5.02378 16.4327 6.15889 15.584C8.18584 14.0686 8.5418 13.765 8.79288 13.3374C8.8623 13.2191 8.9464 13.1349 8.99509 13.1349C9.04096 13.1349 9.92015 13.2801 10.9489 13.4577C11.9777 13.6352 13.4843 13.8918 14.2969 14.028C15.1095 14.1641 15.7776 14.2769 15.7816 14.2787C15.7856 14.2805 15.9723 15.4513 16.1965 16.8805C16.4208 18.3097 16.6286 19.5317 16.6584 19.5961C16.7407 19.7737 16.9931 19.8769 17.3457 19.8769C17.7401 19.8769 17.9585 19.7731 18.035 19.5493C18.0756 19.4304 18.0917 18.6652 18.0936 16.7602L18.0962 14.1349L18.3008 13.9217C18.4329 13.7842 18.5496 13.5944 18.6302 13.3866C18.6988 13.2095 19.0132 11.8743 19.3288 10.4193L19.9026 7.77397L20.3714 7.78919C21.8173 7.8361 23.1739 7.04905 23.859 5.7658C24.0253 5.45421 24.0363 5.36919 23.9349 5.17357C23.8472 5.00436 23.7576 4.95951 22.5401 4.47548C21.6648 4.12747 21.5634 4.07587 21.5366 3.96472C21.4276 3.51192 21.0459 3.05224 20.5915 2.82661C20.4187 2.74079 20.2643 2.65291 20.2485 2.63132C20.2327 2.60978 20.206 2.39909 20.1891 2.16312C20.1267 1.29011 20.1093 1.20152 19.9708 1.05352C19.8655 0.941013 19.8024 0.914747 19.637 0.914607C19.4432 0.914419 19.4151 0.933054 19.0754 1.28711L18.7178 1.65985L18.5417 1.04238C18.3417 0.341245 18.2887 0.239645 18.0861 0.16918C17.9039 0.105785 17.8645 0.106769 17.7255 0.178076Z"
                                      fill="#333333"/>
                            </svg>
                        </a>
                    </div>

                    <div class="member-name-wrap">
                        <span class="member-name">{{ $pet->name }}</span>
                        <span class="member-ages">{{ $pet->lifeExpectancy }}</span>
                    </div>
                </div>
                <div class="member-info-biography">
                    <p>Порода: <strong>{{ $pet->breed }}</strong></p>
                    <p class="member-info__death">Причина смерти: <span class="reason">{{ $pet->death_reason }}</span></p>
                    <p>
                        {!! nl2br($pet->description) !!}
                    </p>

                </div>
                <div class="relatives">
                    <h3 class="relatives__title">Владелец</h3>
                    <ul class="relatives-list">
                        <li class="relatives-list__item">
                            <a href="#" class="relatives__link">
                                <div class="relatives__avatar">
                                    <img src="{{ $pet->user->getFirstMediaUrl('avatar') }}" class="bg-img" alt=""
                                         title=""/>
                                </div>
                                <span class="relatives__name"> {{ $pet->user->username }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="pet-images">
                @foreach($pet->getMedia('gallery') as $gallery)
                    <li class="member-images__item">
                        <a href="{{ $gallery->getUrl() }}" class="gallery" data-fancybox="pet-gallery">
                            <img src="{{ $gallery->getUrl('thumb_500') }}" class="bg-img" alt="{{ $gallery->name }}"
                                 title="{{ $gallery->name }}"/>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
