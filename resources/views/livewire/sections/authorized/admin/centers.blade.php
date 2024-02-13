<main x-data>
    {{-- @ Navigator --}}
    <section class="flex mt-5 items-center justify-between gap-5 flex-wrap">
        <x-text-input  
            wireModel="centerFilter" 
            type="text" 
            icon="search" 
            placeholder="Buscar centro educativo..." 
        />

        <x-button wireClick="handleCreateModal" icon="add" content="Registrar centro" />
    </section>

    {{-- @ User displaying --}}
    <div class="relative overflow-x-auto mt-10">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Usuarios
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Empresas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contacto
                    </th>
                    <th scope="col" class="px-6 py-3" />
                </tr> 
            </thead>

            <tbody>
                @foreach ($this->centers as $center)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-ellipsis truncate">
                            {{ $center['id'] }}
                        </th>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $center['name'] }}
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $center->users->count() }}
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            Sin empresas
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            @if ($center['status'] == 'active')
                                <span class="text-green-500 lowercase bg-green-100 px-2 py-1 rounded border border-green-500">Activo</span>
                            @else
                                <span class="text-red-500 lowercase bg-red-100 px-2 py-1 rounded border border-red-500">Inactivo</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $center['email'] }}
                        </td>
                        <td class="px-6 py-4 flex items-center justify-end gap-5">
                            <span wire:click="inviteContact('{{ $center['id'] }}')" class="material-symbols-outlined hover:text-blue-500 transition-all cursor-pointer">mail</span>
                            <span wire:click="handleEditModal('{{ $center['id'] }}')" class="material-symbols-outlined hover:text-blue-500 transition-all cursor-pointer">edit</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            {{ $this->centers->links() }}
        </div>
    </div>  

    {{-- @ Inviting --}}
    <x-modal wire:model="inviting" styles="flex flex-col gap-3">
        <x-labeled-input 
            label="Correo de contacto" 
            wireModel="email" 
            type="text"
            icon="email"
            placeholder="...@gmail.com"
        />

        <x-button wireClick="confirmInvite" styles="justify-center" content="Enviar invitación" />
    </x-modal>

    {{-- @ Create new center --}}
    <x-modal wire:model="creating" styles="flex flex-col gap-3">
        @error('name')
            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror

        <x-labeled-input 
            label="Nombre de la empresa" 
            wireModel="name" 
            type="text"
            icon="apartment"
            placeholder="e.g Monlau Group"
        />

        @error('email')
            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror

        <x-labeled-input 
            label="Correo de contacto" 
            wireModel="email" 
            type="text"
            icon="email"
            placeholder="...@gmail.com"
        />

        @error('status')
            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror

        <?php 
            $options = [
                ['value' => 'active', 'label' => 'Activa'],
                ['value' => 'inactive', 'label' => 'Inactiva'],
            ];
        ?>

        <x-selector 
            wireModel="status" 
            label="Estado"
            :options="$options"
        />

        @if ($editing)
            <x-button wireClick="edit" styles="justify-center" content="Guardar cambios" />
        @else
            <x-button wireClick="create" styles="justify-center" content="Confirmar alta" />
        @endif
    </x-modal>
</main>