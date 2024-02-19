@php
    use App\Models\Company; 
@endphp

<div class="flex-1 gap-7 flex flex-col items-center xl:items-start xl:flex-row overflow-y-scroll my-10 xl:my-0">
    {{-- @ Companies  --}}
    <section class="flex flex-col gap-7 xl:p-7 w-[90%] xl:w-full h-full xl:overflow-y-scroll">
        @foreach ($this->companies as $company)
            <div class="flex flex-col gap-5 [&:not(:first-child)]:pt-5">
                {{-- @ Company information --}}
                <section class="flex items-center gap-3">
                    @if ($company->icon)
                        <img class="max-w-[30px] rounded-sm h-[15px]" src="{{ asset('storage/companies/' . $company->icon) }}" />
                    @endif

                    {{ $company->name }}
                </section>

                {{-- @ Cart items --}}
                <section class="flex flex-col divide-y px-5 py-1 rounded shadow-sm bg-white">
                    @foreach ($this->items as $item)
                        @if ($item->product->company_id != $company->id)
                            @continue
                        @endif

                        <div class="flex items-center flex-wrap rounded py-7 md:py-0 md:h-[70px] gap-3">
                            <div class="w-10 flex items-center justify-center">
                                @if ($item->product->image)
                                    <img class="rounded-sm h-[30px]" src="{{ asset('storage/companies/' . $item->product['company_id'] . '/products/' . $item->product['image']) }}" />
                                @else 
                                    <span class="material-symbols-outlined text-md text-blue-500">
                                        fullscreen
                                    </span>
                                @endif
                            </div>
            
                            <h2 class="text-lg">
                                {{ $item->product->label }}
                            </h2> 
                            
                            <span class="text-xs text-gray-400 flex-1">#{{ $item->product->reference }}</span>
            
                            <p class="text-xl font-bold text-blue-500 px-5 text-end">
                                {{ $item->product->price * $item->amount }} €
                            </p>
            
                            <div class="flex items-center gap-4">
                                <span wire:click="removeOne({{ $item->id }})" class="material-symbols-outlined border rounded-full p-2 text-sm px-2.5 select-none cursor-pointer">
                                    remove
                                </span>
            
                                {{ $item->amount }}
            
                                <span wire:click="addOne({{ $item->id }})" class="material-symbols-outlined border rounded-full p-2 text-sm px-2.5 select-none cursor-pointer">
                                    add
                                </span>
                            </div>
            
                            <button wire:click="deleteElement({{ $item->id }})" class="material-symbols-outlined text-md opacity-20">
                                delete
                            </button>
                        </div>
                    @endforeach
                </section>
            </div>
        @endforeach
    </section>

    {{-- @ Subtotal and information --}}
    <section class="bg-white xl:h-full w-[90%] xl:w-1/3 shadow-md p-5">
        <h2 class="text-2xl text-blue-500 font-bold">
            Información del pago
        </h2>

        <small class="text-gray-600">
            Revisa la información de pago antes de confirmar la compra.
        </small>

        <div class="bg-gray-100 border mt-7 p-3">
            Detalles
        </div>

        <div class="mt-5 flex flex-col gap-5">
            <x-labeled-input 
                label="Nombre" 
                value="{{ Auth::user()->name }}" 
                type="text"
                icon="person"
                disabled="true"
            />

            <x-labeled-input 
                label="NIF / CIF" 
                value="{{ Auth::user()->current_company && Company::find(Auth::user()->current_company)->cif ? Company::find(Auth::user()->current_company)->cif : 'No disponible' }}"
                type="text"
                icon="home"
                disabled="true"
            />

            <x-labeled-input 
                label="Domicilio de entrega"  
                value="{{ Auth::user()->current_company && Company::find(Auth::user()->current_company)->location ? Company::find(Auth::user()->current_company)->location : 'No disponible' }}"
                type="text"
                icon="home" 
                disabled="true"
            />
        </div>

        <div class="bg-gray-100 border mt-7 p-3">
            Totalidad
        </div>

        <ul class="mt-5 flex flex-col gap-2">
            <li class="text-end">Elementos: <span class="text-blue-500 text-xl">{{ $this->items->sum('amount') }}</span></li>

            @php
                $subtotal = 0;

                foreach ($this->items as $key => $value) {
                    $subtotal += $value->product->price * $value->amount;
                }
            @endphp

            <li class="text-end">Subtotal: <span class="text-blue-500 text-xl">{{ $subtotal }} €</span></li>
        </ul>

        <div class="flex items-center justify-end">
            <x-button wireClick="checkout" styles="justify-center mt-5" icon="credit_card" content="Procesar a compras" />
        </div>
    </section>

    @include('components.spinner')
</div>
