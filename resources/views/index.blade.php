<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }} ">
    </head>
    <body>

        @include('layouts.menu.topbar')

        <div id="app">
            <products></products>

        </div>

        <script src="{{ asset('js/app.js')}} "></script>
    </body>
</html>
