@extends('web.layouts.sidebar')

@section('body')
    <main class="w-full p-10">
        <section class="flex flex-col gap-1">
            <h2 class="text-2xl font-extrabold text-blue-500">
                Mis empresas
            </h2>

            <small>Gestiona todas las empresas registradas por el centro</small>
        </section>

        @livewire('sections.authorized.teacher.companies')
    </main>
@endsection