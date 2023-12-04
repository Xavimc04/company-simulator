@extends('web.layouts.main')

@php
    use App\Models\Company;
    use App\Models\User;
    use App\Models\Center;
@endphp

@section('content')
    {{-- @ Header --}}
    <section class="flex h-auto min-h-screen flex-col items-center bg-blue-950 relative">
        {{-- @ Square --}}
        <div class="opacity-0 xl:opacity-100 transition-all bg-[url('https://www.monlau.com/estudis-professionals/wp-content/uploads/sites/3/2020/02/recepci%C3%B3-1.jpg')] clip-diagonal absolute bottom-0 right-0 h-[100%] w-[1300px] movement-wallpaper"></div>

        {{-- @ Navigator --}}
        <nav class="py-5 w-full px-5 flex flex-col md:flex-row items-center justify-between" style="z-index: 10">
            {{-- @ Title --}}
            <section class="flex items-center gap-3 w-full md:w-auto">
                <img 
                    class="w-[40px] h-[40px] rounded-md border border-white"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRv1QylzaMIbuXsLpgaXjJ0BqwCUx0t83cKue2UTN48vV3KqRCsD05x88NTuWBFsnB2gjk&usqp=CAU"
                />
                
                <div class="flex flex-col">
                    <h2 class="text-white">
                        Portal Empresarial
                    </h2>

                    <small class="text-gray-300">
                        By Monlau Group
                    </small>
                </div>
            </section>

            {{-- @ Auth --}}
            <section class="flex items-center gap-5 text-white flex-col md:flex-row mt-7 md:mt-0 w-full md:w-auto">
                @if (Auth::check())
                    <div class="hidden md:flex items-center gap-5 select-none cursor-pointer">
                        <p class="opacity-0 md:opacity-100 transition-all">
                            {{ Auth::user()->name }}
                        </p>
    
                        @if (Auth::user()->profile_url)
                            <img draggable="false" class="w-[35px] rounded-full h-[35px]" src="{{ asset('storage/profile-pictures/' . Auth::user()->profile_url) }}" />
                        @endif
                    </div>
                @else 
                    <button onclick="window.location.href = '/login'" class="text-white w-full text-left">
                        Iniciar sesión
                    </button>

                    <button onclick="window.location.href = '/register'" class="border border-white text-white rounded-md px-5 py-2 w-full text-left">
                        Registrarse
                    </button>
                @endif
            </section>
        </nav>

        {{-- @ Header Content --}}
        <section class="w-full 2xl:w-[80%] flex-1 flex flex-col 2xl:flex-row items-center justify-between" style="z-index: 10">
            {{-- @ Information --}}
            <div class="px-5 lg:px-0 my-20 w-3/4 2xl:w-1/4 flex flex-col text-center items-center xl:text-left xl:items-start transition-all">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl">
                    Portal
                    
                    <span class="underline underline-offset-3 decoration-8 decoration-blue-400">Empresarial</span>
                </h1>
    
                <p class="text-lg font-normal text-white lg:text-xl mt-7">Gestiona de manera integral todas las empresas ficticias para que tus alumnos puedan aprender todo sobre el Marketing, contacta con otros centros a través de las diferentes opciones y vive la experiencia.</p>
            
                <button class="border border-blue-400 text-blue-400 flex items-center gap-3 px-7 py-3 mt-7 rounded-full">
                    <span class="material-symbols-outlined">
                        call
                    </span>

                    Contáctanos
                </button>
            </div>

            {{-- @ Image --}}
            <img  
                class="hidden md:block w-3/4 mb-10 xl:w-[900px] xl:h-[600px] rounded-md transition-all"
                src="{{ URL::to('/') }}/assets/profile-screenshot.png"
            />

            <img  
                class="block md:hidden w-3/4 mb-10 rounded-md transition-all"
                src="{{ URL::to('/') }}/assets/mobile-dashboard-screenshot.PNG"
            />
        </section>
    </section>

    {{-- @ Counters --}}
    <section class="w-full flex flex-col lg:flex-row items-center justify-center gap-20 mt-10">
        <img 
            draggable="false"
            src="https://www.pngall.com/wp-content/uploads/5/Digital-Marketing-PNG-Transparent-HD-Photo.png"
        />

        <div class="flex items-center flex-wrap w-[90%] lg:w-[450px]">
            <section>
                <h2 class="text-4xl font-extrabold">¡Únete a nosotros!</h2>
                <p class="my-4 text-lg text-gray-500">Ofrecemos una plataforma integral diseñada para emular y gestionar empresas, brindando una experiencia realista para estudiantes, profesores y entusiastas del mundo empresarial. Nuestra aplicación está diseñada para proporcionar un entorno educativo interactivo y práctico, permitiéndote explorar y aplicar conceptos empresariales de manera efectiva.</p>
            </section>

            <div class="border-r px-10 mt-10">
                <h2 class="text-4xl font-extrabold text-blue-500">
                    {{ Company::count() }}+
                </h2>
    
                <small>Empresas ficticias</small>
            </div>
    
            <div class="border-r px-10 mt-10">
                <h2 class="text-4xl font-extrabold text-blue-500">
                    {{ User::count() }}+
                </h2>
    
                <small>Alumnos</small>
            </div>
    
            <div class="px-10 mt-10">
                <h2 class="text-4xl font-extrabold text-blue-500">
                    {{ Center::count() }}+
                </h2>
    
                <small>Centros</small>
            </div>
        </div> 
    </section>

    {{-- @ Footer --}}
    <footer class="w-full border-t text-center py-5 mt-10">
        Portal Empresarial &copy; {{ date('Y') }} - By Monlau Group
    </footer>
@endsection