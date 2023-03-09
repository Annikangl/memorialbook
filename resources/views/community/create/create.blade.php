@extends('layouts.app')

@section('content')
    <section class="add-profile">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="#" class="breadcrumbs__link">Новое сообщество</a>
            </li>
        </ul>

        <div class="add-profile-content">
            <div>
                <h3 class="add-profile-content__title">{{ __('create_community.new_community') }}</h3>
                <ul class="steeps-nav">
                    <li class="steeps-nav__item active current">
                        <i class="steeps-nav__icon"></i>
                        <span class="steeps-nav__title">{{ __('create_community.step_1') }}</span>
                        <p class="steeps-nav__desc">{{ __('create_community.primary_information') }}</p>
                    </li>
                    <li class="steeps-nav__item">
                        <i class="steeps-nav__icon"></i>
                        <span class="steeps-nav__title">{{ __('create_community.step_2') }}</span>
                        <p class="steeps-nav__desc">{{ __('create_community.description') }}</p>
                    </li>
                    <li class="steeps-nav__item">
                        <i class="steeps-nav__icon"></i>
                        <span class="steeps-nav__title">{{ __('create_community.step_3') }}</span>
                        <p class="steeps-nav__desc">{{ __('create_community.posting') }}</p>
                    </li>
                </ul>
            </div>
            <form class="add-cemetery-wrap"
                  id="add-community"
                  action="{{ route('community.store') }}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf

                @include('community.create.create_step_1')
                @include('community.create.create_step_2')
                @include('community.create.create_step_3')

                <div class="buttons-save">
                    <button type="button" class="save-draft hide btn white-btn">{{ __('create_community.btn_saveAsDraft') }}</button>
                    <button type="button" class="save-and-next btn blue-btn">{{ __('create_community.btn_saveAndContinue') }}</button>

                    <button type="submit" class="save-end hide btn blue-btn">{{ __('create_community.posting') }}</button>
                </div>

            </form>
            <p class="add-profile__text">{{ __('create_community.subtitle') }}</p>
        </div>
    </section>

    <x-modal id="community_address_location" class="inner_map" long="hystmodal__window--long">
        <div class="input-wrap" style="margin: 0 0 10px 0;">
            <div class="input-form" >
                <input type="text" class="input-text" id="community_address-search"
                       name="community_address"
                       placeholder="{{ __('create_community.choose_from_map') }}"
                       title="{{ __('create_community.choose_from_map') }}">
            </div>

        </div>
        <div class="map" style="min-height: 550px" >

        </div>
    </x-modal>
@endsection

