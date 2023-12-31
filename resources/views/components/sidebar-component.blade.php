<?php 
    $elements = [
        // @ Teacher
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "dashboard", "label" => "Panel", "route" => "dashboard" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "person", "label" => "Gestión de usuarios", "route" => "users" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "link", "label" => "Códigos de invitación", "route" => "invites" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "point_of_sale", "label" => "Mayoristas", "route" => "wholesalers" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "captive_portal", "label" => "Empresas", "route" => "companies" ],

        // @ Administrator
        [ "prefix" => "admin", "role" => "Administrador", "icon" => "dashboard", "label" => "Panel", "route" => "dashboard" ],
        [ "prefix" => "admin", "role" => "Administrador", "icon" => "school", "label" => "Centros educativos", "route" => "centers" ],
        [ "prefix" => "admin", "role" => "Administrador", "icon" => "person", "label" => "Gestión de usuarios", "route" => "users" ],
        [ "prefix" => "admin", "role" => "Administrador", "icon" => "campaign", "label" => "Comunicados", "route" => "announcements" ],
        [ "prefix" => "admin", "role" => "Administrador", "icon" => "folder", "label" => "Documentación", "route" => "documentation" ],

        // @ Student
        [ "prefix" => "student", "role" => "Estudiante", "icon" => "dashboard", "label" => "Panel", "route" => "dashboard" ],
    ]
?>

<nav class="flex items-center justify-end lg:hidden border-b p-4">
    <button onclick="toggle()" class="flex items-center justify-center">
        <x-icon label="menu" styles="cursor-pointer hover:text-blue-500 transition-all" />
    </button>
</nav>

<aside class="w-[250px] border-r hidden lg:flex flex-col transition-all bg-white">
    <div class="flex w-full items-end justify-end">
        <button onclick="toggle()" id="close" class="flex lg:hidden items-center justify-center px-3 pt-5">
            <x-icon label="close" styles="cursor-pointer hover:text-blue-500 transition-all" />
        </button>
    </div>

    <section class="flex-1 overflow-y-scroll my-5 flex flex-col px-3 gap-3">
        @if (Auth::user()->role && Auth::user()->role->name == "Estudiante")
            @livewire('sections.authorized.student.company-selector')
        @endif

        @foreach ($elements as $element)
            @if (Auth::user()->role && Auth::user()->role->name == $element['role'])
                <div onclick="window.location.href = '/{{ $element['prefix'] }}/{{ $element['route'] }}'" class="flex items-center gap-3 text-sm rounded px-3 py-2 group cursor-pointer hover:bg-blue-500 hover:text-white transition-all">
                    <span class="material-symbols-outlined text-blue-500 group-hover:text-white transition-all">{{ $element['icon'] }}</span>

                    {{ $element['label'] }}
                </div>
            @endif
        @endforeach
    </section>

    @if (Auth::user())  
        <div class="p-5 border-t mx-3 flex justify-between items-center gap-3 cursor-pointer">
            <p onclick="window.location.href = '/profile'" class="hover:text-blue-500 transition-all">
                {{ Auth::user()->name }}
            </p>

            <span onclick="window.location.href = '/logout'" class="material-symbols-outlined hover:text-red-500 transition-all">logout</span>
        </div> 
    @endif
</aside>

<script>
    const toggle = () => {
        let screenWidth = window.innerWidth; 
        
        if(screenWidth < 1024) {
            let sidebar = document.querySelector('aside');

            if(sidebar.classList.contains('hidden')) {
                sidebar.classList = 'border-r flex flex-col transition-all fixed bg-white h-screen w-screen z-50';
                document.getElementById('close').classList = 'flex items-center justify-center px-3 pt-5';
            } else {
                sidebar.classList = 'hidden w-[250px] border-r flex flex-col transition-all';
                document.getElementById('close').classList = 'hidden';
            }
        }
    }

    window.addEventListener('resize', () => {
        screenWidth = window.innerWidth;

        if(screenWidth >= 1024) {
            document.querySelector('aside').classList = 'w-[250px] border-r hidden lg:flex flex-col transition-all bg-white';
            document.getElementById('close').classList = 'hidden';
        }
    });
</script>