<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> 
        <link rel="icon" type="image/x-icon" href="https://www.monlau.com/estudis-professionals/wp-content/uploads/sites/3/2020/07/monlau-fp-es.png">
        <title>Portal Empresarial</title>
        
        @vite(['resources/css/app.css', 'resources/js/app.js']) 
        @livewireStyles
    </head>

    <body class="h-screen w-screen">
        @yield('content')

        @livewireScripts
    </body>
</html>
