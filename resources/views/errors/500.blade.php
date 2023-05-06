@extends('layouts.app')

@section('content')
    <section class="page-not-found">
        <div class="page-not-found-wrap">
            <h2 class="page-not-found__title">Error 500</h2>
            <p class="page-not-found__text">Sorry, something went wrong</p>
            <a href="{{ route('home') }}" class="page-not-found__link">Go to home page</a>
        </div>
    </section>
@endsection
