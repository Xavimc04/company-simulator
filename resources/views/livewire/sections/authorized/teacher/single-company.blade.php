<main x-data="{ page: '{{ $default_page }}' }">
    {{-- @ Navigation --}} 
    <section class="flex mt-5 items-center gap-2 overflow-x-scroll"> 
        @foreach ($pages as $page)
            <button 
                x-on:click="page = '{{ $page }}'" 
                :class="{ 'bg-blue-500 text-white': page === '{{ $page }}', 'bg-gray-100': page !== '{{ $page }}' }"
                class="transition-all px-5 py-2 rounded text-ellipsis truncate min-w-[150px]"
            >{{ $page }}</button>
        @endforeach
    </section>

    {{-- @ Details page --}}
    <section 
        x-show="page === 'Detalles'" 
        x-transition
        class="flex-1 mt-5 flex flex-wrap justify-between"
    >
        <x-labeled-input 
            label="Denominación social" 
            wireModel="social_denomination" 
            styles="flex-1 lg:flex-none lg:w-[49%] mt-5"
            type="text"
            icon="signature"
            placeholder="Monlau Group"
        />

        <x-labeled-input 
            label="Nombre comercial" 
            wireModel="name" 
            styles="flex-1 lg:flex-none lg:w-[49%] mt-5"
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
            styles="flex-1 lg:flex-none lg:w-[49%] mt-5"
            :options="$options"
        />

        <x-labeled-input 
            label="CIF" 
            wireModel="cif" 
            styles="flex-1 lg:flex-none lg:w-[49%] mt-5"
            type="text"
            icon="badge"
            placeholder="e.g Y1234567Z"
        />

        <x-labeled-input 
            label="Número de teléfono" 
            wireModel="phone" 
            styles="flex-1 lg:flex-none lg:w-[49%] mt-5"
            type="text"
            icon="call"
            numeric="true"
            placeholder="e.g +34 123 456 789"
        />

        <x-labeled-input 
            label="Dirección" 
            wireModel="location" 
            styles="flex-1 lg:flex-none lg:w-[49%] mt-5"
            type="text"
            icon="location_on"
            placeholder="e.g C/ Monlau, 6"
        />

        <x-labeled-input 
            label="Código Postal" 
            wireModel="cp" 
            numeric="true"
            styles="flex-1 lg:flex-none lg:w-[49%] mt-5"
            type="text"
            icon="explore"
            placeholder="e.g 08027"
        />

        <x-labeled-input 
            label="Ciudad" 
            wireModel="city" 
            styles="flex-1 lg:flex-none lg:w-[49%] mt-5"
            type="text"
            icon="public"
            placeholder="e.g Barcelona"
        />

        <x-labeled-input 
            label="Dirección de correo" 
            wireModel="contact_email" 
            styles="flex-1 lg:flex-none lg:w-[49%] mt-5"
            type="text"
            icon="email"
            placeholder="e.g ...@gmail.com"
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
            wireModel="form_level" 
            label="Nivel de educación"
            styles="flex-1 lg:flex-none lg:w-[49%] mt-5"
            :options="$options"
        />

        <div wire:loading wire:target="image" class="w-full mt-5">Subiendo...</div>

        <div class="flex items-center mt-10 justify-center w-full">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    @if($image)
                        <img src="{{ $image->temporaryUrl() }}" class="w-20 h-20 mb-5">
                    @else
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                    @endif

                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Subir nuevo logo</span></p>
                    <p class="text-xs text-gray-500 pb-5">SVG, PNG, JPG or GIF</p>
                </div>
        
                <input id="dropzone-file" wire:model.live="image" type="file" class="hidden" accept="image/png, image/gif, image/jpeg" />
            </label>
        </div>

        <div class="mt-5 flex justify-end w-full">
            <x-button wireClick="save" content="Confirmar cambios" icon="add_task" />
        </div>
    </section>

    {{-- @ Teachers --}}
    <section 
        x-show="page === 'Docentes'" 
        x-transition
    >
        Profesorado
    </section>

    <style>
        .fade-enter-active, .fade-leave-active {
            transition: opacity 0.5s;
        }
    
        .fade-enter, .fade-leave-to {
            opacity: 0;
        }
    </style>
</main>