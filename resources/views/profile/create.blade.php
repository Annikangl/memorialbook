@extends('layouts.app')

<main class="main-content" role="main">
    <div class="container">
        <div class="breadcrumbs">
            <nav class="breadcrumbs__inner" aria-labelledby="breadcrumbs-title">
                <div class="breadcrumbs__title sr-only" id="breadcrumbs-title">Навигационная цепочка</div>
                <ul class="breadcrumbs__list">
                    <li class="breadcrumbs__item">
                        <a class="breadcrumbs__link" href="../">Главная</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <a class="breadcrumbs__link" href="../profile">Личный кабинет</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <span class="breadcrumbs__link">Создание профиля</span>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="profile -profile-adding">
            <div class="profile__row row">
                <div class="profile__side -step-info col">
                    <div class="profile__text-info">Давайте создавать и хранить историю вместе? Для начала необходимо заполнить основную информацию
                        профиля.</div>
                </div>
                <div class="profile__side -step-menu col">
                    <div class="profile__sidebar">
                        <h1>Новый профиль</h1>
                        <div class="profile__steps-menu">
                            <div class="profile-steps-menu__item">
                                <a class="profile-steps-menu-item__link -active" href="../profile-add-member">
                                    <div class="profile-steps-menu-item__icon -active"></div>
                                    <div class="profile-steps-menu-item__content">
                                        <div class="profile-steps-menu-item__title">Шаг 1</div>
                                        <div class="profile-steps-menu-item__text">Основная информация</div>
                                    </div>
                                </a>
                            </div>
                            <div class="profile-steps-menu__item">
                                <a class="profile-steps-menu-item__link" href="../profile-add-member-2">
                                    <div class="profile-steps-menu-item__icon"></div>
                                    <div class="profile-steps-menu-item__content">
                                        <div class="profile-steps-menu-item__title">Шаг 2</div>
                                        <div class="profile-steps-menu-item__text">Описание</div>
                                    </div>
                                </a>
                            </div>
                            <div class="profile-steps-menu__item">
                                <a class="profile-steps-menu-item__link" href="../profile-add-member-3">
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
                <div class="profile__side -step-content col">
                    <div class="base-form -full">
                        <form class="form form-initialized base-form-initialized preloader-initialized" action="#" method="post" data-base-form="" aria-disabled="false" novalidate="">
                            <div class="profile__section">
                                <div class="profile-section__row row">
                                    <div class="profile-section__side">
                                        <div class="profile-avatar -middle">
                                            <div class="profile-avatar__inner">
                                                <div class="profile-avatar__file -preview file file-initialized" data-file="">
                                                    <label class="profile-avatar-file__list file-list" for="profile-image-6">
                                                                    <span class="file-item" title="Управление аватаром" style="background-image: url('../assets/uploads/profile/avatar-5.jpg')">
                                                                        <span class="file-name">Управление аватаром</span>
                                                                        <button class="file-cancel" type="button" title="Отменить загрузку файла">
                                                                            <svg style="width: 12px; height: 12px;" aria-hidden="true">
                                                                                <use xlink:href="../assets/media/sprite.svg?1642772414527#sprite-close"></use>
                                                                            </svg>
                                                                        </button>
                                                                    </span>
                                                    </label>
                                                    <label class="profile-avatar-file__label file-label" for="profile-image-6">
                                                        <div class="file-label-inner">
                                                            <span>Выберите фото</span>
                                                        </div>
                                                    </label>
                                                    <input class="profile-avatar-file__input file-input sr-only" type="file" id="profile-image-6" value="Управление аватаром" accept=".jpg,.jpeg,.png">
                                                    <label class="profile-avatar-file__button btn btn-primary" for="profile-image-6">
                                                        <svg style="width: 22px; height: 20px;" aria-hidden="true">
                                                            <use xlink:href="../assets/media/sprite.svg?1642772414527#sprite-photo"></use>
                                                        </svg>
                                                    </label>
                                                    <button class="profile-avatar-file__del-link js-avatar-del-link" type="button">Удалить фото
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-section__side">
                                        <div class="profile-section__row row">
                                            <div class="profile-section__form-group -mt-0 form-group">
                                                <label class="profile-section__label" for="new-member-name">Имя:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control is-valid" type="text" id="new-member-name" name="name" value="Михаил" autofocus="" data-validate="required, name">
                                                </div>
                                            </div>
                                            <div class="profile-section__form-group form-group">
                                                <label class="profile-section__label" for="new-member-patronymic">Отчество:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="text" id="new-member-patronymic" name="patronymic" placeholder="Сергеевич" data-validate="required, patronymic">
                                                </div>
                                            </div>
                                            <div class="profile-section__form-group form-group">
                                                <label class="profile-section__label" for="new-member-surname">Фамилия:</label>
                                                <div class="profile-section__input-container">
                                                    <input class="profile-section__input form-control" type="text" id="new-member-surname" name="surname" placeholder="Иванов" data-validate="required, surname">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile__section">
                                <div class="profile-section__row -m-up row">
                                    <div class="profile-section__form-group -half form-group">
                                        <label class="profile-section__label" for="new-member-birth">Дата рождения:</label>
                                        <div class="profile-section__input-container">
                                            <input class="profile-section__input form-control mask-initialized" type="text" id="new-member-birth" name="birth-day" value="24.12.1968" data-validate="required" data-mask="99.99.9999" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="profile-section__form-group -half form-group">
                                        <label class="profile-section__label" for="new-member-birth-place">Место рождения:</label>
                                        <div class="profile-section__input-container">
                                            <input class="profile-section__input form-control" type="text" id="new-member-birth-place" name="birth-place" value="пос. Белгородский">
                                        </div>
                                    </div>
                                    <div class="profile-section__form-group -half form-group">
                                        <label class="profile-section__label" for="new-member-death">Дата смерти:</label>
                                        <div class="profile-section__input-container">
                                            <input class="profile-section__input form-control mask-initialized" type="text" id="new-member-death" name="death-day" value="24.12.2001" data-mask="99.99.9999" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="profile-section__form-group -half -address form-group">
                                        <label class="profile-section__label" for="new-member-death-place">Место захоронения:</label>
                                        <div class="profile-section__input-container">
                                            <input class="profile-section__input form-control popup-initialized" type="text" id="new-member-death-place" name="death-place" placeholder="Укажите место захоронения" readonly="" data-popup="#popup-map">
                                            <div class="popup -map mfp-hide popup-initialized" role="dialog" id="popup-map" aria-hidden="true" aria-labelledby="popup-map-title">
                                                <div class="popup__inner">
                                                    <div class="popup__map mapGoogle-initialized" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div style="overflow: hidden;"></div><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div tabindex="0" aria-label="Карта" aria-roledescription="карта" role="region" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: none;"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 996; transform: matrix(1, 0, 0, 1, -159, -17);"><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"></div></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><span id="E6F879F4-C113-4A91-A482-78219A0C6651" style="display: none;">Для навигации используйте клавиши со стрелками.</span></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div class="gm-style-moc" style="z-index: 4; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;"><p class="gm-style-mot"></p></div></div><iframe aria-hidden="true" frameborder="0" tabindex="-1" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe><div style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);"></div></div></div></div>
                                                    <div class="popup__controls -top">
                                                        <input class="popup__input form-control form-control-sm pac-target-input" type="text" placeholder="Введите запрос" autocomplete="off">
                                                    </div>
                                                    <div class="popup__controls -bottom">
                                                        <button class="popup__button -map-submit btn btn-primary btn-lg inactive" type="button">
                                                            Применить местоположение</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-section__form-group -half form-group">
                                        <label class="profile-section__label" for="new-member-death-reason">Причина смерти:</label>
                                        <div class="profile-section__input-container">
                                            <input class="profile-section__input form-control" type="text" id="new-member-death-reason" name="death-reason">
                                        </div>
                                    </div>
                                    <div class="profile-section__form-group -half form-group">
                                        <label class="profile-section__label" for="new-member-death-certificate">Свидетельство о смерти:</label>
                                        <div class="profile-section__input-container">
                                            <input class="profile-section__input form-control" type="text" id="new-member-death-certificate" name="death-certificate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile__section">
                                <div class="profile-section__row -m-up row">
                                    <div class="profile-section__form-group -half form-group">
                                        <label class="profile-section__label" for="new-member-father">Отец</label>
                                        <div class="choices select-initialized" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner form-control"><select class="profile-section__select select choices__input" id="new-member-father" hidden="" data-select="" tabindex="-1" data-choice="active"><option value="0" selected="">
                                                        Выберите из списка
                                                    </option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="0" aria-selected="true">
                                                        <div class="choices__item-label">Выберите из списка</div>
                                                    </div></div><span class="icon"><svg aria-hidden="true" style="width: 10px; height: 13px;"><use xlink:href="../assets/media/sprite.svg#sprite-arrow"></use></svg></span></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div class="choices__item choices__item--choice is-highlighted" data-choice="" data-id="1" data-value="0" data-choice-selectable="" data-selected="" role="option" aria-selected="true">

                                                        <div class="choices__item-label">Выберите из списка</div>

                                                    </div><div class="choices__item choices__item--choice" data-choice="" data-id="2" data-value="1" data-choice-selectable="" role="option">

                                                        <div class="choices__item-label">Алексеев Алексей Алексеевич</div>

                                                    </div><div class="choices__item choices__item--choice" data-choice="" data-id="3" data-value="1" data-choice-selectable="" role="option">

                                                        <div class="choices__item-label">Алексеев Алексей Матвеевич</div>

                                                    </div></div></div></div>
                                    </div>
                                    <div class="profile-section__form-group -half form-group">
                                        <label class="profile-section__label" for="new-member-mother">Мать</label>
                                        <div class="choices select-initialized" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner form-control"><select class="profile-section__select select choices__input" id="new-member-mother" hidden="" data-select="" tabindex="-1" data-choice="active"><option value="0" selected="">
                                                        Выберите из списка
                                                    </option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="0" aria-selected="true">
                                                        <div class="choices__item-label">Выберите из списка</div>
                                                    </div></div><span class="icon"><svg aria-hidden="true" style="width: 10px; height: 13px;"><use xlink:href="../assets/media/sprite.svg#sprite-arrow"></use></svg></span></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div class="choices__item choices__item--choice is-highlighted" data-choice="" data-id="1" data-value="0" data-choice-selectable="" data-selected="" role="option" aria-selected="true">

                                                        <div class="choices__item-label">Выберите из списка</div>

                                                    </div><div class="choices__item choices__item--choice" data-choice="" data-id="2" data-value="1" data-choice-selectable="" role="option">

                                                        <div class="choices__item-label">Каренина Анна Аркадьевна</div>

                                                    </div><div class="choices__item choices__item--choice" data-choice="" data-id="3" data-value="1" data-choice-selectable="" role="option">

                                                        <div class="choices__item-label">Облонская Анна Аркадьевна</div>

                                                    </div></div></div></div>
                                    </div>
                                    <div class="profile-section__form-group -half form-group">
                                        <label class="profile-section__label" for="new-member-partner">Супруг / Супруга</label>
                                        <div class="choices select-initialized" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner form-control"><select class="profile-section__select select choices__input" id="new-member-partner" hidden="" data-select="" tabindex="-1" data-choice="active"><option value="0" selected="">
                                                        Выберите из списка
                                                    </option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="0" aria-selected="true">
                                                        <div class="choices__item-label">Выберите из списка</div>
                                                    </div></div><span class="icon"><svg aria-hidden="true" style="width: 10px; height: 13px;"><use xlink:href="../assets/media/sprite.svg#sprite-arrow"></use></svg></span></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div class="choices__item choices__item--choice is-highlighted" data-choice="" data-id="1" data-value="0" data-choice-selectable="" data-selected="" role="option" aria-selected="true">

                                                        <div class="choices__item-label">Выберите из списка</div>

                                                    </div><div class="choices__item choices__item--choice" data-choice="" data-id="2" data-value="1" data-choice-selectable="" role="option">

                                                        <div class="choices__item-label">Дитриев Дмитрий Дмитриевич</div>

                                                    </div><div class="choices__item choices__item--choice" data-choice="" data-id="3" data-value="1" data-choice-selectable="" role="option">

                                                        <div class="choices__item-label">Андрей Дмитрий Дмитриевич</div>

                                                    </div></div></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile__bottom">
                                <div class="profile-bottom__item">
                                    <a class="profile-bottom__button btn btn-primary" href="../profile-add-member-2">Сохранить и продолжить</a>
                                </div>
                            </div>
                            <div class="preloader" role="status" style="transition-duration: 250ms;">
                                <div class="preloader-spinner">

                                </div>
                            </div></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
