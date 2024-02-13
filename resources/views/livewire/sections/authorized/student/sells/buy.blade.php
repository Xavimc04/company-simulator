<div class="relative overflow-x-auto mt-10">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Serial
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    Vendedor
                </th>
                <th scope="col" class="px-6 py-3">
                    Productos
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3">
                    
                </th>
            </tr> 
        </thead>

        <tbody>
            @foreach ($this->orders as $order)
                <tr class="bg-white border-b">
                    <td class="py-4 text-ellipsis truncate pl-5">
                        {{ $order->id }}
                    </td>
                    <td class="py-4 text-ellipsis truncate pl-5">
                        {{ $order->serial }}
                    </td>
                    <td class="py-4 text-ellipsis truncate pl-5"> 
                        @if ($order->status == 'pending')
                            <span class="text-orange-500 lowercase bg-orange-100 px-2 py-1 rounded border border-orange-500">pendiente</span>
                        @else
                            <span class="text-green-500 lowercase bg-green-100 px-2 py-1 rounded border border-green-500">gestionada</span>
                        @endif
                    </td>
                    <td class="py-4 text-ellipsis truncate pl-5">
                        {{ $order->seller->name }}
                    </td>
                    <td class="py-4 text-ellipsis truncate pl-5">
                        {{ $order->products->sum('amount') }}
                    </td>
                    <td class="py-4 text-ellipsis truncate pl-5">
                        @php
                            $total = 0; 

                            foreach ($order->products as $product) {
                                $total += $product->amount * $product->product->price;
                            }
                        @endphp

                        {{ $total }}€
                    </td>
                    <td class="py-4 text-ellipsis truncate pl-5">
                        {{ $order->created_at->format('d/m/Y') }}
                    </td>
                    <td class="flex justify-end py-4 gap-3 px-5 items-center">
                        <button  
                            wire:click="manage('{{ $order->id }}')" 
                            class="flex cursor-pointer select-none hover:scale-90 transition-all hover:opacity-70 items-center gap-3 border border-blue-500 bg-blue-500/10 text-blue-500 rounded py-1 px-3"
                        >
                            <span class="material-symbols-outlined">
                                confirmation_number
                            </span>

                            Gestionar
                        </button>

                        <button  
                            wire:click="downloadPdf('{{ $order->id }}')" 
                            class="flex cursor-pointer select-none hover:scale-90 transition-all hover:opacity-70 items-center gap-3 border border-green-500 bg-green-500/10 text-green-500 rounded py-1 px-3"
                        >
                            <span class="material-symbols-outlined">
                                download
                            </span>

                            Descargar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-5">
        {{ $this->orders->links() }}
    </div>

    {{-- @ Manage single item --}}
    <x-modal wire:model="managing" styles="flex flex-col gap-3"> 
        <h2 class="text-lg flex items-center gap-3">
            @if ($current_order  && $current_order->seller->icon)
                <img class="max-w-[30px] rounded-sm h-[15px]" src="{{ asset('storage/companies/' . $current_order->seller->icon) }}" />
            @endif

            {{ $current_order ? $current_order->seller->name : '' }}
        </h2>

        <div class="mb-4">
            <span class="text-green-500 bg-green-100 text-xs px-2 py-1 rounded border border-green-500 uppercase">{{ $current_order ? $current_order->serial : '' }}</span>
        </div>

        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cantidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                </tr> 
            </thead>
    
            @if ($current_order && count($current_order->products) > 0) 
                <tbody>
                    @foreach ($current_order->products as $product)
                        <tr class="bg-white border-b">
                            <td class="py-4 text-ellipsis truncate pl-5"> 
                                {{ Str::limit($product->product->label, $limit = 30, $end = '...') }}
                            </td>
                            <td class="py-4 text-ellipsis truncate pl-5">
                                {{ $product->amount }}
                            </td>
                            <td class="py-4 text-ellipsis truncate pl-5"> 
                                {{ $product->product->price * $product->amount }}€
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endif
        </table>
        
        @if ($current_order && $current_order->status == 'pending')
            <x-button wireClick="confirm" styles="justify-center" content="Confirmar compra" />
        @endif
    </x-modal>
</div>  