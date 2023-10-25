@extends('web.layouts.main')

@section('content')
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
            [ "prefix" => "admin", "role" => "Administrador", "icon" => "qr_code", "label" => "Códigos de verificación", "route" => "usuarios" ],
            [ "prefix" => "admin", "role" => "Administrador", "icon" => "other_admission", "label" => "Solicitudes pendientes", "route" => "solicitudes" ],
        ]
    ?>

    <main class="flex h-screen w-full">
        <aside class="w-[250px] border-r flex flex-col transition-all">
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
                <div onclick="window.location.href = '/logout'" class="p-5 border-t mx-3 flex items-center gap-3 hover:text-blue-500 transition-all cursor-pointer">
                    <span class="material-symbols-outlined">logout</span>
                    
                    {{ Auth::user()->name }}
                </div>
            @endif
        </aside>

        <section class="flex-1 overflow-y-scroll">
            @yield('body')
        </section>
    </main>
@endsection