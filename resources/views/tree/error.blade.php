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


@endsection

@section('scripts')
    <script>
        window.treeContent = []
    </script>
@endsection
