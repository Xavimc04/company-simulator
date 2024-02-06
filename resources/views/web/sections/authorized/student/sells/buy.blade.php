@extends('web.layouts.sidebar')

@section('body')
    <main class="w-full p-10">
        <section class="flex flex-col gap-1">
            <h2 class="text-2xl font-extrabold text-blue-500">
                Compras
            </h2>

            <small>Previsualiza todas las compras realizadas hasta el momento</small>
        </section>

        @livewire('sections.authorized.student.sells.buy')
    </main>
@endsection