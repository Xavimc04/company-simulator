@extends('web.layouts.sidebar')

@section('body')
    <main class="w-full p-10">
        <section class="flex flex-col gap-1">
            <h2 class="text-2xl font-extrabold text-blue-500">
                Productos
            </h2>

            <small>Previsualiza y gestiona todos los productos de tu empresa</small>
        </section>

        @livewire('sections.authorized.student.sells.products')
    </main>
@endsection