<div class="flex-1 border-t flex gap-5 p-5 overflow-y-scroll">
    <section class="flex-1">
        <div class="h-1/2 relative group transition-all">
            <iframe src="{{ $company->website }}" class="w-full flex-1 h-full border rounded-md"></iframe>

            <div onclick="window.open('{{ $company->website }}')" class="absolute hidden group-hover:flex cursor-pointer top-0 bg-black/40 backdrop-blur-sm items-center justify-center gap-3 shadow text-white w-full h-full rounded-md transition-all">
                <span class="material-symbols-outlined">
                    public
                </span>

                Visitar página
            </div>
        </div>

        <div class="flex mt-10 gap-5 items-center">
            <img class="max-w-[50px] rounded-sm h-[50px]" src="{{ asset('storage/companies/' . $company->icon) }}" />

            <section>
                <h1 class="text-2xl font-bold">{{ $company->name }}</h1>
                <p class="text-gray-500 text-sm">{{ $company->social_denomination }}</p>
            </section>
        </div>

        <div class="flex mt-10 flex-wrap gap-5 mb-10"> 
            <x-labeled-input 
                label="CIF"
                value="{{ $company->cif }}" 
                type="text" 
                styles="flex-1"
                icon="badge"
                disabled="true"
            />

            <x-labeled-input 
                label="Núcleo formativo"
                value="{{ $company->form_level }}" 
                type="text" 
                styles="flex-1"
                icon="school"
                disabled="true"
            />

            <x-labeled-input 
                label="Teléfono de contacto"
                value="{{ $company->phone }}" 
                type="text" 
                styles="flex-1"
                icon="call"
                disabled="true"
            />

            <x-labeled-input 
                label="Dirección de correo"
                value="{{ $company->contact_email }}" 
                type="text" 
                styles="flex-1"
                icon="mail"
                disabled="true"
            />

            <x-labeled-input 
                label="Código postal"
                value="{{ $company->cp }}" 
                type="text" 
                styles="flex-1"
                icon="navigation"
                disabled="true"
            />

            <x-labeled-input 
                label="Sector"
                value="{{ $company->sector }}" 
                type="text" 
                styles="flex-1"
                icon="bar_chart"
                disabled="true"
            />

            <x-labeled-input 
                label="Localidad"
                value="{{ $company->city }}" 
                type="text" 
                styles="flex-1"
                icon="map"
                disabled="true"
            />

            <x-labeled-input 
                label="Dirección"
                value="{{ $company->location }}" 
                type="text" 
                styles="flex-1"
                icon="push_pin"
                disabled="true"
            />

            <x-labeled-input 
                label="Empleados"
                value="{{ $company->employees->count() }} empleados" 
                type="text" 
                styles="flex-1"
                icon="group"
                disabled="true"
            />

            <x-labeled-input 
                label="Centro"
                value="{{ $company->center->name }}" 
                type="text" 
                styles="flex-1"
                icon="apartment"
                disabled="true"
            />
        </div>
    </section>
    
    <section class="flex-1 flex flex-col gap-5">
        @if ($selected_product)
            <div class="bg-white shadow-sm rounded-md flex-wrap p-5 flex items-center gap-10">
                @if ($selected_product->image)
                    <img class="max-w-[100px] rounded-sm h-[100px]" src="{{ asset('storage/companies/' . $selected_product['company_id'] . '/products/' . $selected_product['image']) }}" />
                @endif

                <section class="flex-1 {{ $selected_product->image ? "px-10 border-l" : null }}">
                    <h2 class="text-2xl text-blue-500 font-extrabold">
                        {{ $selected_product->label }}
                    </h2>
        
                    <p class="text-sm text-gray-400">
                        {{ $selected_product->category->label }}
                    </p>
    
                    @if ($selected_product->description)
                        <p class="mt-5">
                            {{ $selected_product->description }}
                        </p>
                    @endif
                </section>

                <section class="w-full flex items-center justify-end gap-5">
                    <div class="flex items-center gap-4 flex-1">
                        <span wire:click.defer="$set('selected_counter', {{ $selected_counter > 1 ? $selected_counter - 1 : $selected_counter }})" class="material-symbols-outlined border rounded-full p-2 text-sm px-2.5 select-none cursor-pointer">
                            remove
                        </span>

                        {{ $selected_counter }}

                        <span wire:click.prevent="$set('selected_counter', {{ $selected_counter + 1 }})" class="material-symbols-outlined border rounded-full p-2 text-sm px-2.5 select-none cursor-pointer">
                            add
                        </span>
                    </div>

                    <p class="text-2xl font-bold text-blue-500">
                        {{ $selected_product->price * $selected_counter }} €
                    </p>
                    
                    <x-button wireClick="addToCart" styles="justify-center" icon="shopping_cart" content="Añadir a la cesta" />
                </section>
            </div>
        @endif

        <div class="flex gap-5">
            <x-text-input  
                wireModel="filter" 
                type="text" 
                icon="search" 
                styles="text-sm flex-1 border-gray-400 text-gray-400"
                placeholder="Buscador de productos" 
            /> 

            <?php   
                foreach ($company->productCategories as $option) {
                    $options[] = [
                        "value" => $option->id,
                        "label" => $option->label
                    ];
                }
            ?>

            <x-selector 
                wireModel="category"  
                styles="text-sm border-gray-400 text-gray-400 px-5 appearance-none"
                :options="$options"
            />
        </div>

        <div style="display: block; columns: 17rem; gap: 1rem">
            @foreach ($this->products as $product)
                <div onclick="window.location.href = '/market/company/{{ str_replace(' ', '-', $product->company->name) }}?product={{ str_replace(' ', '-', $product->label) }}'" class="bg-white shadow p-4 rounded-md mb-4 cursor-pointer group transition-all hover:bg-blue-500 hover:text-white" style="break-inside: avoid;">
                    <section class="flex items-center justify-between">
                        <p class="text-xl">
                            {{ $product->label }}

                            @if ($product->company && $product->company->sector)
                                <span class="text-xs text-gray-400 group-hover:text-blue-200 transition-all block">
                                    {{ $product->company->sector }}
                                </span>
                            @endif
                        </p>
    
                        @if ($product->image)
                            <img class="max-w-[70px] rounded-sm h-[50px]" src="{{ asset('storage/companies/' . $product['company_id'] . '/products/' . $product['image']) }}" />
                        @endif
                    </section>

                    @if ($product->description && strlen($product->description) > 0)
                        <p class="mt-7 text-sm text-gray-400 group-hover:text-blue-200 transition-all">
                            {{ $product->description }}
                        </p>
                    @endif 

                    <section class="mt-7 flex items-center gap-3">
                        @if ($product->company->icon)
                            <img class="max-w-[30px] rounded-sm h-[15px]" src="{{ asset('storage/companies/' . $product->company->icon) }}" />
                        @endif

                        <p class="flex-1 text-sm">
                            {{ $product->company->name }}
                        </p>

                        <p class="text-xl font-bold text-blue-500 group-hover:text-white transition-all">
                            {{ $product->price }} €
                        </p>
                    </section>
                </div>
            @endforeach
        </div>
    </section>
</div>