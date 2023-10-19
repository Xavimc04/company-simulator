@extends('web.layouts.main')

@section('content')
    <main 
        class="flex flex-col items-center justify-center h-screen w-screen bg-no-repeat bg-center bg-cover"
        style="background-image: url({{ URL::to('/') }}/assets/squares-wallpaper.png)"
    >
        <section class="w-[400px] flex flex-col gap-3 bg-white rounded">
            <h1 class="text-4xl font-extrabold">Registro de cuenta</h1>
            <p class="text-gray-400 mb-5">Complete todos los campos para confirmar el registro.</p>

            @livewire('sections.guest.auth.register-form')

            <small onclick="window.location.href = '/login'" class="w-full cursor-pointer text-end text-gray-500 transition-all">¿Ya tienes cuenta? Presiona aquí para iniciar sesión</small>
        </section>
    </main>
@endsection