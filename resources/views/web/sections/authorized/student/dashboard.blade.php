@extends('web.layouts.sidebar')

@section('body')
    <main class="w-full p-10 flex gap-10 flex-col overflow-y-scroll">
        <div 
            class="h-[100px] rounded w-full" 
            style="background-image: url(https://www.monlau.com/estudis-professionals/wp-content/uploads/sites/3/2020/02/recepci%C3%B3-1.jpg)"
        ></div>
        
        @livewire('sections.authorized.dashboard')
    </main>
@endsection