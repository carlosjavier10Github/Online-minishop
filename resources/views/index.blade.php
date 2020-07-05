<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sidebar.css') }} ">


</head>
<body>

    @include('layouts.menu.topbar')

    <div id="app">

        <app></app>
 </div>
 <script src="{{ asset('js/app.js')}} "></script>
 <script src="{{ asset('js/sidebar.js')}} "></script>
</body>
</html>
