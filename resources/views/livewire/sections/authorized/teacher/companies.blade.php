<main x-data>
    {{-- @ Navigator --}}
    <section class="flex mt-5 items-center justify-between gap-5 flex-wrap">
        <div class="flex items-center bg-white gap-3 border border-black transition-all w-full flex-1 rounded px-3">
            <x-icon label="search" />

            <input wire:model.live="filter" type="text" class="flex-1 py-2 bg-transparent text-black" placeholder="..." />
        </div>   

        <x-button wireClick="handleCreateModal" icon="add" content="Nueva empresa" />
    </section>

    {{-- @ Company displaying --}}
    <div class="relative overflow-x-auto mt-10">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alumnos
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Profesores
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3" />
                </tr> 
            </thead>

            <tbody>
                @foreach ($this->companies as $company)
                    <tr class="bg-white border-b">
                        <td class="py-4 text-ellipsis truncate pl-5 w-[30px]">
                            @if ($company['icon'])
                                <img class="w-[20px] rounded-full h-[20px]" src="{{ asset('storage/companies/' . $company['icon']) }}" />
                            @endif
                        </td>

                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $company['id'] }}
                        </td>

                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $company['name'] }}
                        </td>

                        <td class="px-6 py-4 text-ellipsis truncate">
                            Sin alumnos
                        </td>

                        <td class="px-6 py-4 text-ellipsis truncate">
                            Sin profesores
                        </td>

                        <td class="px-6 py-4 text-ellipsis truncate">
                            @if ($company['status'] == 'active')
                                <span class="text-green-500 lowercase bg-green-100 px-2 py-1 rounded border border-green-500">Activa</span>
                            @else
                                <span class="text-red-500 lowercase bg-red-100 px-2 py-1 rounded border border-red-500">Inactiva</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 gap-5 flex items-center justify-end">
                            <span onclick="window.location.href = '/teacher/empresas/{{ $company['id'] }}'" class="material-symbols-outlined hover:text-blue-500 transition-all cursor-pointer">visibility</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- @ Create new company --}}
    <x-modal wire:model="creating" styles="flex flex-col gap-2">
        @error('social_denomination')
            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
        
        <x-labeled-input 
            label="Denominación social" 
            wireModel="social_denomination" 
            type="text"
            icon="signature"
            placeholder="Monlau Group"
        />

        @error('name')
            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror

        <x-labeled-input 
            label="Nombre comercial" 
            wireModel="name" 
            type="text"
            icon="store"
            placeholder=""
        />

        @error('sector')
            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror

        <?php 
            $stringOptions = [
                "Agricultura", "Animales", "Arte y cultura", "Belleza y estética", "Bodas", "Coches", "Alimentación", "Construcción", "Deportes", "Educación", "Hostelería", "Imagen y sonido", "Informática", "Jardinería", "Joyerías", "Material y mobiliario de oficina", "Moda", "Muebles", "Ocio", "Pequeños comercios", "Restaurantes", "Salud y parafarmacia", "Seguridad", "Servicios a empresas", "Telecomunicaciones", "Transported, logística y almacenamiento", "Viajes"
            ]; 

            $options = []; 

            foreach ($stringOptions as $value) {
                $options[] = [
                    "value" => $value,
                    "label" => $value
                ];
            }
        ?>

        <x-selector 
            wireModel="sector" 
            label="Sector"
            :options="$options"
        />

        @error('form_level')
            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror

        <?php 
            $stringOptions = [
                "CFGM Gestión Administrativa", "CFGS Administración y Finanzas", "CFGM Actividades  Comerciales", "CFGS Comercio Internacional", "CFGS Márketing y Publicidad", "CFGS Transporte y Logística", "FP Básica", "Bachillerato", "ESO", "CP 308 Actividades de gestión administrativa", "CP 208 Actividades administrativas cliente", "CP 408 Operaciones Auxiliares", "Emprendimiento", "Universidad", "Otros"
            ]; 

            $options = []; 

            foreach ($stringOptions as $value) {
                $options[] = [
                    "value" => $value,
                    "label" => $value
                ];
            }
        ?>

        <x-selector 
            wireModel="form_level" 
            label="Nivel de educación"
            :options="$options"
        />

        <x-button wireClick="create" styles="justify-center" content="Confirmar alta" />
    </x-modal>
</main>