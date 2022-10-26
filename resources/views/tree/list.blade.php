@extends('layouts.app')
@section('content')

        <div class="tree">
            <div class="container">
                <div class="tree__inner">
                    <div class="tree__nav">
                        <div class="tree-nav__items">
                            <div class="tree-nav__item">
                                <a class="tree-nav__link" href="{{route('tree')}}">Семейное древо</a>
                            </div>
                            <div class="tree-nav__item">
                                <a class="tree-nav__link active" href="../tree-list">Список профилей</a>
                            </div>
                        </div>
                    </div>
                    <div class="tree__controls">
                        <a class="tree-controls__button -new btn btn-primary btn-sm" href="{{route('profile.create')}}">+ Добавить профиль</a>
                    </div>
                    <div class="tree__list">
                        <div class="tree-list__inner">

                            @foreach($profiles as $profile)

                            <div class="tree-list__item">
                                <a class="tree-list-item__avatar" href="../member-card">

                                    <img class="tree-list-item-avatar__image" src="{{ asset('storage/'. $profile->avatar) }}" alt="" style="height: 60px">

{{--                                    @foreach($medias as $media)--}}
{{--                                    <img class="tree-list-item-avatar__image" src="{{$media->getUrl('thumb')}}" alt="">--}}
{{--                                    @endforeach--}}
                                </a>
                                <div class="tree-list-item__info">
                                    <div class="tree-list-item-info__row row">
                                        <div class="tree-list-item-info__side -content">
                                            <div class="tree-list-item__title">{{$profile->first_name.' '.$profile->patronymic.' '.$profile->last_name}}</div>
                                            <div class="tree-list-item__text">{{ \Carbon\Carbon::parse($profile->date_birth)->format('Y').' - '.\Carbon\Carbon::parse($profile->date_death)->format('Y')}}</div>
                                        </div>
                                        <div class="tree-list-item-info__side -status">
                                            <div class="tree-list-item__title -error">{{$profile->status}}</div>
                                            <div class="tree-list-item__text -grey">{{$profile->updated_at}}</div>
                                        </div>
                                    </div>
                                </div>
                                <a class="tree-list-item__edit-link" href="../profile-add-member">
                                    <svg style="width: 17px; height: 17px;" aria-hidden="true">
                                        <use xlink:href="../assets/media/sprite.svg?1644862966822#sprite-pencil"></use>
                                    </svg>
                                </a>
                            </div>
                            @endforeach
                            </div>
                        {{ $profiles->links('tree.partials.pagination', ['paginator' => $profiles]) }}
                        </div>

                    </div>
                </div>
            </div>

@endsection
