<main x-data>
    {{-- @ Navigator --}}
    <section class="flex mt-5 items-center justify-between gap-5 flex-wrap">
        <x-text-input  
            wireModel="inviteFilter" 
            type="text" 
            icon="search" 
            placeholder="Buscar código..." 
        />

        @if(Auth::user()->role->name == 'Profesor')  
            <x-button wireClick="$set('generating', true)" icon="link" content="Generar enlace" />
        @endif
    </section>

    {{-- @ Invites displaying --}}
    <div class="relative overflow-x-auto mt-10">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Código
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rol
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Usos restantes
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de creación
                    </th>
                </tr> 
            </thead>

            <tbody>
                @foreach ($this->invites as $invite)
                    <tr class="bg-white border-b">
                        <td class="py-4 text-ellipsis truncate pl-5">
                            {{ $invite['id'] }}
                        </td>

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-ellipsis truncate">
                            {{ $invite['code'] }}
                        </th>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $invite->role ? $invite->role->name : null }}
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $invite['usages'] }}
                        </td>
                        <td class="px-6 py-4 text-ellipsis truncate">
                            {{ $invite['created_at']->diffForHumans() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            {{ $this->invites->links() }}
        </div>
    </div>  

    {{-- @ Generating --}}
    <x-modal wire:model="generating" styles="flex flex-col gap-3">
        @error('linkUsages')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <x-labeled-input 
            label="Cantidad de usos" 
            wireModel="linkUsages" 
            type="number"
            icon="sync"
            numeric="true"
            placeholder="..."
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

        @error('role')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror

        <x-selector 
            wireModel="role" 
            label="Rol"
            :options="$options"
        />
        
        <x-button wireClick="generateLink" styles="justify-center" content="Generar enlace" />
    </x-modal>
</main>