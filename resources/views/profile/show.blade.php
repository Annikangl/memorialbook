@extends('layouts.app')

@section('content')
    <div class="member-card">
        <div class="container">
            <div class="member-card__row row">
                <div class="member-card__side -content col">
                    <div class="member-card__header">
                        <div class="member-card-header__avatar">
                            <div class="member-card-header-avatar__image">
                                <img class="member-card-header-avatar__img" src="../assets/uploads/profile/gallery-1.jpg" alt="">
                            </div>
                            <a class="member-card-header-avatar__edit-link" href="../profile-add-member">
                                <svg style="width: 17px; height: 17px;" aria-hidden="true">
                                    <use xlink:href="../assets/media/sprite.svg?1644862953803#sprite-pencil"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="member-card-header__content">
                            <h1 class="member-card__name">
                                <span>{{ $profile->full_name }}</span>
                                <span class="member-card__religion"></span>
                            </h1>
{{--                            TODO change to fuul date --}}
                            <div class="member-card__dates">{{ $profile->date_birth }} -{{ $profile->date_death }}</div>
                        </div>
                    </div>
                    <div class="member-card__info">
                        <div class="member-card-info__text">Причина смерти: {{ $profile->reason_death }}</div>
                        <div class="member-card-info__text">Руководитель государственного музея современного искусства</div>
                    </div>
                    <div class="member-card__hobbies">
                        <div class="member-card-hobbies__item">
                            <div class="member-card-hobbies__label">Спортивная ходьба</div>
                        </div>
                        <div class="member-card-hobbies__item">
                            <div class="member-card-hobbies__label">Рыбалка</div>
                        </div>
                    </div>
                    <div class="member-card__relatives">
                        <div class="member-card-relatives__header">
                            <h4 class="member-card-relatives__title">Родственники</h4>
                            <a class="member-card-relatives__header-link" href="../tree">Семейное дерево</a>
                        </div>
                        <div class="member-card-relatives__content">
                            <div class="member-card-relatives__list">
                                <div class="member-card-relatives__item">
                                    <a class="member-card-relatives-item__link" href="../member-card">
                                        <div class="member-card-relatives-item__content">
                                            <div class="member-card-relatives-item__avatar">
                                                <img class="member-card-relatives-item__image" src="../assets/uploads/profile/avatar-2.jpg" alt="">
                                            </div>
                                            <div class="member-card-relatives-item__name">Алексей В.Н.</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="member-card-relatives__item">
                                    <a class="member-card-relatives-item__link" href="../member-card">
                                        <div class="member-card-relatives-item__content">
                                            <div class="member-card-relatives-item__avatar">
                                                <img class="member-card-relatives-item__image" src="../assets/uploads/profile/avatar-3.jpg" alt="">
                                            </div>
                                            <div class="member-card-relatives-item__name">Андросова М. В.</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="member-card-relatives__item">
                                    <a class="member-card-relatives-item__link" href="../member-card">
                                        <div class="member-card-relatives-item__content">
                                            <div class="member-card-relatives-item__avatar">
                                                <img class="member-card-relatives-item__image" src="../assets/uploads/profile/avatar-4.jpg" alt="">
                                            </div>
                                            <div class="member-card-relatives-item__name">Анастасия К. П.</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="member-card-relatives__item -not-mobile">
                                    <a class="member-card-relatives-item__link -color" href="../tree">
                                        <div class="member-card-relatives-item__content">
                                            <div class="member-card-relatives-item__avatar">
                                                <svg style="width: 20px; height: 25px;" aria-hidden="true">
                                                    <use xlink:href="../assets/media/sprite.svg?1644862953803#sprite-tree"></use>
                                                </svg>
                                            </div>
                                            <div class="member-card-relatives-item__name">Смотреть семейное древо</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="member-card__side -gallery col">
                    <div class="member-card__gallery">
                        <div class="member-card-gallery__items">
                            <div class="member-card-gallery__item">
                                <a class="member-card-gallery__link -video" href="../assets/uploads/video/test-video.mp4">
                                    <video class="member-card-gallery__video" src="../assets/uploads/video/test-video.mp4" muted=""></video>
                                    <div class="member-card-gallery__play">
                                        <svg style="width: 31px; height: 37px;" aria-hidden="true">
                                            <use xlink:href="../assets/media/sprite.svg?1644862953803#sprite-play"></use>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                            <div class="member-card-gallery__item">
                                <a class="member-card-gallery__link" href="../assets/uploads/profile/gallery-1.jpg" data-popup-gallery-item="">
                                    <img class="member-card-gallery__image" src="../assets/uploads/profile/gallery-small-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="member-card-gallery__item">
                                <a class="member-card-gallery__link" href="../assets/uploads/profile/gallery-2.jpg" data-popup-gallery-item="">
                                    <img class="member-card-gallery__image" src="../assets/uploads/profile/gallery-small-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="member-card-gallery__item">
                                <a class="member-card-gallery__link" href="../assets/uploads/profile/gallery-3.jpg" data-popup-gallery-item="">
                                    <img class="member-card-gallery__image" src="../assets/uploads/profile/gallery-small-3.jpg" alt="">
                                </a>
                            </div>
                            <div class="member-card-gallery__item">
                                <a class="member-card-gallery__link" href="../assets/uploads/profile/gallery-4.jpg" data-popup-gallery-item="">
                                    <img class="member-card-gallery__image" src="../assets/uploads/profile/gallery-small-4.jpg" alt="">
                                </a>
                            </div>
                            <div class="member-card-gallery__item">
                                <a class="member-card-gallery__link" href="../assets/uploads/profile/gallery-5.jpg" data-popup-gallery-item="">
                                    <img class="member-card-gallery__image" src="../assets/uploads/profile/gallery-small-5.jpg" alt="">
                                </a>
                            </div>
                            <div class="member-card-gallery__item">
                                <a class="member-card-gallery__link" href="../assets/uploads/profile/gallery-1.jpg" data-popup-gallery-item="">
                                    <img class="member-card-gallery__image" src="../assets/uploads/profile/gallery-small-1.jpg" alt="">
                                </a>
                            </div>
                            <div class="member-card-gallery__item">
                                <a class="member-card-gallery__link" href="../assets/uploads/profile/gallery-2.jpg" data-popup-gallery-item="">
                                    <img class="member-card-gallery__image" src="../assets/uploads/profile/gallery-small-2.jpg" alt="">
                                </a>
                            </div>
                            <div class="member-card-gallery__item">
                                <a class="member-card-gallery__link" href="../assets/uploads/profile/gallery-3.jpg" data-popup-gallery-item="">
                                    <img class="member-card-gallery__image" src="../assets/uploads/profile/gallery-small-3.jpg" alt="">
                                </a>
                            </div>
                            <div class="member-card-gallery__item">
                                <a class="member-card-gallery__link" href="../assets/uploads/profile/gallery-4.jpg" data-popup-gallery-item="">
                                    <img class="member-card-gallery__image" src="../assets/uploads/profile/gallery-small-4.jpg" alt="">
                                </a>
                            </div>
                            <div class="member-card-gallery__item">
                                <a class="member-card-gallery__link" href="../assets/uploads/profile/gallery-5.jpg" data-popup-gallery-item="">
                                    <img class="member-card-gallery__image" src="../assets/uploads/profile/gallery-small-5.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
