@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="cemeteries-list">
            <div class="cemeteries-list__top">
                <div class="map__nav">
                    <a class="map-nav__button" href="#slideout-places" role="button" data-slideout=""
                       data-slideout-options="{&quot;type&quot;:&quot;places&quot;,&quot;position&quot;:&quot;top&quot;}">
                        <span class="map-nav-button__text">Поиск</span>
                        <span class="map-nav-button__icon">
                                        <svg style="width: 18px; height: 18px;" aria-hidden="true">
                                            <use xlink:href="../assets/media/sprite.svg?1644862970869#sprite-filter"></use>
                                        </svg>
                                    </span>
                        <span class="map-nav-button__badge badge badge-primary">5</span>
                    </a>
                </div>
                <div class="map__view">
                    <div class="map-view__item">
                        <a class="map-view__link" href="../map">На карте</a>
                    </div>
                    <div class="map-view__item">
                        <a class="map-view__link active" href="../list">Списком</a>
                    </div>
                </div>
            </div>
            <div class="cemeteries-list__content">
                <div class="cemeteries-list__items row">
                    <div class="cemeteries-list__item col">
                        <a class="cemeteries-list-item__inner" href="javascript:void(0)">
                            <div class="cemeteries-list-item__row row">
                                <div class="cemeteries-list-item__side -avatar col">
                                    <div class="cemeteries-list-item__avatar">
                                        <img class="cemeteries-list-item__image" src="../assets/uploads/cemetery/avatar-1.jpg"
                                             alt="Национальное кладбище Арлингт">
                                    </div>
                                </div>
                                <div class="cemeteries-list-item__side -content col">
                                    <div class="cemeteries-list-item__content">
                                        <div class="cemeteries-list-item__title">Arlington National Cemetery</div>
                                        <div class="cemeteries-list-item__bottom">
                                            <div class="cemeteries-list-item-bottom__address">Арлингтон, Virginia</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cemeteries-list__item col">
                        <a class="cemeteries-list-item__inner" href="javascript:void(0)">
                            <div class="cemeteries-list-item__row row">
                                <div class="cemeteries-list-item__side -avatar col">
                                    <div class="cemeteries-list-item__avatar">
                                        <img class="cemeteries-list-item__image" src="../assets/uploads/cemetery/avatar-2.jpg"
                                             alt="Вашингтонское кладбище">
                                    </div>
                                </div>
                                <div class="cemeteries-list-item__side -content col">
                                    <div class="cemeteries-list-item__content">
                                        <div class="cemeteries-list-item__title">MT. Washington Cemetery</div>
                                        <div class="cemeteries-list-item__bottom">
                                            <div class="cemeteries-list-item-bottom__address">Арлингтон, Virginia</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cemeteries-list__item col">
                        <a class="cemeteries-list-item__inner" href="javascript:void(0)">
                            <div class="cemeteries-list-item__row row">
                                <div class="cemeteries-list-item__side -avatar col">
                                    <div class="cemeteries-list-item__avatar">
                                        <img class="cemeteries-list-item__image" src="../assets/uploads/cemetery/avatar-3.jpg"
                                             alt="Национальное кладбище Арлингт">
                                    </div>
                                </div>
                                <div class="cemeteries-list-item__side -content col">
                                    <div class="cemeteries-list-item__content">
                                        <div class="cemeteries-list-item__title">Arlington National Cemetery</div>
                                        <div class="cemeteries-list-item__bottom">
                                            <div class="cemeteries-list-item-bottom__address">Арлингтон, Virginia</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="cemeteries-list__item col">
                        <a class="cemeteries-list-item__inner" href="javascript:void(0)">
                            <div class="cemeteries-list-item__row row">
                                <div class="cemeteries-list-item__side -avatar col">
                                    <div class="cemeteries-list-item__avatar">
                                        <img class="cemeteries-list-item__image" src="../assets/uploads/cemetery/avatar-4.jpg"
                                             alt="MT. Washington Cemetery">
                                    </div>
                                </div>
                                <div class="cemeteries-list-item__side -content col">
                                    <div class="cemeteries-list-item__content">
                                        <div class="cemeteries-list-item__title">MT. Washington Cemetery</div>
                                        <div class="cemeteries-list-item__bottom">
                                            <div class="cemeteries-list-item-bottom__address">Арлингтон, Virginia</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="pagination">
                        <button class="pagination__more btn btn-outline-primary" type="button">Показать ещё</button>
                        <div class="pagination__pages">
                            <a class="pagination-pages__link -prev arrow" href="../list">
                                            <span class="pagination-pages__icon">
                                                <svg style="width: 14px; height: 8px;" aria-hidden="true">
                                                    <use xlink:href="../assets/media/sprite.svg?1644862970869#sprite-arrow"></use>
                                                </svg>
                                            </span>
                            </a>
                            <div class="pagination-pages__numbers">
                                <div class="pagination-pages__current">1</div>
                                <div class="pagination-pages__delimiter">/</div>
                                <div class="pagination-pages__all">5</div>
                            </div>
                            <a class="pagination-pages__link -next arrow" href="../list">
                                            <span class="pagination-pages__icon">
                                                <svg style="width: 14px; height: 8px;" aria-hidden="true">
                                                    <use xlink:href="../assets/media/sprite.svg?1644862970869#sprite-arrow"></use>
                                                </svg>
                                            </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
