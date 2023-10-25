@extends('web.layouts.sidebar')

@section('body')
    <main class="w-full p-10">
        <section class="flex flex-col gap-1">
            <h2 class="text-2xl font-extrabold text-blue-500">
                Gestión de Usuarios
            </h2>

            <small>Gestiona de manera integral todos los usuarios de tu aplicativo</small>
        </section>

        @livewire('sections.authorized.teacher.users')
    </main>
@endsection