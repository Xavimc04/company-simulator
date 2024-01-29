<div x-data>
    {{-- @ Navigator --}}
    <section class="flex mt-10 items-center justify-between gap-5 flex-wrap">
        <x-text-input  
            wireModel="filter" 
            type="text" 
            icon="search" 
            placeholder="Buscar producto..." 
        />

        <x-button wireClick="openRegister" icon="add" content="Añadir producto" /> 
        <x-button wireClick="openCreateCategory" icon="filter_list" content="Añadir categoría" /> 
    </section>

    <section class="mt-10 flex gap-10">
        {{-- @ Categories --}}
        <div class="w-[300px]">
            <h1 class="text-xl font-bold">Categorías</h1>

            <small class="text-gray-400">
                Seleccione una categoría para filtrar los productos
            </small>

            {{-- @ Display categories --}}
            <div class="flex flex-col mt-7 border divide-y rounded-md">
                @foreach ($this->categories as $category) 
                    <label class="flex items-center gap-5 cursor-pointer p-5">
                        <input type="checkbox" wire:model.live="selected_categories.{{ $category->id }}" class="accent-blue-500" /> 

                        <p class="flex-1">
                            {{ $category->label }}
                        </p>

                        <span class="text-gray-400">{{ $category->products->count() }}</span>
                    </label> 
                @endforeach
            </div>
        </div>

        {{-- @ Products --}}
        <div class="relative flex-1 overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            
                        </th>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Producto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Referencia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Categoría
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th> 
                        <th scope="col" class="px-6 py-3" />
                    </tr> 
                </thead>
    
                <tbody>
                    @foreach ($this->products as $product)
                        <tr class="bg-white border-b">
                            <td class="py-4 text-ellipsis truncate pl-5 w-[30px]">
                                @if ($product['image'])
                                    <img class="max-w-[50px] rounded-sm h-[20px]" src="{{ asset('storage/companies/' . $product['company_id'] . '/products/' . $product['image']) }}" />
                                @endif
                            </td>
    
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 w-[50px] whitespace-nowrap text-ellipsis truncate">
                                {{ $product['id'] }}
                            </th>
                            <td class="px-6 py-4 text-ellipsis truncate">
                                {{ $product['label'] }}
                            </td>
                            <td class="px-6 py-4 text-ellipsis truncate">
                                {{ $product['reference'] }}
                            </td>
                            <td class="px-6 py-4 text-ellipsis truncate">
                                {{ $product['price'] }}€
                            </td>
                            <td class="px-6 py-4 text-ellipsis truncate">
                                {{ $product->category ? $product->category->label : 'Sin categoría' }}
                            </td>
                            <td class="px-6 py-4 text-ellipsis truncate">
                                @if ($product['status'] == 'active')
                                    <span class="text-green-500 lowercase bg-green-100 px-2 py-1 rounded border border-green-500">Activo</span>
                                @else
                                    <span class="text-red-500 lowercase bg-red-100 px-2 py-1 rounded border border-red-500">Inactivo</span>
                                @endif
                            </td> 
                            <td class="px-6 py-4 gap-5 flex items-center justify-end">
                                <span wire:click="edit('{{ $product['id'] }}')" class="material-symbols-outlined hover:text-blue-500 transition-all cursor-pointer">edit</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    
            <div class="mt-5">
                {{ $this->products->links() }}
            </div>
        </div>
    </section>

    {{-- @ Creating Product --}}
    <x-modal wire:model="creating" styles="flex flex-col gap-3">
        <x-labeled-input 
            label="Nombre de producto" 
            wireModel="label" 
            type="text"
            icon="inventory_2"
        />

        @error('label')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

        <x-labeled-input 
            label="Referencia" 
            wireModel="reference" 
            type="text"
            icon="qr_code"
            placeholder="..."
        />

        @error('reference')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

        <x-labeled-input 
            label="Precio" 
            wireModel="price" 
            type="text"
            numeric="true"
            icon="sell"
            placeholder="0.0"
        />

        @error('price')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

        <x-labeled-input 
            label="Descripción" 
            wireModel="description" 
            type="text"
            icon="description"
            placeholder="..."
        />

        @error('description')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

        <?php 
            $options = [];

            foreach ($this->categories as $value) {
                $options[] = [
                    'value' => $value['id'],
                    'label' => $value['label']
                ]; 
            }
        ?>

        <x-selector 
            wireModel="category" 
            label="Categoría"
            :options="$options"
        />

        @error('category')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

        <?php 
            $options = [
                [
                    'value' => 'active',
                    'label' => 'Activo'
                ],
                [
                    'value' => 'inactive',
                    'label' => 'Inactivo'
                ]
            ]; 
        ?>

        <x-selector 
            wireModel="status" 
            label="Estado"
            :options="$options"
        />

        <div>
            <div wire:loading wire:target="image">Subiendo...</div>
        
            <div class="flex items-center mt-3 justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        @if($image)
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

        @error('image')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
        
        <x-button wireClick="storeProduct" styles="justify-center" content="Confirmar" />
    </x-modal>

    {{-- @ Creating Category --}}
    <x-modal wire:model="creating_category" styles="flex flex-col gap-3">
        <x-labeled-input 
            label="Nombre de la categoría" 
            wireModel="category_name" 
            type="text"
            icon="badge"
            placeholder="..."
        />

        @error('category_name')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
        
        <x-button wireClick="createCategory" styles="justify-center" content="Registrar categoría" />
    </x-modal>
</div>
