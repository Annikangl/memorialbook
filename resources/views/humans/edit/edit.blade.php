@extends('layouts.app')

@section('title')
    {{ __('edit-profile.Edit profile') }}
@endsection

@section('content')
    <section class="add-profile">
        <div id="page">

            <section class="add-profile">
                <ul class="breadcrumbs">
                    <li class="breadcrumbs__item">
                        <a href="{{ route('home') }}" class="breadcrumbs__link">Home</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <a href="" class="breadcrumbs__link">{{ __('edit-profile.Edit profile') }}</a>
                    </li>
                </ul>
                <div class="add-profile-content">
                    <div>
                        <div>
                            <h3 class="add-profile-content__title">{{ __('edit-profile.Edit profile') }}</h3>
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

                    <form method="POST" action="{{ route('profile.human.update', $human) }}"
                          class="add-profile-wrap" id="add-profile" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @include('humans.edit.edit_step_1')

                        @include('humans.edit.edit_step_2')

                        @include('humans.edit.edit_step_3')

                        <div class="buttons-save">
                            <input type="submit" class="save-draft hide btn white-btn" name="draft"
                                   value="{{ __('edit-profile.Save as draft') }}">
                            <button type="button" class="save-and-next btn blue-btn">
                                {{ __('edit-profile.Save and continue') }}
                            </button>
                        </div>

                    </form>
                    <p class="add-profile__text">{{ __('edit-profile.Let us create and store history together') }}</p>
                </div>

            </section>
        </div>
    </section>
@endsection

@section('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtiW5uhL3BgojiJgqKk1eJuOKs4jAVFfU&libraries=places&callback=initMap">
    </script>
    <script src="{{ asset('js/jquery.fileuploader.min.js') }}"></script>
@endsection

