{{--<li class="news-menu__item search-people">--}}
{{--    <a href="#" class="news-menu__link">Люди</a>--}}
{{--</li>--}}
{{--<li class="news-menu__item search-places">--}}
{{--    <a href="#" class="news-menu__link">Места</a>--}}
{{--</li>--}}
<li class="news-menu__item">
    <a href="{{ route('community.index')}}" class="news-menu__link">Сообщества</a>
</li>
<li class="news-menu__item">
    <a href="#" class="news-menu__link">Питомцы</a>
</li>
<li class="news-menu__item">
    <a href="{{ route('tree') }}" class="news-menu__link">Семейное дерево</a>
</li>
<li class="news-menu__item">
    <a href="{{ route('home') }}" class="news-menu__link">Магазин</a>
</li>
<li class="news-menu__item active">
    <a href="{{ route('home') }}" class="news-menu__link">Новости</a>
</li>

<li class="news-menu__item">
    <a href="{{ route('community.create') }}" class="news-menu__link">Создать сообщество</a>
</li>
<li class="news-menu__item">
    <a href="{{ route('cemetery.create') }}" class="news-menu__link">Создать кладбище</a>
</li>
<li class="news-menu__item">
    <a href="{{ route('profile.family.create') }}" class="news-menu__link">Создать захоронение</a>
</li>
