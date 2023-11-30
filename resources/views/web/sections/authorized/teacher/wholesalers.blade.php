@extends('web.layouts.sidebar')

@section('body')
    <main class="w-full p-10">
        <section class="flex flex-col gap-1">
            <h2 class="text-2xl font-extrabold text-blue-500">
                Mayoristas
            </h2>

            <small>Todos los mayoristas gestionados por este centro.</small>
        </section>

        @livewire('sections.authorized.teacher.wholesalers')
    </main>
@endsection