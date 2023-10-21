<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#10161F">
        <meta name="movileOptimized" content="width">
        <meta name="handhelFriendly" content="true">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <script href="{{asset('/js/app.js')}}" defer></script>
        {{--  @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}
        <link rel="manifest" href="{{asset('/manifest.json')}}">
        <script type="text/javascript" src="{{asset('/main.js')}}"></script>
        <script type="text/javascript" src="{{asset('/sw.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body>
        <div id=app>
            <main>
                @yield('content')
            </main>
        </div>
    </body>

</html>