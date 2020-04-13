<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Seersol Quiz') }}</title>
    <!-- Styles -->
    <link href="{{ asset('assets/css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="main-panel" >
        @include('layouts.partials.header')

        <div class="content" style="padding: 0 !important; padding-top: 100px !important;">
            @yield('content')
        </div>
        @include('layouts.partials.footer')
    </div>
</div>


    <script src="{{ asset('assets/js/vendor.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
</body>
</html>
