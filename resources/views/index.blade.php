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
    @include('layouts.menu.sidebar')

    <div id="main">
     <main class="py-4">
        <div id="app">
            <products></products>
        </div>
    </main>
</div>
<script src="{{ asset('js/app.js')}} "></script>
<script src="{{ asset('js/sidebar.js')}} "></script>
</body>
</html>
