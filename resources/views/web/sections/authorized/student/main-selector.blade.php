@extends('web.layouts.main')

@section('content')
    @php
        use App\Models\Company;
    @endphp

    <main 
        class="flex flex-col items-center justify-center h-screen w-screen bg-no-repeat bg-center bg-cover"
        style="background-image: url({{ URL::to('/') }}/assets/squares-wallpaper.png)"
    >
        <section class="w-[400px] flex flex-col gap-1">
            <h2 class="text-2xl">
                Bienvenido, <span class="text-blue-500">{{ Auth::user()->name }}</span>
            </h2>

            <p class="text-sm text-gray-500">
                Selecciona la empresa con la que deseas trabajar
            </p>

            <div class="border flex flex-col rounded mt-10 divide-y divide-solid">
                @foreach (Auth::user()->companies as $option)
                    <div onclick="window.location.href = '/student/{{ str_replace(' ', '-', $option->company->name) }}/dashboard'" class="px-5 py-4 text-md flex select-none group hover:bg-blue-500 cursor-pointer hover:text-white transition-all flex-col">
                        {{ $option->company->name }}
    
                        <small class="text-blue-500 group-hover:text-black transition-all">
                            {{ $option->company->social_denomination }}
                        </small>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection