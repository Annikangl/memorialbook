<div class="profile__side -step-menu col">
    <div class="profile__sidebar">
        <h1>Новый профиль</h1>
        <div class="profile__steps-menu">
            <div class="profile-steps-menu__item">
                <a class="profile-steps-menu-item__link -past" href="{{route('profile.create')}}">
                    <div class="profile-steps-menu-item__icon -past"></div>
                    <div class="profile-steps-menu-item__content">
                        <div class="profile-steps-menu-item__title">Шаг 1</div>
                        <div class="profile-steps-menu-item__text">Основная информация</div>
                    </div>
                </a>
            </div>
            <div class="profile-steps-menu__item">
                <a class="profile-steps-menu-item__link -active" href="{{route('profile.create.step2')}}">
                    <div class="profile-steps-menu-item__icon -active"></div>
                    <div class="profile-steps-menu-item__content">
                        <div class="profile-steps-menu-item__title">Шаг 2</div>
                        <div class="profile-steps-menu-item__text">Описание</div>
                    </div>
                </a>
            </div>
            <div class="profile-steps-menu__item">
                <a class="profile-steps-menu-item__link" href="{{route('profile.create.step3')}}">
                    <div class="profile-steps-menu-item__icon"></div>
                    <div class="profile-steps-menu-item__content">
                        <div class="profile-steps-menu-item__title">Шаг 3</div>
                        <div class="profile-steps-menu-item__text">Публикация</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
