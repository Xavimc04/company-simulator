<div class="flex-1 p-5">
    {{-- @ Cart items --}}
    <section class="flex flex-col divide-y px-5 py-1 rounded shadow-sm bg-white w-[900px]">
        @foreach ($this->items as $item)
            <div class="flex items-center rounded h-[70px] gap-3">
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
                    <span class="material-symbols-outlined border rounded-full p-2 text-sm px-2.5 select-none cursor-pointer">
                        remove
                    </span>

                    {{ $item->amount }}

                    <span class="material-symbols-outlined border rounded-full p-2 text-sm px-2.5 select-none cursor-pointer">
                        add
                    </span>
                </div>

                <button class="material-symbols-outlined text-md opacity-20">
                    delete
                </button>
            </div>
        @endforeach
    </section>
</div>
