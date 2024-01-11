@extends('web.layouts.main')

@section('content')
    <main 
        class="flex flex-col items-center justify-center h-screen w-screen bg-no-repeat bg-center bg-cover"
        style="background-image: url({{ URL::to('/') }}/assets/squares-wallpaper.png)"
    >
        <section class="w-[90%] md:w-[400px] flex flex-col gap-3 bg-white rounded">
            <h1 class="text-4xl font-extrabold">¿Contraseña perdida?</h1>
            <p class="text-gray-400 mb-5">Por favor, introduce la dirección de correo usada anteriormente para enviar un código de recuperación.</p>
        
            @livewire('sections.guest.auth.recover-form')

            <small class="w-full cursor-pointer text-end text-gray-500 transition-all">¿Te has acordado? 
                <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-600 transition-all">Inicia sesión</a>
            </small>
        </section>
    </main>
@endsection