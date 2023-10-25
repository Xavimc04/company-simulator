<main x-data>
    {{-- @ Navigator --}}
    <section class="flex mt-5 items-center justify-between gap-5 flex-wrap">
        <x-text-input  
            wireModel="userFilter" 
            type="text" 
            icon="search" 
            placeholder="Buscar usuario..." 
        />

        <x-button wireClick="inviteContact" icon="add" content="Enviar invitación" />
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
                        <td class="px-6 py-4 gap-5 flex items-center justify-end">
                            @if ($user->status == 'pending')
                                <span wire:click="accept('{{ $user['id'] }}')" class="material-symbols-outlined hover:text-blue-500 transition-all cursor-pointer">done</span>
                            @endif

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

    {{-- @ Inviting --}}
    <x-modal wire:model="inviting" styles="flex flex-col gap-3">
        <x-labeled-input 
            label="Correo de contacto" 
            wireModel="email" 
            type="text"
            icon="email"
            placeholder="...@gmail.com"
        />

        <?php 
            $options = [];

            foreach ($roles as $value) {
                $options[] = [
                    'value' => $value['id'],
                    'label' => $value['name']
                ]; 
            }
        ?>

        <x-selector 
            wireModel="role" 
            label="Rol"
            :options="$options"
        />
        
        <x-button wireClick="confirmInvite" styles="justify-center" content="Enviar invitación" />
    </x-modal>
</main>