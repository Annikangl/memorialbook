@extends('layouts.app')

@section('content')
    <div class="tree">
        <div class="container">
            <div class="tree__inner">
                <div class="tree__nav">
                    <div class="tree-nav__items">
                        <div class="tree-nav__item">
                            <a class="tree-nav__link @if (Route::is('tree')) active @endif" href="{{ route('tree') }}">Семейное древо</a>
                        </div>
                        <div class="tree-nav__item">
                            <a class="tree-nav__link @if (Route::is('tree.list')) active @endif" href="{{ route('tree.list') }}">Список профилей</a>
                        </div>
                    </div>
                </div>
                <div class="tree__controls">
                    <a class="tree-controls__button -new btn btn-primary btn-sm" href="{{route('profile.create')}}">+ Добавить
                        профиль</a>
                </div>
            </div>
            <div class="tree__content">
                <div class="profile-empty">
                    <div class="profile-empty__inner">
                        <div class="profile-empty__title">В вашем семейном дереве нет ни одного профиля.</div>
                        <div class="profile-empty__text">Возможно кладбище уже добавило информацию и вы можете
                            <a href="#slideout-people" data-slideout=""  data-slideout-options="{&quot;type&quot;:&quot;people&quot;,&quot;position&quot;:&quot;top&quot;}"> найти их на карте</a>.
                            <br>Если нет, просто <a href="{{route('profile.create')}}"> создайте новый профиль</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tree__content"></div>

    </div>
@endsection

@section('scripts')
    <script>
        window.treeContent = []
    </script>
@endsection
