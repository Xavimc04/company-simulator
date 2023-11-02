<main x-data>
    {{-- @ Navigator --}}
    <section class="flex mt-5 items-center justify-between gap-5 flex-wrap">
        <div class="flex items-center bg-white gap-3 border border-black transition-all w-full flex-1 rounded px-3">
            <x-icon label="search" />

            <input wire:model.live="companyFilter" type="text" class="flex-1 py-2 bg-transparent text-black" placeholder="..." />
        </div>   

        <x-button wireClick="handleCreateModal" icon="add" content="Nueva empresa" />
    </section>

    {{-- @ Company displaying --}}
    <div class="relative overflow-x-auto mt-10">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
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
                        Vacaciones
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Activa
                    </th>
                    <th scope="col" class="px-6 py-3" />
                </tr> 
            </thead>

            <tbody>
                
            </tbody>
        </table>
    </div>

    {{-- @ Create new company --}}
    <x-modal wire:model="creating" styles="flex flex-col gap-5">
        <x-labeled-input 
            label="Denominación social" 
            wireModel="social_name" 
            type="text"
            icon="signature"
            placeholder="Monlau Group"
        />

        <x-labeled-input 
            label="Nombre comercial" 
            wireModel="name" 
            type="text"
            icon="store"
            placeholder=""
        />

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
            wireModel="education" 
            label="Nivel de educación"
            :options="$options"
        />

        <x-button wireClick="" styles="justify-center" content="Confirmar alta" />
    </x-modal>
</main>