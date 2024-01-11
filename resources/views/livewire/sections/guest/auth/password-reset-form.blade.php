<div> 
    @error('password')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror

    <x-text-input 
        styles="mt-1 mb-3" 
        wireModel="password" 
        type="password" 
        icon="lock" 
        placeholder="Contraseña" 
    />

    @error('repeat')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror

    <x-text-input 
        styles="mt-1 mb-3" 
        wireModel="repeat" 
        type="password" 
        icon="lock" 
        placeholder="Repetir contraseña" 
    />

    <button wire:click="confirm('{{ $token }}')" class="mt-5 bg-blue-500 hover:bg-blue-700 transition-all text-white w-full py-2 rounded">
        Confirmar cambio
    </button>
</div>
