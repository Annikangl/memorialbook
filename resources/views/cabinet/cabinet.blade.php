@extends('layouts.app')

@section('content')

    {{ dump(session('success')) }}
    <section class="edit">

        @include('includes.partials.breadcrumbs')

        <h3 class="edit__title">Управление аккаунтом</h3>
        <form action="{{ route('cabinet.update', ['user' => $user]) }}" method="POST" enctype="multipart/form-data">
        <div class="edit-wrap">
            <div class="info-profile">
                <div class="user-avatar">
                    <div class="preview-avatar">
                        <label class="preview-avatar-wrap">
                            <img src="{{ asset('storage/' . $user->avatar )  }}" alt="" class="bg-img">
                            <input type="file" accept=".jpg,.jpeg,.png" name="avatar" class="input-avatar" id="change-avatar"/>
                            <span class="preview-avatar-wrap__text">Выберите фото</span>
                        </label>
                        <label class="preview-avatar__icon" for="change-avatar">
                            <svg>
                                <path class="st0"
                                      d="M18.1 19.1h-15c-.8 0-1.6-.3-2.2-.9-.6-.6-.9-1.4-.9-2.3V6.3c0-.8.3-1.6.9-2.2s1.4-.9 2.2-.9h1c.2 0 .4 0 .5-.1.2-.1.4-.2.5-.4L6 1.4c.3-.4.7-.8 1.1-1C7.5.1 8 0 8.5 0h4.1c.5 0 1 .1 1.5.4.5.2.8.6 1.1 1l.9 1.3c.1.2.2.3.4.4s.3.1.5.1h1c.8 0 1.6.3 2.2.9.6.6.9 1.4.9 2.2v9.6c0 .8-.3 1.6-.9 2.2-.5.6-1.3 1-2.1 1zM3.1 5.2c-.3 0-.6.1-.8.3S2 6 2 6.3v9.6c0 .3.1.6.3.8.2.2.5.3.8.3H18c.3 0 .6-.1.8-.3.2-.2.3-.5.3-.8V6.3c0-.3-.1-.6-.3-.8-.2-.2-.5-.3-.8-.3h-1c-.5 0-1-.1-1.5-.4-.5-.2-.8-.6-1.1-1l-.9-1.3c-.1-.2-.2-.3-.4-.4s-.2-.1-.4-.1H8.5c-.1 0-.3 0-.5.1s-.3.3-.4.4l-.9 1.3c-.3.4-.7.8-1.1 1-.5.2-1 .4-1.5.4h-1z"/>
                                <path class="st0"
                                      d="M10.6 14.8c-1.1 0-2.2-.4-3-1.2-.8-.8-1.2-1.8-1.2-3 0-1.1.4-2.2 1.2-3 .8-.8 1.9-1.2 3-1.2s2.2.4 3 1.2c.8.8 1.2 1.9 1.2 3s-.4 2.2-1.2 3-1.9 1.2-3 1.2zm0-6.4c-.6 0-1.1.2-1.6.6-.4.4-.6 1-.6 1.6 0 .6.2 1.1.6 1.6.8.8 2.3.8 3.1 0 .4-.4.6-1 .6-1.6s-.2-1.1-.6-1.6c-.3-.4-.9-.6-1.5-.6z"/>
                            </svg>
                        </label>
                    </div>
                    <button type="button" class="delete-avatar hide">Удалить фото</button>
                </div>
                <div class="info-profile-name-wrap">
                    <h6 class="info-profile__name">{{ $user->username }}</h6>
                    <span class="info-profile__status">Создатель профилей</span>
                </div>
                <div class="info-profile-value">
                    <div class="info-profile-value-wrap">
                        <span class="info-profile-value-num">{{ $user->profiles->count() }}</span>
                        <span class="info-profile-value-text">Профилей</span>
                    </div>
                    <div class="info-profile-value-wrap">
                        <span class="info-profile-value-num">7</span>
                        <span class="info-profile-value-text">Доступов</span>
                    </div>
                </div>
                <button type="button" id="input-link" class="button-change-password white-btn btn"
                        title="Сменить пароль">Смена пароля
                </button>
                <a href="#" class="delete-profile" title="Удалить аккаунт">Удалить аккаунт</a>
            </div>


            <div class="edit-profile">
                <h4 class="edit-profile__title">Основная информация</h4>

                    @csrf
                    @method('PUT')
                    <div class="edit-profile-wrap grid-col-2">

                        <div class="input-wrap">
                            <span class="input-wrap__title">Имя:</span>
                            <div class="input-form">
                                <input type="text" class="input-text" name="first_name" value="{{ $user->fullName[1] }}"
                                       title=""/>
                            </div>
                        </div>
                        <div class="input-wrap">
                            <span class="input-wrap__title">Отчество:</span>
                            <div class="input-form">
                                <input type="text" class="input-text" name="patronymic"
                                       value="{{ $user->fullName[2] ?? '' }}" title=""/>
                            </div>
                        </div>
                        <div class="input-wrap">
                            <span class="input-wrap__title">Фамилия:</span>
                            <div class="input-form">
                                <input type="text" class="input-text" name="last_name"
                                       value="{{ $user->fullName[0] ?? '' }}" title=""/>
                            </div>
                        </div>
                        <div class="input-wrap">
                            <span class="input-wrap__title">Email:</span>
                            <div class="input-form">
                                <input type="email" class="input-text" name="email" value="{{ $user->email }}"
                                       title=""/>
                            </div>
                        </div>
                        <div class="input-wrap">
                            <span class="input-wrap__title">Телефон:</span>
                            <div class="input-form">
                                <input type="email" class="input-text" name="phone" value="{{ $user->phone }}"
                                       title=""/>
                            </div>
                        </div>
                        <button type="submit" class="button-save btn blue-btn">Сохранить</button>
                    </div>
                </form>

                <h4 class="edit-profile__title">Доступ к профилям</h4>

                <ul class="access-profiles">
                    <li class="access-profiles__item">
                        <div class="access-profiles__wrap">
                            <div class="access-profiles__img">
                                <img src="img/relatives/avatar-1.jpg" class="bg-img" alt="" title=""/>
                            </div>
                            <span class="access-profiles__name">Алексей В.Н.</span>
                        </div>
                        <span class="access-profiles__status">Администратор</span>
                    </li>
                    <li class="access-profiles__item">
                        <div class="access-profiles__wrap">
                            <div class="access-profiles__img">
                                <img src="img/relatives/avatar-2.jpg" class="bg-img" alt="" title=""/>
                            </div>
                            <span class="access-profiles__name">Андросова М. В.</span>
                        </div>
                        <span class="access-profiles__status">Полный доступ</span>
                    </li>
                    <li class="access-profiles__item">
                        <div class="access-profiles__wrap">
                            <div class="access-profiles__img">
                                <img src="img/relatives/avatar-1.jpg" class="bg-img" alt="" title=""/>
                            </div>
                            <span class="access-profiles__name">Анастасия К. П.</span>
                        </div>
                        <span class="access-profiles__status wait-status">Ожидает подтверждения</span>
                    </li>
                </ul>

                <button type="button" class="button-share">Поделиться доступом к профилю</button>
            </div>
        </div>
    </section>
@endsection
