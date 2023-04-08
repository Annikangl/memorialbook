@extends('layouts.app')

@section('content')
    <style>
        .cemetery-bg {
            width: 100%;
            background: url("{{ $cemetery->getFirstMediaUrl('banners', 'thumb_900') }}") no-repeat;
            background-size: cover;
            overflow: hidden;
            padding: 25% 0 0;
            height: auto;
        }
    </style>
    <section class="cemetery">
        <div class="cemetery-bg"></div>
        <div class="cemetery-title-wrap">
            <div class="cemetery-title">
                <div class="cemetery-named-wrap">
                    <div class="cemetery-title-img">
                        <img src="{{ $cemetery->getFirstMediaUrl('avatars', 'thumb') }}" class="bg-img" alt="" title=""/>
                    </div>
                    <div class="cemetery-named">
                        <h4 class="cemetery-named__title">{{ $cemetery->title }}</h4>
                        <span class="cemetery-named__info"
                              data-lat="{{ $cemetery->latitude }}"
                              data-lng="{{ $cemetery->longitude }}">
                            {{ $cemetery->subtitle }}</span>
                    </div>
                </div>
                <ul class="cemetery-photo">
                    @foreach($cemetery->getMedia('gallery') as $item)
                        <li class="cemetery-photo__item">
                            <a href="{{ $item->getUrl('thumb_500') }}"
                               class="cemetery-photo__link gallery">
                                <img src="{{ $item->getUrl('thumb_500') }}" class="bg-img"
                                     alt="{{ '' }}" title="{{ '' }}"/>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{--            // TODO change paginate --}}

            <ul class="cemetery-menu">
                <li class="cemetery-menu__item @if (!Request::has('page')) current @endif">
                    {{ __('show_cemetery.About the cemetery') }}
                </li>
                <li class="cemetery-menu__item @if (Request::has('page')) current @endif">
                    {{ __('show_cemetery.Memorials') }}
                </li>
                <li class="cemetery-menu__item">{{ __('show_cemetery.Products and services') }}</li>
                <li class="cemetery-menu__item">{{ __('show_cemetery.Contacts') }}</li>
            </ul>

        </div>
        <div class="cemetery-content">
            <div class="cemetery-content__item @if (!Request::has('page')) current @endif ">
                <div class="cemetery-text-wrap">
                    <div class="cemetery-text">
                        <p>{!! nl2br($cemetery->description) !!} </p>
                        <ul class="social">
                            <li class="social__item">
                                <a href="#" class="social__link">
                                    <img src="{{ asset('assets/media/media/icons/social/facebook.svg') }}"
                                         alt="facebook"
                                         title="facebook"/>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="#" class="social__link">
                                    <img src="{{ asset('assets/media/media/icons/social/instagram.svg') }}"
                                         alt="instagram"
                                         title="instagram"/>
                                </a>
                            </li>
                            <li class="social__item">
                                <a href="#" class="social__link">
                                    <img src="{{ asset('assets/media/media/icons/social/twitter.svg') }}"
                                         alt="twitter"
                                         title="twitter"/>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="famous-persons">
                        <h4 class="famous-persons__title">{{ __('show_cemetery.Famous personalities') }}</h4>

                        <ul class="famous-persons-list">
                            @forelse($famous as $profile)
                                <li class="famous-persons__item" data-lat="{{ $profile->latitude }}"
                                    data-lng="{{ $profile->longitude }}">
                                    <div class="famous-persons-img">
                                        <img src="{{ $profile->getFirstMediaUrl('avatars', 'thumb') }}" class="bg-img"
                                             alt="{{ $profile->full_name }}"
                                             title="{{ $profile->full_name }}"/>
                                    </div>
                                    <span class="famous-persons__name">{{ $profile->full_name }}</span>
                                </li>
                            @empty
                                <p>{{ __('show_cemetery.Famous personalities have not yet been marked in this cemetery') }}</p>
                            @endforelse
                        </ul>

                        @if($famous->isNotEmpty())
                            <div class="famous-persons__map"></div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="cemetery-content__item @if (Request::has('page')) current @endif"
            >
            <ul class="memorials">
                @foreach($memorials as $profile)
                    <li class="memorials__item">
                        <div class="memorials-img">
                            <img src="{{ $profile->getFirstMediaUrl('avatars', 'thumb') }}" class="bg-img"
                                 alt="{{ $profile->full_name }}"
                                 title="{{ $profile->full_name }}"/>
                        </div>
                        <div class="memorials-info">
                            <span class="memorials-info__name">{{ $profile->full_name }}</span>
                            <span class="memorials-info__ages">{{ $profile->lifeExpectancy }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>

            <!--cemeteries pagination start-->
            <div class="cemeteries-buttons">
                <button type="button" class="button-more" data-link="{{ $memorials->nextPageUrl()  }}">Показать еще
                </button>
                <x-paginator :paginator="$memorials"></x-paginator>
            </div>
            <!--cemeteries pagination end-->

        </div>
        <div class="cemetery-content__item">
            <div class="price">
                <ul class="price-filter">
                    <li class="price-filter__item active">
                        <a href="#" class="price-filter__link">Венки</a>
                    </li>
                    <li class="price-filter__item">
                        <a href="#" class="price-filter__link">Цветы</a>
                    </li>
                    <li class="price-filter__item">
                        <a href="#" class="price-filter__link">Корзины</a>
                    </li>
                    <li class="price-filter__item">
                        <a href="#" class="price-filter__link">Принадлежности</a>
                    </li>
                </ul>
                <ul class="price-list">
                    <li class="price-list__item">
                        <a href="#" class="price-list__link">
                            <div class="price-title-wrap">
                                <img src="img/price/img-1.jpg" class="price-img" alt="" title=""/>
                                <h5 class="price-title">Траурный венок “Классика №12”</h5>
                            </div>
                            <div class="price-list-wrap">
                                <span class="cost">2 375 ₽</span>
                                <span class="buy">Купить</span>
                            </div>
                        </a>
                    </li>
                    <li class="price-list__item">
                        <a href="#" class="price-list__link">
                            <div class="price-title-wrap">
                                <img src="img/price/img-1.jpg" class="price-img" alt="" title=""/>
                                <h5 class="price-title">Траурный венок “Классика №12”</h5>
                            </div>
                            <div class="price-list-wrap">
                                <span class="cost">2 375 ₽</span>
                                <span class="buy">Купить</span>
                            </div>
                        </a>
                    </li>
                    <li class="price-list__item">
                        <a href="#" class="price-list__link">
                            <div class="price-title-wrap">
                                <img src="img/price/img-1.jpg" class="price-img" alt="" title=""/>
                                <h5 class="price-title">Траурный венок “Классика №12”</h5>
                            </div>
                            <div class="price-list-wrap">
                                <span class="cost">2 375 ₽</span>
                                <span class="buy">Купить</span>
                            </div>
                        </a>
                    </li>
                    <li class="price-list__item">
                        <a href="#" class="price-list__link">
                            <div class="price-title-wrap">
                                <img src="img/price/img-1.jpg" class="price-img" alt="" title=""/>
                                <h5 class="price-title">Траурный венок “Классика №12”</h5>
                            </div>
                            <div class="price-list-wrap">
                                <span class="cost">2 375 ₽</span>
                                <span class="buy">Купить</span>
                            </div>
                        </a>
                    </li>
                    <li class="price-list__item">
                        <a href="#" class="price-list__link">
                            <div class="price-title-wrap">
                                <img src="img/price/img-1.jpg" class="price-img" alt="" title=""/>
                                <h5 class="price-title">Траурный венок “Классика №12”</h5>
                            </div>
                            <div class="price-list-wrap">
                                <span class="cost">2 375 ₽</span>
                                <span class="buy">Купить</span>
                            </div>
                        </a>
                    </li>
                    <li class="price-list__item">
                        <a href="#" class="price-list__link">
                            <div class="price-title-wrap">
                                <img src="img/price/img-1.jpg" class="price-img" alt="" title=""/>
                                <h5 class="price-title">Траурный венок “Классика №12”</h5>
                            </div>
                            <div class="price-list-wrap">
                                <span class="cost">2 375 ₽</span>
                                <span class="buy">Купить</span>
                            </div>
                        </a>
                    </li>
                    <li class="price-list__item">
                        <a href="#" class="price-list__link">
                            <div class="price-title-wrap">
                                <img src="img/price/img-1.jpg" class="price-img" alt="" title=""/>
                                <h5 class="price-title">Траурный венок “Классика №12”</h5>
                            </div>
                            <div class="price-list-wrap">
                                <span class="cost">2 375 ₽</span>
                                <span class="buy">Купить</span>
                            </div>
                        </a>
                    </li>
                    <li class="price-list__item">
                        <a href="#" class="price-list__link">
                            <div class="price-title-wrap">
                                <img src="img/price/img-1.jpg" class="price-img" alt="" title=""/>
                                <h5 class="price-title">Траурный венок “Классика №12”</h5>
                            </div>
                            <div class="price-list-wrap">
                                <span class="cost">2 375 ₽</span>
                                <span class="buy">Купить</span>
                            </div>
                        </a>
                    </li>
                    <li class="price-list__item">
                        <a href="#" class="price-list__link">
                            <div class="price-title-wrap">
                                <img src="img/price/img-1.jpg" class="price-img" alt="" title=""/>
                                <h5 class="price-title">Траурный венок “Классика №12”</h5>
                            </div>
                            <div class="price-list-wrap">
                                <span class="cost">2 375 ₽</span>
                                <span class="buy">Купить</span>
                            </div>
                        </a>
                    </li>
                    <li class="price-list__item">
                        <a href="#" class="price-list__link">
                            <div class="price-title-wrap">
                                <img src="img/price/img-1.jpg" class="price-img" alt="" title=""/>
                                <h5 class="price-title">Траурный венок “Классика №12”</h5>
                            </div>
                            <div class="price-list-wrap">
                                <span class="cost">2 375 ₽</span>
                                <span class="buy">Купить</span>
                            </div>
                        </a>
                    </li>
                </ul>

                <!--cemeteries pagination start-->
                <div class="cemeteries-buttons">
                    <button type="button" class="button-more">Показать еще</button>

                    <div class="cemeteries-pagination">
                        <a class="pagination-left">
                            <svg class="left-arrow" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                            </svg>
                        </a>
                        <div class="pagination-number">
                            <span class="pagination-number__current">1</span>
                            <span class="pagination-number__delimiter">/</span>
                            <span class="pagination-number__all">5</span>
                        </div>
                        <a class="pagination-right">
                            <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 7.8c-.2 0-.4-.1-.6-.2L.8 2 2 .8l5 5 5-5L13.2 2 7.6 7.6c-.2.2-.4.2-.6.2z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <!--cemeteries pagination end-->

            </div>

        </div>
        <div class="cemetery-content__item">

            <div class="cemetery-contacts-map"></div>

            <div class="cemetery-contacts">
                <ul class="cemetery-contacts-list">
                    <li class="cemetery-contacts-list__item">
                        <span class="cemetery-contacts-list__title">{{ __('show_cemetery.Email') }}:</span>
                        <a href="mailto:thebestcemetery@mail.com"
                           class="cemetery-contacts-list__text">{{ $cemetery->email }}</a>
                    </li>
                    <li class="cemetery-contacts-list__item">
                        <span class="cemetery-contacts-list__title">{{ __('show_cemetery.Phone number') }}:</span>
                        <a href="tel:79022223333" class="cemetery-contacts-list__text">{{ $cemetery->phone }}</a>
                    </li>
                    <li class="cemetery-contacts-list__item">
                        <span class="cemetery-contacts-list__title">{{ __('show_cemetery.Working hours') }}:</span>
                        <span class="cemetery-contacts-list__text">{{ $cemetery->schedule }}</span>
                    </li>
                </ul>
                <a class="button-add-message">{{ __('show_cemetery.Write message') }}</a>
                <a class="button-route">{{ __('show_cemetery.plot rout') }}</a>
            </div>
        </div>
        </div>

    </section>
@endsection
