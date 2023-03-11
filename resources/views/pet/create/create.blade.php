@extends('layouts.app')

@section('content')
    <section class="add-profile">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="" class="breadcrumbs__link">New profile</a>
            </li>
        </ul>

        <div class="add-profile-content">
            <div>
                <h3 class="add-profile-content__title">{{ __('create-pet.new_profile') }}</h3>
                <ul class="steeps-nav">
                    <li class="steeps-nav__item active current">
                        <i class="steeps-nav__icon"></i>
                        <span class="steeps-nav__title">{{ __('create-pet.step_1') }}</span>
                        <p class="steeps-nav__desc">{{ __('create-pet.primary_information') }}</p>
                    </li>
                    <li class="steeps-nav__item">
                        <i class="steeps-nav__icon"></i>
                        <span class="steeps-nav__title">{{ __('create-pet.step_3') }}</span>
                        <p class="steeps-nav__desc">{{ __('create-pet.description') }}</p>
                    </li>
                    <li class="steeps-nav__item">
                        <i class="steeps-nav__icon"></i>
                        <span class="steeps-nav__title">{{ __('create-pet.step_3') }}</span>
                        <p class="steeps-nav__desc">{{ __('create-pet.posting') }}</p>
                    </li>
                </ul>
            </div>
            <form class="add-cemetery-wrap"
                  method="post"
                  id="add-cemetery"
                  action="{{ route('profile.pet.store') }}"
                  enctype="multipart/form-data">

                @csrf

                @include('pet.create.create_step_1')
                @include('pet.create.create_step_2')
                @include('pet.create.create_step_3')

                <div class="buttons-save">
                    <button type="button" class="save-draft hide btn white-btn">{{ __('create-pet.btn_saveAsDraft') }}</button>
                    <button type="button" class="save-and-next btn blue-btn">{{ __('create-pet.btn_saveAndContinue') }}</button>

                    <button type="submit" class="save-end hide btn blue-btn">{{ __('create-pet.btn_saveAndPost') }}</button>
                </div>

            </form>
            <p class="add-profile__text">{{ __('create-pet.subtitle') }}</p>
        </div>
    </section>
@endsection

