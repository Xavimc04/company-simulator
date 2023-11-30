@extends('web.layouts.sidebar')

@section('body')
    <main class="w-full p-10">
        <section class="flex flex-col gap-1">
            <h2 class="text-2xl font-extrabold text-blue-500">
                Comunicados
            </h2>

            <small>Genera y programa nuevos comunicados oficiales</small>
        </section>

        @livewire('sections.authorized.admin.announcements')
    </main>
@endsection