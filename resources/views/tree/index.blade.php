@extends('layouts.app')

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
                    <a class="tree-controls__button -new btn btn-primary btn-sm" href="{{route('profile.create')}}">+ Добавить профиль</a>
                </div>
            </div>
            <div id="tree">   </div>
        </div>



    <script type="text/javascript" src="{{asset('js/familytree.js')}}"></script>


