@extends('web.layouts.main')

@section('content')
    <main class="flex flex-col lg:flex-row h-screen w-full">
        <x-sidebar-component />

        <section class="flex-1 overflow-y-scroll">
            @yield('body')
        </section>
    </main>
@endsection