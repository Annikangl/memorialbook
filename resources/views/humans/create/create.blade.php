@extends('layouts.app')

@section('title') New profile @endsection

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

            <form action="{{ route('profile.human.store') }}" class="add-profile-wrap" id="add-profile"
                  method="POST" enctype="multipart/form-data">
                @csrf

                @include('includes.partials.message')

                @include('humans.create.create_step_1')

                @include('humans.create.create_step_2')

                @include('humans.create.create_step_3')

                <div class="buttons-save">
                    <input type="submit" class="save-draft hide btn white-btn" name="draft"
                           value="{{ __('create_profile.btn_saveAsDraft') }}">
                    <button type="button" class="save-and-next btn blue-btn">
                        {{ __('create_profile.btn_saveAndContinue') }}
                    </button>
                </div>
            </form>

            <p class="add-profile__text">{{ __('create_profile.subtitle') }}</p>

        </div>

    </section>

@endsection

@section('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtiW5uhL3BgojiJgqKk1eJuOKs4jAVFfU&libraries=places&callback=initMap">
    </script>
    <script src="{{ asset('js/jquery.fileuploader.min.js') }}"></script>
@endsection

