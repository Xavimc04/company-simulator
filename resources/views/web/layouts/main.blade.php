<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> 
        <title>{{ env('APP_NAME') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js']) 

        @livewireStyles
    </head>

    <body>
        @yield('content')

        @livewireScripts
    </body>
</html>
