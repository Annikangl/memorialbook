@extends('layouts.app')
@section('content')
    <div class="tree">
        <div class="container">
            <div class="tree__inner">
                <div class="tree__nav">
                    <div class="tree-nav__items">
                        <div class="tree-nav__item">
                            <a class="tree-nav__link active" href="../tree">Семейное древо</a>
                        </div>
                        <div class="tree-nav__item">
                            <a class="tree-nav__link" href="../tree-list">Список профилей</a>
                        </div>
                    </div>
                </div>
                <div class="tree__controls">
                    <button class="tree-controls__button -new btn btn-primary btn-sm" type="button">+ Добавить профиль</button>
                </div>
            </div>
            <div class="tree__content">
                <div class="profile-empty">
                    <div class="profile-empty__inner">
                        <div class="profile-empty__title">В вашем семейном дереве нет ни одного профиля.</div>
                        <div class="profile-empty__text">Возможно кладбище уже добавило информацию и вы можете <a href="../map"> найти их на карте
                            </a>.
                            <br>Если нет, просто <a href="{{route('profile.create')}}"> создайте новый профиль</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tree__content"></div>
        <script>
            window.treeContent = []
        </script>
    </div>
@endsection
