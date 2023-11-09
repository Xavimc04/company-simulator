<?php 
    $elements = [
        // @ Teacher
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "dashboard", "label" => "Panel", "route" => "dashboard" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "person", "label" => "Gestión de usuarios", "route" => "usuarios" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "star", "label" => "Evaluación", "route" => "evaluacion" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "description", "label" => "Informes", "route" => "informes" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "mail", "label" => "Correo", "route" => "correo" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "folder_open", "label" => "Documentos", "route" => "documentos" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "perm_media", "label" => "Tareas", "route" => "tareas" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "dataset", "label" => "Ejercicios", "route" => "ejercicios" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "inventory_2", "label" => "Productos", "route" => "productos" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "location_on", "label" => "Circulares", "route" => "circulares" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "local_shipping", "label" => "Pedidos", "route" => "pedidos" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "sell", "label" => "Pedidos virtuales", "route" => "pedidos-virtuales" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "attach_money", "label" => "Finanzas", "route" => "finanzas" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "vpn_lock", "label" => "Organismos oficiales", "route" => "organismos-oficiales" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "hub", "label" => "Directorio de centros", "route" => "centros" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "schedule", "label" => "Horarios", "route" => "horarios" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "captive_portal", "label" => "Empresas", "route" => "empresas" ],
        [ "prefix" => "teacher", "role" => "Profesor", "icon" => "school", "label" => "Centro educativo", "route" => "centro-educativo" ],

        // Administrator
        [ "prefix" => "admin", "role" => "Administrador", "icon" => "dashboard", "label" => "Panel", "route" => "dashboard" ],
        [ "prefix" => "admin", "role" => "Administrador", "icon" => "school", "label" => "Centros educativos", "route" => "centros" ],
        [ "prefix" => "admin", "role" => "Administrador", "icon" => "person", "label" => "Gestión de usuarios", "route" => "usuarios" ],
    ]
?>

<nav class="flex items-center justify-end lg:hidden border-b p-4">
    <button onclick="toggle()" class="flex items-center justify-center">
        <x-icon label="menu" styles="cursor-pointer hover:text-blue-500 transition-all" />
    </button>
</nav>

<aside class="w-[250px] border-r hidden lg:flex flex-col transition-all bg-white">
    <div class="flex w-full items-end justify-end">
        <button onclick="toggle()" id="close" class="flex items-center justify-center px-3 pt-5">
            <x-icon label="close" styles="cursor-pointer hover:text-blue-500 transition-all" />
        </button>
    </div>

    <section class="flex-1 overflow-y-scroll my-5 flex flex-col px-3 gap-3">
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