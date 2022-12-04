@extends('layouts.app')

@section('content')

    <section class="add-profile">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a href="#" class="breadcrumbs__link">Главная</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="#" class="breadcrumbs__link">Личный кабинет</a>
            </li>
            <li class="breadcrumbs__item">
                <a class="breadcrumbs__link">Создание профиля</a>
            </li>
        </ul>

        <div class="add-profile-content">
            <div>
                <h3 class="add-profile-content__title">Новый профиль</h3>
                <ul class="steeps-nav">
                    <li class="steeps-nav__item active current">
                        <i class="steeps-nav__icon"></i>
                        <span class="steeps-nav__title">Шаг 1</span>
                        <p class="steeps-nav__desc">Основная информация</p>
                    </li>
{{--                    <li class="steeps-nav__item">--}}
{{--                        <i class="steeps-nav__icon"></i>--}}
{{--                        <span class="steeps-nav__title">Шаг 2</span>--}}
{{--                        <p class="steeps-nav__desc">Описание</p>--}}
{{--                    </li>--}}
{{--                    <li class="steeps-nav__item">--}}
{{--                        <i class="steeps-nav__icon"></i>--}}
{{--                        <span class="steeps-nav__title">Шаг 3</span>--}}
{{--                        <p class="steeps-nav__desc">Публикация</p>--}}
{{--                    </li>--}}
                </ul>
            </div>

            <form class="add-cemetery-wrap" id="add-cemetery" action="">
                <div class="steep">
                    <div class="steep-wrap">

                        <div class="family-profiles">
                            <h3 class="family-profiles__title">Профили семейного захоронения</h3>
                            <div class="family-profiles-nav">
                                <button type="button" class="family-profiles-nav__prev">
                                    <svg class="family-profiles-nav__icon" viewBox="0 0 9 13"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.99897 11.8789L1.13358 6.01346"/>
                                        <line x1="7.49519" y1="1.06648" x2="2.09519" y2="6.46648"/>
                                    </svg>
                                </button>
                                <button type="button" class="family-profiles-nav__next">
                                    <svg class="family-profiles-nav__icon" viewBox="0 0 9 13"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.00103 1.36133L7.86642 7.22677"/>
                                        <line x1="1.50481" y1="12.1738" x2="6.90481" y2="6.77375"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="profiles-search">
                            <svg class="profiles-search__icon" viewBox="0 0 20 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.3248 12.8987L19.7048 18.2787C19.8939 18.468 20 18.7246 20 18.9921C19.9999 19.2596 19.8935 19.5161 19.7043 19.7052C19.515 19.8943 19.2584 20.0005 18.9909 20.0004C18.7234 20.0003 18.4669 19.894 18.2778 19.7047L12.8978 14.3247C11.2895 15.5704 9.26705 16.1566 7.24189 15.9641C5.21674 15.7716 3.341 14.8148 1.99625 13.2884C0.6515 11.7619 -0.0612416 9.78056 0.00301976 7.74729C0.0672812 5.71402 0.903718 3.7816 2.34217 2.34315C3.78063 0.904695 5.71305 0.0682577 7.74631 0.00399633C9.77958 -0.0602651 11.761 0.652477 13.2874 1.99723C14.8138 3.34198 15.7706 5.21772 15.9631 7.24287C16.1556 9.26802 15.5694 11.2905 14.3238 12.8987H14.3248ZM7.99977 13.9997C9.59107 13.9997 11.1172 13.3676 12.2424 12.2424C13.3676 11.1172 13.9998 9.59104 13.9998 7.99974C13.9998 6.40845 13.3676 4.88232 12.2424 3.7571C11.1172 2.63189 9.59107 1.99974 7.99977 1.99974C6.40847 1.99974 4.88235 2.63189 3.75713 3.7571C2.63191 4.88232 1.99977 6.40845 1.99977 7.99974C1.99977 9.59104 2.63191 11.1172 3.75713 12.2424C4.88235 13.3676 6.40847 13.9997 7.99977 13.9997Z"/>
                            </svg>

                            <input type="text" class="profiles-search__input" name="profiles-search"
                                   placeholder="Введите имя или фамилию"/>

                            <button type="reset" class="profiles-search__reset hide" title="Очистить">
                                <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.9998 8.40078L2.0998 13.3008C1.91647 13.4841 1.68314 13.5758 1.3998 13.5758C1.11647 13.5758 0.883138 13.4841 0.699804 13.3008C0.516471 13.1174 0.424805 12.8841 0.424805 12.6008C0.424805 12.3174 0.516471 12.0841 0.699804 11.9008L5.5998 7.00078L0.699804 2.10078C0.516471 1.91745 0.424805 1.68411 0.424805 1.40078C0.424805 1.11745 0.516471 0.884114 0.699804 0.700781C0.883138 0.517448 1.11647 0.425781 1.3998 0.425781C1.68314 0.425781 1.91647 0.517448 2.0998 0.700781L6.9998 5.60078L11.8998 0.700781C12.0831 0.517448 12.3165 0.425781 12.5998 0.425781C12.8831 0.425781 13.1165 0.517448 13.2998 0.700781C13.4831 0.884114 13.5748 1.11745 13.5748 1.40078C13.5748 1.68411 13.4831 1.91745 13.2998 2.10078L8.3998 7.00078L13.2998 11.9008C13.4831 12.0841 13.5748 12.3174 13.5748 12.6008C13.5748 12.8841 13.4831 13.1174 13.2998 13.3008C13.1165 13.4841 12.8831 13.5758 12.5998 13.5758C12.3165 13.5758 12.0831 13.4841 11.8998 13.3008L6.9998 8.40078Z"/>
                                </svg>
                            </button>

                            <ul class="profiles-search-result hide">
                            </ul>

                        </div>


                        <div class="profiles-search-list">
                            <!-- Если слайдер пустой - присваиваем ему класс hide. Поле с текстом ниже будет прятаться, если убрать его-->

                            <div class="profiles-slider-wrap ">
                                <div class="swiper-wrapper profiles-slider">
                                    <div class="swiper-slide profiles-slider__item">
                                        <div class="profiles-slider-img-wrap">
                                            <div class="profiles-slider-img">
                                                <img src="{{ asset('assets/media/media/empty-avatar.png') }}"
                                                     class="bg-img" alt="" title=""/>
                                            </div>
                                            <a class="profiles-slider-img-icon">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.7215 3.30173L14.6992 6.27942L11.7215 3.30173ZM12.9847 2.03857C13.3796 1.64371 13.9151 1.42188 14.4735 1.42188C15.032 1.42188 15.5675 1.64371 15.9624 2.03857C16.3572 2.43344 16.5791 2.96899 16.5791 3.52742C16.5791 4.08584 16.3572 4.62139 15.9624 5.01626L4.36827 16.6104H1.4209V13.6024L12.9847 2.03857V2.03857Z"
                                                        stroke="#201E1F" stroke-width="1.68421" stroke-linecap="round"
                                                        stroke-linejoin="round"/>
                                                </svg>
                                                <span class="profiles-slider-message">Редактировать</span>
                                            </a>
                                        </div>
                                        <time class="profiles-slider__date">1964 - 2008 г.</time>
                                        <span class="profiles-slider__name">Иванов Михаил Петрович</span>
                                    </div>
                                    <div class="swiper-slide profiles-slider__item profile-review">
                                        <div class="profiles-slider-img-wrap">
                                            <div class="profiles-slider-img">
                                                <img src="{{ asset('assets/media/media/empty-avatar.png') }}"
                                                     class="bg-img" alt="" title=""/>
                                            </div>
                                            <a class="profiles-slider-img-icon">
                                                <svg width="12" height="20" viewBox="0 0 12 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.999 20H-0.000976562V14L3.99902 10L-0.000976562 6V0H11.999V6L7.99902 10L11.999 14M1.99902 5.5L5.99902 9.5L9.99902 5.5V2H1.99902M5.99902 10.5L1.99902 14.5V18H9.99902V14.5M7.99902 16H3.99902V15.2L5.99902 13.2L7.99902 15.2V16Z"
                                                        fill="#201E1F"/>
                                                </svg>
                                                <span class="profiles-slider-message">Профиль на проверке</span>
                                            </a>
                                        </div>
                                        <time class="profiles-slider__date">1964 - 2008 г.</time>
                                        <span class="profiles-slider__name">Иванов Михаил Петрович</span>
                                    </div>
                                    <div class="swiper-slide profiles-slider__item">
                                        <div class="profiles-slider-img-wrap">
                                            <div class="profiles-slider-img">
                                                <img src="{{ asset('assets/media/media/empty-avatar.png') }}"
                                                     class="bg-img" alt="" title=""/>
                                            </div>
                                            <a class="profiles-slider-img-icon">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.9998 8.40078L2.0998 13.3008C1.91647 13.4841 1.68314 13.5758 1.3998 13.5758C1.11647 13.5758 0.883138 13.4841 0.699804 13.3008C0.516471 13.1174 0.424805 12.8841 0.424805 12.6008C0.424805 12.3174 0.516471 12.0841 0.699804 11.9008L5.5998 7.00078L0.699804 2.10078C0.516471 1.91745 0.424805 1.68411 0.424805 1.40078C0.424805 1.11745 0.516471 0.884114 0.699804 0.700781C0.883138 0.517448 1.11647 0.425781 1.3998 0.425781C1.68314 0.425781 1.91647 0.517448 2.0998 0.700781L6.9998 5.60078L11.8998 0.700781C12.0831 0.517448 12.3165 0.425781 12.5998 0.425781C12.8831 0.425781 13.1165 0.517448 13.2998 0.700781C13.4831 0.884114 13.5748 1.11745 13.5748 1.40078C13.5748 1.68411 13.4831 1.91745 13.2998 2.10078L8.3998 7.00078L13.2998 11.9008C13.4831 12.0841 13.5748 12.3174 13.5748 12.6008C13.5748 12.8841 13.4831 13.1174 13.2998 13.3008C13.1165 13.4841 12.8831 13.5758 12.5998 13.5758C12.3165 13.5758 12.0831 13.4841 11.8998 13.3008L6.9998 8.40078Z"
                                                        fill="#201E1F"/>
                                                </svg>
                                                <span class="profiles-slider-message">Удалить</span>
                                            </a>
                                        </div>
                                        <time class="profiles-slider__date">1964 - 2008 г.</time>
                                        <span class="profiles-slider__name">Иванов Михаил Петрович</span>
                                    </div>
                                </div>
                            </div>

                            <p class="search-result-text">Воспользуйтесь поиском, чтобы добавить профиль человека <br/>или
                                <br/>
                                <a href="#">создайте новый</a></p>
                        </div>

                    </div>
                </div>

{{--                <div class="steep hide"></div>--}}
{{--                <div class="steep hide"></div>--}}

                <div class="buttons-save">
                    <button type="button" class="save-draft hide btn white-btn">Сохранить как черновик</button>
                    <button type="submit" class="save-and-next btn blue-btn">Сохранить и продолжить</button>
                </div>

            </form>
            <p class="add-profile__text">Давайте создавать и хранить историю вместе? Для начала необходимо заполнить
                основную информацию профиля.</p>
        </div>
    </section>
@endsection

