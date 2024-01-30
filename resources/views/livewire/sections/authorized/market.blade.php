<section class="flex-1 p-4 flex flex-wrap flex flex-col gap-7">
    <div class="w-full flex flex-wrap items-center gap-4 justify-between">
        <div class="w-[60%] italic text-sm">
            Encontrados {{ $this->products->count() }} resultados...
        </div>

        <x-text-input  
            wireModel="product_filter" 
            type="text" 
            icon="search" 
            styles="text-sm w-[150px] border-gray-400 text-gray-400"
            placeholder="Buscador de productos" 
        /> 

        <?php 
            $stringOptions = [
                "Agricultura", "Animales", "Arte y cultura", "Belleza y estética", "Bodas", "Coches", "Alimentación", "Construcción", "Deportes", "Educación", "Hostelería", "Imagen y sonido", "Informática", "Jardinería", "Joyerías", "Material y mobiliario de oficina", "Moda", "Muebles", "Ocio", "Pequeños comercios", "Restaurantes", "Salud y parafarmacia", "Seguridad", "Servicios a empresas", "Telecomunicaciones", "Transportes, logística y almacenamiento", "Viajes"
            ];

            foreach ($stringOptions as $option) {
                $options[] = [
                    "value" => $option,
                    "label" => $option
                ];
            }
        ?>

        <x-selector 
            wireModel="sector"  
            styles="text-sm w-full md:w-[250px] border-gray-400 text-gray-400"
            :options="$options"
        />
    </div>

    <div class="flex-1">
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
    </div>
</section>
