<main>
    {{-- @ Navigator --}}
    <section class="flex mt-5 items-center justify-between gap-5 flex-wrap">
        <x-text-input
            wireModel="userFilter" 
            type="text" 
            icon="person" 
            placeholder="Nombre, e.g Xavier Morell" 
        />

        <x-button wireClick="handleCreateModal" icon="add" content="Nuevo usuario" />
    </section>

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
                @foreach ($users as $user)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $user['id'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user['name'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user['email'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->role ? $user->role->name : null }}
                        </td>
                        <td class="px-6 py-4">
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
            {{ $users->links() }}
        </div>
    </div>

    {{-- @ Delete --}}
    <x-modal wire:model.defer="deleting" styles="flex flex-col gap-5">
        <h2>¿Estás seguro de que quieres borrar este usuario?</h2>

        <div class="flex items-center gap-5 w-full"> 
            <x-button wireClick="delete('{{ $deleting }}')" styles="w-[50%]" content="Si, estoy seguro" />
            <x-button wireClick="$set('deleting', false)" content="No, cancelar" styles="bg-black hover:bg-black w-[50%]" />
        </div>
    </x-modal>

    {{-- @ Create new user --}}
    <x-modal wire:model.defer="creating" styles="flex flex-col gap-5">
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
            :options="$options"
        />

        <x-button wireClick="createUser" styles="justify-center" content="Confirmar alta" />
    </x-modal>
</main>