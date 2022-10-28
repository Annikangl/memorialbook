@extends('layouts.app')

@section('content')
    <style>
        .cemetery-bg {
            width: 100%;
            background: url("{{ asset('storage/uploads/cemeteries/banner/img.png') }}") no-repeat;
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
                        <img src="{{ asset('storage/' . $cemetery->avatar) }}" class="bg-img" alt="" title=""/>
                    </div>
                    <div class="cemetery-named">
                        <h4 class="cemetery-named__title">{{ $cemetery->title }}</h4>
                        <span class="cemetery-named__info">{{ $cemetery->subtitle }}</span>
                    </div>
                </div>
                <ul class="cemetery-photo">
                    @foreach($cemetery->galleries as $gallery)
                        <li class="cemetery-photo__item">
                            <a href="{{ asset('storage/' . $gallery->item ) }}"
                               class="cemetery-photo__link gallery">
                                <img src="{{ asset('storage/' . $gallery->item) }}" class="bg-img"
                                     alt="{{ $gallery->item }}" title="{{ $gallery->item }}"/>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{--            // TODO change paginate --}}

            <ul class="cemetery-menu">
                <li class="cemetery-menu__item @if (!Request::has('page')) current @endif">О кладбище</li>
                <li class="cemetery-menu__item @if (Request::has('page')) current @endif">Мемориалы</li>
                <li class="cemetery-menu__item">Товары и услуги</li>
                <li class="cemetery-menu__item">Контакты</li>
            </ul>

        </div>
        <div class="cemetery-content">
            <div class="cemetery-content__item @if (!Request::has('page')) current @endif ">
                <div class="cemetery-text-wrap">
                    <div class="cemetery-text">
                        <p>{!! nl2br($cemetery->description) !!} </p>
                        <ul class="social">
                            @foreach($cemetery->socials as $social)
                                <li class="social__item">
                                    <a href="#" class="social__link">
                                        <img src="{{ asset( $social->icon )}}" alt=""
                                             title="{{ $social->social }}"/>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="famous-persons">
                        <h4 class="famous-persons__title">Известные личности</h4>

                        <ul class="famous-persons-list">
                            @foreach($famous as $profile)
                                <li class="famous-persons__item" data-lat="{{ $profile->latitude }}"
                                    data-lng="{{ $profile->longitude }}">
                                    <div class="famous-persons-img">
                                        <img src="{{ asset('storage/' . $profile->avatar) }}" class="bg-img"
                                             alt="{{ $profile->full_name }}"
                                             title="{{ $profile->full_name }}"/>
                                    </div>
                                    <span class="famous-persons__name">{{ $profile->full_name }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <div class="famous-persons__map"></div>
                    </div>
                </div>
            </div>
            <div class="cemetery-content__item @if (Request::has('page')) current @endif"
            >
            <ul class="memorials">
                @foreach($memorials as $profile)
                    <li class="memorials__item">
                        <div class="memorials-img">
                            <img src="{{ asset('storage/' . $profile->avatar) }}" class="bg-img"
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
                        <span class="cemetery-contacts-list__title">Email:</span>
                        <a href="mailto:thebestcemetery@mail.com"
                           class="cemetery-contacts-list__text">{{ $cemetery->email }}</a>
                    </li>
                    <li class="cemetery-contacts-list__item">
                        <span class="cemetery-contacts-list__title">Телефон:</span>
                        <a href="tel:79022223333" class="cemetery-contacts-list__text">{{ $cemetery->phone }}</a>
                    </li>
                    <li class="cemetery-contacts-list__item">
                        <span class="cemetery-contacts-list__title">Время работы:</span>
                        <span class="cemetery-contacts-list__text">{{ $cemetery->schedule }}</span>
                    </li>
                </ul>
                <a class="button-add-message">Написать сообщение</a>
                <a class="button-route">Построить маршрут</a>
            </div>
        </div>
        </div>

    </section>
@endsection

@section('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO1W6X1LgXeZzrDSNL6YMbZm9Z9NAPH5Y&callback=initMap&v=weekly"
        defer
    ></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

    <script>
        const locations = [];

        const cemeteryCoords = {
            lat: {{ $cemetery->latitude }},
            lng: {{ $cemetery->longitude }}
        };

        document.querySelectorAll('.famous-persons__item').forEach(function (element) {
            locations.push({
                lat: parseFloat(element.getAttribute('data-lat')),
                lng: parseFloat(element.getAttribute('data-lng'))
            })
        })


        function initMap() {
            const uluru = cemeteryCoords;
            const image = window.app.globalConfig.assetsPath + 'media/cock.png';

            const contactMap = new google.maps.Map(document.querySelector(".cemetery-contacts-map"), {
                zoom: 4,
                center: uluru,
            });

            const contactMarker = new google.maps.Marker({
                position: uluru,
                map: contactMap,
            });

            const map = new google.maps.Map(document.querySelector(".famous-persons__map"), {
                zoom: 4,
                center: locations[0],
            });

            const infoWindow = new google.maps.InfoWindow({
                content: "",
                disableAutoPan: true,
            });

            const labels = document.querySelectorAll('.famous-persons__name');

            const markers = locations.map((position, i) => {
                const label = labels[i % labels.length];
                const marker = new google.maps.Marker({
                    position,
                    label,
                });

                marker.addListener("click", () => {
                    infoWindow.setContent(label.textContent);
                    infoWindow.open(map, marker);
                });
                return marker;
            });

            const markerCluster = new markerClusterer.MarkerClusterer({markers, map});
        }

        window.initMap = initMap;

    </script>


@endsection
