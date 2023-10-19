@extends('web.layouts.main')

@section('content')
    <main class="flex flex-col items-center justify-center h-screen w-screen">
        <section class="w-[400px] flex flex-col gap-3">
            <h1 class="text-4xl font-extrabold">Iniciar sesión</h1>
            <p class="text-gray-400">Por favor, introduzca sus credenciales para iniciar sesión en la plataforma.</p>
        
            @livewire('sections.guest.auth.login-form')
        </section>
    </main>
@endsection