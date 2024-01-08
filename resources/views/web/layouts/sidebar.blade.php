@extends('web.layouts.main')

@section('content')
    <main class="flex flex-col lg:flex-row h-screen w-full">
        @isset($company) 
            <x-sidebar-component :company="$company" />
        @else
            <x-sidebar-component />
        @endisset

        <section class="flex-1 overflow-y-scroll">
            @yield('body')
        </section>
    </main>
@endsection