<li class="news-menu__item search-people">
    <a href="#" class="news-menu__link">{{ __('left_menu.People') }}</a>
</li>
<li class="news-menu__item search-places">
    <a href="#" class="news-menu__link">{{ __('left_menu.Places') }}</a>
</li>
<li class="news-menu__item">
    <a href="{{ route('community.index')}}" class="news-menu__link">{{__('left_menu.communities')}}</a>
</li>
<li class="news-menu__item">
    <a href="#" class="news-menu__link">{{__('left_menu.pets')}}</a>
</li>
<li class="news-menu__item">
    <a href="{{ route('tree') }}" class="news-menu__link">{{__('left_menu.Family tree')}}</a>
</li>
<li class="news-menu__item">
    <a href="{{ route('home') }}" class="news-menu__link">{{__('left_menu.shop')}}</a>
</li>
<li class="news-menu__item @if(Route::is('home')) active @endif">
    <a href="{{ route('home') }}" class="news-menu__link">{{__('left_menu.news')}}</a>
</li>

{{--<li class="news-menu__item">--}}
{{--    <a href="{{ route('community.create') }}" class="news-menu__link">{{__('left_menu.create_community')}}</a>--}}
{{--</li>--}}
{{--<li class="news-menu__item">--}}
{{--    <a href="{{ route('cemetery.create') }}" class="news-menu__link">{{__('left_menu.create_cemetery')}}</a>--}}
{{--</li>--}}
{{--<li class="news-menu__item">--}}
{{--    <a href="{{ route('profile.family.create') }}" class="news-menu__link">{{__('left_menu.create_burial')}}</a>--}}
{{--</li>--}}
