@extends('web.layouts.main')

@section('content')
    <main class="bg-gray-100 w-screen h-screen flex flex-col">
        <nav class="bg-white p-5 flex flex-wrap shadow-sm items-center gap-4"> 
            <h1 class="font-extrabold leading-none tracking-tight text-black border-r pr-5">
                Monlau
                
                <span class="underline underline-offset-2 decoration-4 decoration-blue-400">Market</span>
            </h1>

            <ul class="flex gap-4 flex-1 select-none">
                <li class="cursor-pointer hover:text-blue-500 transition-all" onclick="window.location.href = '/market'">Inicio</li>
                <li class="cursor-pointer hover:text-blue-500 transition-all">Mi empresa</li> 
            </ul>

            <p>
                Bienvenido, <span onclick="window.location.href = '/profile'" class="text-blue-500 cursor-pointer select-none hover:text-blue-700">{{ auth()->user()->name }}</span>
            </p>

            @livewire('sections.authorized.market.navigator-cart-counter')
        </nav>

        @yield('market')
    </main>
@endsection