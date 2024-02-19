<td class="flex justify-end py-4 gap-3 px-5 items-center">
    @if ($enableManage)
        <button  
            wire:click="manage('{{ $order->id }}')" 
            class="flex cursor-pointer select-none hover:scale-90 transition-all hover:opacity-70 items-center gap-3 border border-blue-500 bg-blue-500/10 text-blue-500 rounded py-1 px-3"
        >
            <span class="material-symbols-outlined">
                confirmation_number
            </span>

            Gestionar
        </button>
    @endif

    <button  
        wire:click="downloadPdf('{{ $order->id }}')" 
        class="flex cursor-pointer select-none hover:scale-90 transition-all hover:opacity-70 items-center gap-3 border border-green-500 bg-green-500/10 text-green-500 rounded py-1 px-3"
    >
        <span class="material-symbols-outlined">
            download
        </span>

        Descargar
    </button>

    @include('web.sections.authorized.order-items')
    
    @include('components.spinner')
</td>