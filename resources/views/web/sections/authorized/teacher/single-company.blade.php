@extends('web.layouts.sidebar')

@section('body')
    <main class="w-full p-10">
        <section class="flex flex-col gap-1">
            <h2 class="text-2xl font-extrabold text-blue-500">
                {{ $company->name }}
            </h2>

            <small>Interactua de manera directa con la empresa {{ $company->social_denomination }}</small>
        </section>

        @livewire('sections.authorized.teacher.single-company', [
            'company' => $company
        ])
    </main>
@endsection