@extends('web.layouts.sidebar')

@section('body')
    <main class="w-full p-10">
        <section class="flex flex-col gap-1">
            <h2 class="text-2xl font-extrabold text-blue-500">
                Centros educativos
            </h2>

            <small>Gestiona de manera integral todos los centros educativos</small>
        </section>

        @livewire('sections.authorized.admin.centers')
    </main>
@endsection