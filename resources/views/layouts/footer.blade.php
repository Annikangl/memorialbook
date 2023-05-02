<footer class="footer">
    <!--logo footer-->
    <a href="#" class="logo-footer">
        <img src="{{ asset('assets/img/logo/logo-light.svg') }}" class="logo-footer__img"
             alt="Memorialbook" title="Memorialbook"/>
    </a>

    <!--menu-->
    <nav class="footer-menu">
        <ul class="menu-list">
            @guest
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link">{{ __('layout.about_project') }}</a>
                </li>
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link">{{ __('layout.contacts') }}</a>
                </li>
            @else
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link">{{ __('layout.about_project') }}</a>
                </li>
                <li class="menu-list__item">
                    <a href="{{ route('tree') }}" class="menu-list__link">{{ __('layout.link_family_tree') }}</a>
                </li>
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link">{{ __('layout.link_shop') }}</a>
                </li>
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link search-people">{{ __('layout.link_search_people') }}</a>
                </li>
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link search-places">{{ __('layout.link_search_place') }}</a>
                </li>
                <li class="menu-list__item">
                    <a href="#" class="menu-list__link">{{ __('layout.contacts') }}</a>
                </li>
            @endif
        </ul>
    </nav>

    <!--cookie link-->
    <a href="{{ route('policy') }}" class="cookie-link">{{ __('layout.policy') }}</a>
</footer>
