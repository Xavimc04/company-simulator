<div> 
    @error('email')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
    @enderror

    <x-text-input 
        styles="mt-1 mb-3" 
        wireModel="email" 
        type="email" 
        icon="alternate_email" 
        placeholder="Dirección de correo" 
    /> 

    <button wire:click="recover" class="mt-5 bg-blue-500 hover:bg-blue-700 transition-all text-white w-full py-2 rounded">
        Enviar código
    </button>
</div>
