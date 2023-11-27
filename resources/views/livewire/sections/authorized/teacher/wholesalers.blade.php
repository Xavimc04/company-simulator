<div>
    {{-- @ Navigator --}}
    <section class="flex mt-5 items-center justify-between gap-5 flex-wrap">
        <div class="flex items-center bg-white gap-3 border border-black transition-all w-full flex-1 rounded px-3">
            <x-icon label="search" />

            <input wire:model.live="filter" type="text" class="flex-1 py-2 bg-transparent text-black" placeholder="..." />
        </div>   

        <x-button wireClick="handleCreateModal" icon="add" content="Nuevo mayorista" />
    </section>

    {{-- @ Wholesalers displaying --}}
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
                        CIF
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Asignaciones
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Transporte
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tasas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        País
                    </th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr> 
            </thead>

            <tbody>
                @foreach ($this->wholesalers as $wholesaler)
                    <tr class="bg-white border-b">
                        <td class="py-4 text-ellipsis truncate pl-5 w-[30px]">
                            @if ($wholesaler['icon'])
                                <img class="w-[20px] rounded-full h-[20px]" src="{{ asset('storage/wholesalers/' . $wholesaler['icon']) }}" />
                            @endif
                        </td>
                        <td class="py-4 text-ellipsis truncate pl-5">
                            {{ $wholesaler['id'] }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-ellipsis truncate">
                            {{ $wholesaler['cif'] }}
                        </th>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $wholesaler['name'] }}
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            0
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $wholesaler['transport'] }}
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            @if ($wholesaler['tax'])
                                <span class="text-red-500 lowercase bg-red-100 px-2 py-1 rounded border border-red-500">Exento</span>
                            @else
                                <span class="text-green-500 lowercase bg-green-100 px-2 py-1 rounded border border-green-500">Aplicadas</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $wholesaler['country'] }}
                        </td>
                        <td class="px-6 py-4 gap-5 flex items-center justify-end"> 
                            <span wire:click="edit('{{ $wholesaler['id'] }}')" class="material-symbols-outlined hover:text-blue-500 transition-all cursor-pointer">edit</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            {{ $this->wholesalers->links() }}
        </div>
    </div>  

    {{-- @ Create new wholesaler --}}
    <x-modal wire:model="modal" styles="flex flex-col gap-2">
        <section class="flex flex-col max-h-[500px] overflow-y-scroll">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-labeled-input 
                label="Nombre" 
                wireModel="name" 
                styles="flex-1 mb-3"
                type="text"
                icon="badge"
                placeholder="e.g Monlau Group"
            />

            @error('cif')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-labeled-input 
                label="CIF" 
                wireModel="cif" 
                styles="flex-1 mb-3"
                type="text"
                icon="apartment"
                placeholder="..."
            />

            @error('social_denomination')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-labeled-input 
                label="Denominación social" 
                wireModel="social_denomination" 
                styles="flex-1 mb-3"
                type="text"
                icon="signature"
                placeholder="e.g Monlau Group S.L"
            />

            @error('transport')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            
            <x-labeled-input 
                label="Coste de Transporte (EUR)" 
                wireModel="transport" 
                styles="flex-1 mb-3"
                type="text"
                numeric="true"
                icon="sell"
                placeholder="0.0"
            />

            @error('country')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            
            <x-labeled-input 
                label="País" 
                wireModel="country" 
                styles="flex-1 mb-3"
                type="text" 
                icon="public"
                placeholder="España"
            />

            @error('location')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-labeled-input 
                label="Dirección" 
                wireModel="location" 
                styles="flex-1 mb-3"
                type="text"
                icon="pin_drop"
            />

            @error('city')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-labeled-input 
                label="Ciudad" 
                wireModel="city" 
                styles="flex-1 mb-3"
                type="text"
                icon="map"
            />

            @error('disccount')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-labeled-input 
                label="Descuento (%)" 
                wireModel="disccount" 
                styles="flex-1 mb-3"
                type="text"
                icon="more_up"
                placeholder="0.0"
            />

            <?php 
                $stringOptions = [
                    7, 15, 30, 45, 60
                ]; 

                $options = []; 

                foreach ($stringOptions as $value) {
                    $options[] = [
                        "value" => $value,
                        "label" => $value
                    ];
                }
            ?>

            @error('payment_days')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-selector 
                wireModel="payment_days" 
                label="Días para el pago"
                styles="flex-1 mb-3"
                :options="$options"
            />

            <?php 
                $taxOptions = [
                    [
                        "value" => 0,
                        "label" => "No"
                    ],
                    [
                        "value" => 1,
                        "label" => "Si"
                    ]
                ];
            ?>

            @error('tax')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <x-selector 
                wireModel="tax" 
                label="Exento de IVA"
                styles="flex-1 mb-3"
                :options="$taxOptions"
            />

            <div class="mb-2">
                <div wire:loading wire:target="image">Subiendo...</div>
            
                <div class="flex items-center mt-3 justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-[200px] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            @if($image && gettype($image) != 'string' && $image->temporaryUrl())
                                <img src="{{ $image->temporaryUrl() }}" class="w-20 h-20 mb-5">
                            @else
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            @endif
            
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Subir nueva imagen de perfil</span></p>
                            <p class="text-xs text-gray-500 pb-5">SVG, PNG, JPG or GIF</p>
                        </div>
                
                        <input id="dropzone-file" wire:model.live="image" type="file" class="hidden" accept="image/png, image/gif, image/jpeg" />
                    </label>
                </div>
            </div>
        </section>

        <x-button wireClick="saveForm" styles="justify-center" content="Confirmar" />
    </x-modal>
</div>
