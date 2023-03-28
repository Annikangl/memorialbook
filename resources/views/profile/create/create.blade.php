@extends('layouts.app')

@section('content')
    <section class="add-profile">

        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="#" class="breadcrumbs__link">Create profile</a>
            </li>
        </ul>

        <div class="add-profile-content">
            <div>
                <div>
                    <h3 class="add-profile-content__title">{{ __('create_profile.new_profile') }}</h3>
                    <ul class="steeps-nav">
                        <li class="steeps-nav__item active current">
                            <i class="steeps-nav__icon"></i>
                            <span class="steeps-nav__title">{{ __('create_profile.step_1') }}</span>
                            <p class="steeps-nav__desc">{{ __('create_profile.primary_information') }}</p>
                        </li>
                        <li class="steeps-nav__item">
                            <i class="steeps-nav__icon"></i>
                            <span class="steeps-nav__title">{{ __('create_profile.step_2') }}</span>
                            <p class="steeps-nav__desc">{{ __('create_profile.description') }}</p>
                        </li>
                        <li class="steeps-nav__item">
                            <i class="steeps-nav__icon"></i>
                            <span class="steeps-nav__title">{{ __('create_profile.step_3') }}</span>
                            <p class="steeps-nav__desc">{{ __('create_profile.posting') }}</p>
                        </li>
                    </ul>
                </div>
            </div>

            <form class="add-profile-wrap" id="add-profile" method="POST" enctype="multipart/form-data"
                  action="{{ route('profile.store' )}}">
                @csrf

                @include('profile.create.create_step_1')

                @include('profile.create.create_step_2')

                @include('profile.create.create_step_3')

                <div class="buttons-save">
                    <button type="button"
                            class="save-draft hide btn white-btn">{{ __('create_profile.btn_saveAsDraft') }}</button>
                    <button type="button"
                            class="save-and-next btn blue-btn">{{ __('create_profile.btn_saveAndContinue') }}</button>

                    <button type="submit"
                            class="save-end hide btn blue-btn">{{ __('create_profile.btn_saveAndPost') }}</button>
                </div>

            </form>
            <p class="add-profile__text">{{ __('create_profile.subtitle') }}</p>
        </div>

        <x-modal id="burial_place_location" class="inner_map" long="hystmodal__window--long">
            <div class="input-wrap" style="margin: 0 0 10px 0;">
                <div class="input-form">
                    <input type="text" class="input-text" id="burial_place_search"
                           name="burial_place_search"
                           placeholder="{{ __('create_profile.choose_from_map') }}"
                           title="{{ __('create_profile.choose_from_map') }}">
                </div>

            </div>
            <div class="map" style="min-height: 550px">

            </div>
        </x-modal>

    </section>

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.fileuploader.min.js') }}"></script>
@endsection

