@php
    use App\Models\User; 
    use App\Models\Role; 
@endphp

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

        <?php  
            $availableStatus = [
                [
                    "value" => "active",
                    "label" => "Activa"
                ],
                [
                    "value" => "inactive",
                    "label" => "Inactiva"
                ]
            ];  
        ?>

        <x-selector 
            wireModel="status" 
            label="Estado"
            styles="flex-1 lg:flex-none lg:w-[49%] mt-5"
            :options="$availableStatus"
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
        class="mt-10"
    >
        <x-text-input  
            wireModel="teacher_filter" 
            type="text" 
            icon="search" 
            styles="w-full"
            placeholder="Filtrar profesores..." 
        />

        <div class="flex items-center gap-10 mt-3">
            <div class="flex items-center gap-3">
                <div class="h-[10px] bg-blue-500 w-[10px] rounded-full"></div>

                Docente asignado
            </div>

            <div class="flex items-center gap-3">
                <div class="h-[10px] bg-gray-300 w-[10px] rounded-full"></div>

                Sin asignar
            </div>
        </div>

        <div class="flex flex-wrap gap-3 mt-10">
            @foreach ($teachers as $teacher)
                <div wire:click="toggleTeacher('{{ $teacher->id }}')" class="{{ $this->userIsTeacher($teacher->id) ? 'bg-blue-500 text-white' : 'bg-gray-100' }} px-5 py-2 flex items-center gap-3 rounded cursor-pointer">
                    @if ($teacher['profile_url'])
                        <img class="w-[20px] rounded-full h-[20px]" src="{{ asset('storage/profile-pictures/' . $teacher['profile_url']) }}" />
                    @endif
    
                    {{ $teacher->name }}
                </div>
            @endforeach
        </div>
    </section>

    {{-- @ Market --}}
    <section 
        x-show="page === 'Mercado'" 
        x-transition
        class="mt-10"
    >
        @foreach ($marketQuestions as $question)
            <div class="flex flex-col md:flex-row gap-5 items-center mb-5 border-b pb-5"> 
                <input type="checkbox" class="accent-blue-500" @if ($this->isQuestionMarket($question['index']))
                    checked
                @endif wire:click="toggleMarketQuestion('{{ $question['index'] }}')">

                <div class="flex flex-col flex-1">
                    <span class="font-semibold">{{ $question['title'] }}</span>

                    <span class="text-sm text-gray-500">{{ $question['description'] }}</span>
                </div>
            </div>
        @endforeach
    </section>

    {{-- @ Employees --}}
    <section 
        x-show="page === 'Trabajadores'" 
        x-transition
        class="mt-10"
    > 
        <section class="flex mt-5 items-center justify-between gap-5 flex-wrap">
            <div class="flex items-center bg-white gap-3 border border-black transition-all w-full flex-1 rounded px-3">
                <x-icon label="search" />
    
                <input wire:model.live="employee_filter" type="text" class="flex-1 py-2 bg-transparent text-black" placeholder="..." />
            </div>   
    
            <x-button wireClick="handleEmployeeModal" icon="person" content="Contratar" />
        </section>

        <div class="relative overflow-x-auto mt-10">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr> 
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alumno
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Departamento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rango
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha de contratación
                        </th>
                        <th scope="col" class="px-6 py-3" />
                    </tr> 
                </thead>
    
                <tbody>
                    @foreach ($this->employees as $employee)
                        <tr class="bg-white border-b">  
                            <td class="px-6 py-4 text-ellipsis truncate">
                                {{ $employee['id'] }}
                            </td>
    
                            <td class="px-6 py-4 text-ellipsis truncate">
                                {{ $employee->user->name }}
                            </td>
    
                            <td class="px-6 py-4 text-ellipsis truncate">
                                {{ $employee['dept'] }}
                            </td>
    
                            <td class="px-6 py-4 text-ellipsis truncate">
                                @if ($employee['boss'])
                                    Jefe de dpto.
                                @else 
                                    Empleado
                                @endif
                            </td>
    
                            <td class="px-6 py-4 text-ellipsis truncate">
                                {{ $employee['created_at']->diffForHumans() }}
                            </td>
    
                            <td class="px-6 py-4 gap-5 flex items-center justify-end">
                                <span wire:click="editEmployee('{{ $employee['id'] }}')" class="material-symbols-outlined hover:text-blue-500 transition-all cursor-pointer">edit</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    {{-- @ Wholesalers --}}
    <section 
        x-show="page === 'Mayoristas'" 
        x-transition
        class="mt-10"
    >
        <x-text-input  
            wireModel="wholesaler_filter" 
            type="text" 
            icon="search" 
            styles="w-full"
            placeholder="Filtrar mayoristas..." 
        />

        <div class="flex items-center gap-10 mt-3">
            <div class="flex items-center gap-3">
                <div class="h-[10px] bg-blue-500 w-[10px] rounded-full"></div>

                Mayorista asignado
            </div>

            <div class="flex items-center gap-3">
                <div class="h-[10px] bg-gray-300 w-[10px] rounded-full"></div>

                Sin asignar
            </div>
        </div>

        <div class="flex flex-wrap gap-3 mt-10">
            @foreach ($wholesalers as $wholesaler)
                <div wire:click="toggleWholesaler('{{ $wholesaler->id }}')" class="{{ $this->isWholesalerAssigned($wholesaler->id) ? 'bg-blue-500 text-white' : 'bg-gray-100' }} px-5 py-2 flex items-center gap-3 rounded cursor-pointer">
                    @if ($wholesaler->icon)
                        <img class="w-[20px] rounded-full h-[20px]" src="{{ asset('storage/wholesalers/' . $wholesaler->icon) }}" />
                    @endif
                    
                    {{ $wholesaler->name }}
                </div>
            @endforeach
        </div>
    </section>

    {{-- @ Add employee --}}
    <x-modal wire:model="employee_modal" styles="flex flex-col gap-2">
        @error('employee_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        <?php 
            $users = []; 
            $studentRole = Role::where('name', 'Estudiante')->first();

            if($studentRole) {
                $users = User::where('role_id', $studentRole->id)->where('center_id', $company->center_id)->get(); 
            } 

            $userOptions = []; 

            foreach ($users as $value) {
                $userOptions[] = [
                    "value" => $value['id'],
                    "label" => $value['name']
                ];
            }
        ?>

        <x-selector 
            wireModel="employee_id" 
            label="Alumno"
            styles="mb-2"
            :options="$userOptions"
        />

        @error('employee_dept') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        <?php 
            $dept = [
                "Recepción", "Recursos humanos", "Finanzas", "Compras", "Ventas"
            ];

            $dptOptions = []; 

            foreach ($dept as $value) {
                $dptOptions[] = [
                    "value" => $value,
                    "label" => $value
                ];
            }
        ?>

        <x-selector 
            wireModel="employee_dept" 
            label="Departamento"
            styles="mb-2"
            :options="$dptOptions"
        />

        @error('employee_boss') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

        <?php  
            $bossOptions = [
                [
                    "value" => 0,
                    "label" => "Empleado"
                ],
                [
                    "value" => 1,
                    "label" => "Jefe de departamento"
                ]
            ];  
        ?>

        <x-selector 
            wireModel="employee_boss" 
            label="Rango"
            styles="mb-2"
            :options="$bossOptions"
        />

        <x-button wireClick="addEmployee" styles="justify-center" content="{{ $employee_editing ? 'Confirmar cambios' : 'Contratar' }}" />
    </x-modal>

    <style>
        .fade-enter-active, .fade-leave-active {
            transition: opacity 0.5s;
        }
    
        .fade-enter, .fade-leave-to {
            opacity: 0;
        }
    </style>
</main>