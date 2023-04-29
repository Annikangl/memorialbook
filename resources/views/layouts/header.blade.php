<header class="header @if(Route::is('login')) login-page @endif">
    <!--logo header-->
    <a href="{{ route('home') }}" class="logo-header">
        <img src="{{ asset('assets/img/logo/logo.svg') }}" class="logo-header__img"
             alt="Memorialbook"
             title="Memorialbook"/>
    </a>

    <!--menu-->
    <nav class="header-menu" id="header-menu">
        <ul class="menu">
            @guest
                <li class="menu__item search-people">
                    <a href="#" class="menu__link">{{ __('layout.link_search_people') }}</a>
                </li>
                <li class="menu__item search-places">
                    <a href="#" class="menu__link">{{ __('layout.link_search_place') }}</a>
                </li>
            @else
                <li class="menu__item search-people">
                    <a href="#" class="menu__link">{{ __('layout.link_search_people') }}</a>
                </li>
                <li class="menu__item search-places">
                    <a href="#" class="menu__link">{{ __('layout.link_search_place') }}</a>
                </li>
                <li class="menu__item">
                    <a href="{{ route('tree') }}" class="menu__link">{{ __('layout.link_family_tree') }}</a>
                </li>
                <li class="menu__item">
                    <a href="#" class="menu__link">{{ __('layout.link_shop') }}</a>
                </li>
                @if ($agent->isMobile())
                    <li class="menu__item">
                        <a href="{{ route('community.create') }}"
                           class="menu__link">{{__('left_menu.create_community')}}</a>
                    </li>
                    <li class="menu__item">
                        <a href="{{ route('cemetery.create') }}"
                           class="menu__link">{{__('left_menu.create_cemetery')}}</a>
                    </li>
                    <li class="menu__item">
                        <a href="{{ route('profile.family.create') }}"
                           class="menu__link">{{__('left_menu.create_burial')}}</a>
                    </li>
                @endif
            @endif
        </ul>
    </nav>

    <!--buttons-->
    @auth
        <div class="header-buttons" id="header-button">
            <button type="button" class="header-buttons__lang">EN</button>

            <button type="button" class="notifications">
                <svg xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m17.6 14.5-.2-.3c-1-1.2-1.7-2-1.7-5.5 0-3.2-1.3-5.3-4-6.4C11.4.9 10.3 0 9 0 7.7 0 6.6.9 6.2 2.3 3.6 3.4 2.3 5.5 2.3 8.7c0 3.5-.6 4.3-1.7 5.5l-.2.3c-.4.5-.5 1.2-.2 1.8.3.6.9 1 1.6 1h3.5c0 1 .4 1.9 1.1 2.6C7.1 20.6 8 21 9 21s1.9-.4 2.7-1.1c.7-.7 1.1-1.7 1.1-2.6h3.5c.7 0 1.3-.4 1.6-1 .2-.6.2-1.3-.3-1.8zm-7 4.3c-.8.9-2.3.9-3.2 0-.4-.4-.7-1-.7-1.6h4.5c.1.6-.2 1.2-.6 1.6zm5.7-3H1.8c-.2 0-.2-.1-.3-.1v-.2l.2-.3c1.1-1.4 2-2.4 2-6.5 0-3.3 1.6-4.4 3-5 .4-.2.8-.5.9-1 .2-.6.7-1.2 1.4-1.2s1.2.6 1.3 1.2c.1.4.5.8.9 1 1.4.6 3 1.7 3 5 0 4.1.9 5.1 2 6.5l.2.3v.2c.1 0 0 .1-.1.1z"/>
                </svg>
                <span class="notifications__number">1</span>
            </button>

            <a href="{{ route('cabinet.show', auth()->user()->slug ) }}" class="login">
                {{ auth()->user()->username }}
            </a>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="login" style="margin-left: 10px">{{ __('auth.sign_out') }}</button>
            </form>

            <button type="button" class="header-buttons__menu" id="mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    @else
        <div class="header-buttons" id="header-button">
            <button type="button" class="header-buttons__lang">En</button>
            <button type="button"
                    class="header-buttons__registration open-registration btn white-btn">{{ __('layout.btn_register') }}
            </button>
            <button type="button" class="header-buttons__menu" id="mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    @endif
</header>
