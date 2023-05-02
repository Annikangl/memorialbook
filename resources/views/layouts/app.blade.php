<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ffffff">
    <!-- use latest version of IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- seo -->
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!-- document Favicon in browser tabs -->
    <link rel="shortcut icon" href="{{ asset('assets/media/media/icons/favicon.ico') }}" type="image/x-icon">
    <!-- additional approach to add favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/site.webmanifest') }}">
    <link rel="mask-icon" href={{ asset('assets/img/favicons/safari-pinned-tab.svg') }} color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Memorialbook')</title>
    <!-- Scripts and styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<div id="page">
    @include('layouts.header')

    <main class="content" role="main">
        @yield('content')
    </main>

    @include('layouts.footer')
</div>

<div class="preview-modal" id="modal-from">
    <div class="aside-form" id="form-aside">
        <button type="button" class="close-registration" id="close-aside"></button>

        @yield('preview-modals')

        @include('includes.forms.filter_people')
        @include('includes.forms.filter_places')

    </div>
    @include('includes.forms.invite')
</div>

<script data-skip-moving="true">
    window.app = window.app || {};
    window.app.globalConfig = {
        baseUrl: `{{ config('app.url') }}`,
        assetsPath: '{{ asset('assets//') }}',
        gmapsApikey: '{{ config('google-services.services.gmaps.api_key') }}',
        relPath: './',
    };
</script>

<script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>

@yield('scripts')

</body>
</html>
