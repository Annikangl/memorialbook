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
            <li class="steeps-nav__item active current">
                <a href="{{route('profile.create.step2')}}" style="text-decoration: none;">
                    <i class="steeps-nav__icon"></i>
                    <span class="steeps-nav__title">Шаг 2</span>
                    <p class="steeps-nav__desc">Описание</p>
                </a>
            </li>
            <li class="steeps-nav__item">
                <a href="{{route('profile.create.step3')}}" style="text-decoration: none;">
                    <i class="steeps-nav__icon"></i>
                    <span class="steeps-nav__title">Шаг 3</span>
                    <p class="steeps-nav__desc">Публикация</p>
                </a>
            </li>
        </ul>
    </div>

</div>
