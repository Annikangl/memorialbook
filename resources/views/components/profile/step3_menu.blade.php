<div class="add-profile-content">
    <div>
        <h3 class="add-profile-content__title">Новый профиль</h3>
        <ul class="steeps-nav">
            <li class="steeps-nav__item ">
                <a href="{{route('profile.create')}}" style="text-decoration: none;">
                    <i class="steeps-nav__icon" ></i>
                    <span class="steeps-nav__title">Шаг 1</span>
                    <p class="steeps-nav__desc">Основная информация</p>
                </a>
            </li>
            <li class="steeps-nav__item ">
                <a href="{{route('profile.create.step2')}}" style="text-decoration: none;">
                    <i class="steeps-nav__icon"></i>
                    <span class="steeps-nav__title">Шаг 2</span>
                    <p class="steeps-nav__desc">Описание</p>
                </a>
            </li>
            <li class="steeps-nav__item active current">
                <a href="{{route('profile.create.step3')}}" style="text-decoration: none;">
                    <i class="steeps-nav__icon"></i>
                    <span class="steeps-nav__title">Шаг 3</span>
                    <p class="steeps-nav__desc">Публикация</p>
                </a>
            </li>
        </ul>
    </div>

</div>

{{--<div class="profile__side -step-menu col">--}}
{{--    <div class="profile__sidebar">--}}
{{--        <h1>Новый профиль</h1>--}}
{{--        <div class="profile__steps-menu">--}}
{{--            <div class="profile-steps-menu__item">--}}
{{--                <a class="profile-steps-menu-item__link -past" href="{{route('profile.create')}}">--}}
{{--                    <div class="profile-steps-menu-item__icon -past"></div>--}}
{{--                    <div class="profile-steps-menu-item__content">--}}
{{--                        <div class="profile-steps-menu-item__title">Шаг 1</div>--}}
{{--                        <div class="profile-steps-menu-item__text">Основная информация</div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="profile-steps-menu__item">--}}
{{--                <a class="profile-steps-menu-item__link -past" href="{{route('profile.create.step2')}}">--}}
{{--                    <div class="profile-steps-menu-item__icon -past"></div>--}}
{{--                    <div class="profile-steps-menu-item__content">--}}
{{--                        <div class="profile-steps-menu-item__title">Шаг 2</div>--}}
{{--                        <div class="profile-steps-menu-item__text">Описание</div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="profile-steps-menu__item">--}}
{{--                <a class="profile-steps-menu-item__link -active" href="{{route('profile.create.step3')}}">--}}
{{--                    <div class="profile-steps-menu-item__icon -active"></div>--}}
{{--                    <div class="profile-steps-menu-item__content">--}}
{{--                        <div class="profile-steps-menu-item__title">Шаг 3</div>--}}
{{--                        <div class="profile-steps-menu-item__text">Публикация</div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
