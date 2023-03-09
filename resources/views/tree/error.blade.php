@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="tree__inner" @isset($profiles) style="margin-top: 100px !important;" @endif>
            <div class="tree__nav">
                <div class="tree-nav__items">
                    <div class="tree-nav__item">
                        <a class="tree-nav__link active" href="{{ route('tree') }}">{{__('family_tree.link_family_tree')}}</a>
                    </div>
                    <div class="tree-nav__item">
                        <a class="tree-nav__link" href="#">{{__('family_tree.link_profile_list')}}</a>
                    </div>
                </div>
            </div>
            <div class="tree__controls">
                <a class="tree-controls__button btn blue-btn" href="{{ route('profile.create') }}">+
                    {{ __('family_tree.btn_create_profile') }}
                </a>
            </div>
        </div>
        <div class="container-tree">
            <div id="tree">

            </div>
        </div>

    </div>

{{--        <div class="container">--}}
{{--            <div class="tree__inner" style="margin-top: 100px !important;">--}}
{{--                <div class="tree__nav">--}}
{{--                    <div class="tree-nav__items">--}}
{{--                        <div class="tree-nav__item">--}}
{{--                            <a class="tree-nav__link active" href="{{ route('tree') }}">{{__('family_tree.link_family_tree')}}</a>--}}
{{--                        </div>--}}
{{--                        <div class="tree-nav__item">--}}
{{--                            <a class="tree-nav__link" href="#">{{__('family_tree.link_profile_list')}}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="tree__controls">--}}
{{--                    <a class="tree-controls__button btn blue-btn" href="{{ route('profile.create') }}">+--}}
{{--                        {{ __('family_tree.btn_create_profile') }}--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="tree__content">--}}
{{--                <div class="profile-empty">--}}
{{--                    <div class="profile-empty__inner">--}}
{{--                        <div class="profile-empty__title">{{__('family_tree.no_profiles')}}</div>--}}
{{--                        <div class="profile-empty__text">Возможно кладбище уже добавило информацию и вы можете--}}
{{--                            <a href="#slideout-people" data-slideout=""--}}
{{--                               data-slideout-options="{&quot;type&quot;:&quot;people&quot;,&quot;position&quot;:&quot;top&quot;}">--}}
{{--                                найти их на карте</a>.--}}
{{--                            <br>Если нет, просто <a href="{{route('profile.create')}}"> создайте новый профиль</a>.--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>


@endsection

@section('scripts')
    <script>
        window.treeContent = []
    </script>
@endsection
