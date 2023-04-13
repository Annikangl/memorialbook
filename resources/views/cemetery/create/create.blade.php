@extends('layouts.app')

@section('title')
    Новое кладбище
@endsection

@section('content')

    <style>

        .fileuploader {
            max-width: 560px;
        }
    </style>
    <section class="add-profile">

        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="#" class="breadcrumbs__link">New cemetery</a>
            </li>
        </ul>

        <div class="add-profile-content">
            <div>
                <h3 class="add-profile-content__title">{{ __('create_cemetery.new_cemetery') }}</h3>
                <ul class="steeps-nav">
                    <li class="steeps-nav__item active current">
                        <i class="steeps-nav__icon"></i>
                        <span class="steeps-nav__title">{{ __('create_cemetery.step_1') }}</span>
                        <p class="steeps-nav__desc">{{ __('create_cemetery.primary_information') }}</p>
                    </li>
                    <li class="steeps-nav__item">
                        <i class="steeps-nav__icon"></i>
                        <span class="steeps-nav__title">{{ __('create_cemetery.step_2') }}</span>
                        <p class="steeps-nav__desc">{{ __('create_cemetery.description') }}</p>
                    </li>
                    <li class="steeps-nav__item">
                        <i class="steeps-nav__icon"></i>
                        <span class="steeps-nav__title">{{ __('create_cemetery.step_3') }}</span>
                        <p class="steeps-nav__desc">{{ __('create_cemetery.posting') }}</p>
                    </li>
                </ul>
            </div>

            <form class="add-cemetery-wrap" id="add-cemetery"
                  method="post"
                  action="{{ route('cemetery.store') }}"
                  enctype="multipart/form-data">
                @csrf

                @include('includes.partials.message')

                @include('cemetery.create.create_step_1')
                @include('cemetery.create.create_step_2')
                @include('cemetery.create.create_step_3')

                <div class="buttons-save">
                    <input type="submit"
                           class="save-draft hide btn white-btn"
                           name="draft"
                           value="{{ __('create_cemetery.btn_saveAsDraft') }}">

                    <button type="button"
                            class="save-and-next btn blue-btn">
                        {{ __('create_cemetery.btn_saveAndContinue') }}
                    </button>

                    <input type="submit"
                           class="save-end hide btn blue-btn"
                           name="posting"
                           value="{{ __('create_cemetery.posting') }}">
                </div>

            </form>
            <p class="add-profile__text">{{ __('create_cemetery.subtitle') }}</p>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.fileuploader.min.js') }}"></script>

@endsection
