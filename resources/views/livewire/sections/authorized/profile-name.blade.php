<div class="flex items-end gap-3 flex-wrap">
    @if ($editing)
        <x-labeled-input 
            label="Nombre de usuario"
            wireModel="name"
            type="text"
            styles="flex-1"
            icon="person" 
        /> 

        <x-button wireClick="confirm" content="Confirmar" /> 
        <x-button wireClick="cancel" content="Cancelar" /> 

        @error('name')
            <span class="text-red-500 text-sm w-full">{{ $message }}</span>
        @enderror
    @else
        <x-labeled-input 
            label="Nombre de usuario"
            wireModel="name"
            type="text"
            styles="flex-1"
            icon="person"
            disabled="true"
        />

        <x-button wireClick="$set('editing', true)" content="Editar" /> 
    @endif
</div>