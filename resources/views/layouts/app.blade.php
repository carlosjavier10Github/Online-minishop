<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{--  <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sidebar.css') }} ">


</head>
<body>
    @include('layouts.menu.topbar')

    @yield('content')

    <script src="{{ asset('js/app.js')}} "></script>
    <script src="{{ asset('js/sidebar.js')}} "></script>
</body>
</html>