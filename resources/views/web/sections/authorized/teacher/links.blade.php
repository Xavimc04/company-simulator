@extends('web.layouts.sidebar')

@section('body')
    <main class="w-full p-10">
        <section class="flex flex-col gap-1">
            <h2 class="text-2xl font-extrabold text-blue-500">
                Invitaciones
            </h2>

            <small>Enlaces de invitación</small>
        </section>

        @livewire('sections.authorized.teacher.invites')
    </main>
@endsection