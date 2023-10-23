@extends('web.layouts.main')

@section('content')
    <?php 
        $elements = [
            [ "icon" => "dashboard", "label" => "Panel", "route" => "/dashboard" ],
            [ "icon" => "star", "label" => "Evaluación", "route" => "/evaluacion" ],
            [ "icon" => "description", "label" => "Informes", "route" => "/informes" ],
            [ "icon" => "mail", "label" => "Correo", "route" => "/correo" ],
            [ "icon" => "folder_open", "label" => "Documentos", "route" => "/documentos" ],
            [ "icon" => "perm_media", "label" => "Tareas", "route" => "/tareas" ],
            [ "icon" => "dataset", "label" => "Ejercicios", "route" => "/ejercicios" ],
            [ "icon" => "inventory_2", "label" => "Productos", "route" => "/productos" ],
            [ "icon" => "location_on", "label" => "Circulares", "route" => "/circulares" ],
            [ "icon" => "local_shipping", "label" => "Pedidos", "route" => "/pedidos" ],
            [ "icon" => "sell", "label" => "Pedidos virtuales", "route" => "/pedidos-virtuales" ],
            [ "icon" => "attach_money", "label" => "Finanzas", "route" => "/finanzas" ],
            [ "icon" => "vpn_lock", "label" => "Organismos oficiales", "route" => "/organismos-oficiales" ],
            [ "icon" => "hub", "label" => "Directorio de centros", "route" => "/centros" ],
            [ "icon" => "schedule", "label" => "Horarios", "route" => "/horarios" ],
            [ "icon" => "captive_portal", "label" => "Empresas", "route" => "/empresas" ],
            [ "icon" => "school", "label" => "Centro educativo", "route" => "/centro-educativo" ],
        ]
    ?>

    <main class="flex h-screen w-full">
        <aside class="w-[250px] border-r flex flex-col transition-all">
            <h2 class="flex items-center gap-3 py-7 px-3 font-extrabold text-xl">
                <span class="material-symbols-outlined">apartment</span>

                Portal Empresarial
            </h2>

            <section class="flex-1 overflow-y-scroll my-2 flex flex-col px-3 gap-3">
                @foreach ($elements as $element)
                    <div onclick="window.location.href = '/teacher/{{ $element['route'] }}'" class="flex items-center gap-3 text-sm rounded px-3 py-2 cursor-pointer bg-gray-50 hover:bg-blue-500 hover:text-white transition-all">
                        <span class="material-symbols-outlined">{{ $element['icon'] }}</span>

                        {{ $element['label'] }}
                    </div>
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