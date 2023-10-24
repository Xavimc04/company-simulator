<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> 
        <link rel="icon" type="image/x-icon" href="https://img.freepik.com/premium-psd/company-3d-render-icon-illustration_726846-4541.jpg">
        <title>Portal Empresarial</title>
        
        @vite(['resources/css/app.css', 'resources/js/app.js']) 
        @livewireStyles
    </head>

    <body class="h-screen w-screen">
        @yield('content')

        @livewireScripts
    </body>
</html>
