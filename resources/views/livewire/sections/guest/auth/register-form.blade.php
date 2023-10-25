<div>
    @if ($doesUserExist)
        <x-text-input 
            styles="mt-1 mb-3" 
            wireModel="verification_code" 
            type="text" 
            icon="qr_code" 
            placeholder="Código de invitación" 
        />
    @endif

    @error('name')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror

    <x-text-input 
        styles="mt-1 mb-3" 
        wireModel="name" 
        type="text" 
        icon="person" 
        placeholder="Introduce tu nombre" 
    />

    @error('email')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror

    @error('email_taken')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror

    <x-text-input 
        styles="mt-1 mb-3" 
        wireModel="email" 
        type="email" 
        icon="alternate_email" 
        placeholder="Dirección de correo" 
    />

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

    <button wire:click="confirm" class="mt-5 bg-blue-500 hover:bg-blue-700 transition-all text-white w-full py-2 rounded">
        Confirmar registro
    </button>
</div>
