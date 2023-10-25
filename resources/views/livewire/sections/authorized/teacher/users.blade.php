<main x-data>
    {{-- @ Navigator --}}
    <section class="flex mt-5 items-center justify-between gap-5 flex-wrap">
        CAMBIAR ESTE FILTRO A COMPONENTE TEXT INPUT
        <div class="flex items-center bg-white gap-3 border border-black transition-all w-full flex-1 rounded px-3">
            <x-icon label="search" />

            <input wire:model.live="userFilter" type="text" class="flex-1 py-2 bg-transparent text-black" placeholder="Nombre, e.g Xavier Morell" />
        </div>   

        <x-button wireClick="handleCreateModal" icon="add" content="Nuevo usuario" />
    </section>

    {{-- @ User displaying --}}
    <div class="relative overflow-x-auto mt-10">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rol
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de alta
                    </th>
                    <th scope="col" class="px-6 py-3" />
                </tr> 
            </thead>

            <tbody>
                @foreach ($this->users as $user)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-ellipsis truncate">
                            {{ $user['id'] }}
                        </th>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $user['name'] }}
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $user['email'] }}
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $user->role ? $user->role->name : null }}
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $user['created_at'] }}
                        </td>
                        <td class="px-6 py-4 flex items-center justify-end">
                            <span wire:click="delete('{{ $user['id'] }}')" class="material-symbols-outlined hover:text-blue-500 transition-all cursor-pointer">delete</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            {{ $this->users->links() }}
        </div>
    </div>  

    {{-- @ Delete --}}
    <x-modal wire:model="deleting" styles="flex flex-col gap-5">
        <h2>¿Estás seguro de que quieres borrar este usuario?</h2>

        <div class="flex items-center gap-5 w-full"> 
            <x-button wireClick="delete('{{ $deleting }}')" styles="w-[50%]" content="Si, estoy seguro" />
            <x-button wireClick="$set('deleting', false)" content="No, cancelar" styles="bg-black hover:bg-black w-[50%]" />
        </div>
    </x-modal>

    {{-- @ Create new user --}}
    <x-modal wire:model="creating" styles="flex flex-col gap-5">
        <x-labeled-input 
            label="Nombre de usuario" 
            wireModel="name" 
            type="text"
            icon="person"
            placeholder="e.g Xavier Morell"
        />

        <x-labeled-input 
            label="Dirección de correo" 
            wireModel="email" 
            type="email"
            icon="email"
            placeholder="...@gmail.com"
        />

        <x-labeled-input 
            label="Contraseña" 
            wireModel="password" 
            type="password"
            icon="key"
            placeholder="***"
        />

        <x-labeled-input 
            label="Confirmación de contraseña" 
            wireModel="password_confirmation" 
            type="password"
            icon="key"
            placeholder="***"
        />

        <?php 
            $options = []; 

            foreach ($roles as $value) {
                $options[] = [
                    'value' => $value->id,
                    'label' => $value->name
                ];
            }
        ?>

        <x-selector 
            wireModel="role" 
            label="Rol de Usuario"
            :options="$options"
        />

        <x-button wireClick="createUser" styles="justify-center" content="Confirmar alta" />
    </x-modal>
</main>