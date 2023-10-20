@extends('web.layouts.main')

@section('content')
    <main class="flex h-screen w-full">
        <aside class="w-[250px] border-r">
            Holaa
        </aside>

        <section class="flex-1 overflow-y-scroll">
            @yield('body')
        </section>
    </main>
@endsection