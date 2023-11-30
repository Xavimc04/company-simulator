<div>
    {{-- @ Navigator --}}
    <section class="flex mt-5 items-center justify-between gap-5 flex-wrap">
        <x-text-input  
            wireModel="filter" 
            type="text" 
            icon="search" 
            placeholder="Buscar comunicado..." 
        />

        <?php 
            $options = [];

            foreach ($states as $key => $value) {
                $options[] = [
                    'value' => $key,
                    'label' => $value
                ]; 
            }
        ?>

        <x-selector 
            wireModel="statusFilter"
            styles=""
            :options="$options"
        />

        <x-button wireClick="openModal" icon="campaign" content="Crear comunicado" /> 
    </section>

    {{-- @ Announcement display --}}
    <div class="relative overflow-x-auto mt-10">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prioridad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th> 
                    <th scope="col" class="px-6 py-3">
                        Contenido
                    </th> 
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th> 
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>  
                    <th scope="col" class="px-6 py-3">
                        Fijado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de creación
                    </th> 
                    <th scope="col" class="px-6 py-3"></th> 
                </tr> 
            </thead>

            <tbody>
                @foreach ($this->announcements as $announcement)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 w-[70px] whitespace-nowrap text-ellipsis truncate">
                            {{ $announcement['id'] }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 w-[200px] whitespace-nowrap text-ellipsis truncate">
                            @if($announcement['level'] == 0) 
                                <span class="text-gray-500 border border-gray-500 bg-gray-100 px-3 py-1 rounded-md">{{ $levels[$announcement['level']] }}</span>
                            @elseif($announcement['level'] == 1)
                                <span class="text-orange-500 border border-orange-500 bg-orange-100 px-3 py-1 rounded-md">{{ $levels[$announcement['level']] }}</span>
                            @elseif($announcement['level'] == 2)
                                <span class="text-red-500 border border-red-500 bg-red-100 px-3 py-1 rounded-md">{{ $levels[$announcement['level']] }}</span>
                            @endif
                        </th> 
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 max-w-[150px] whitespace-nowrap text-ellipsis truncate">
                            {{ $announcement['title'] }}
                        </th> 
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 max-w-[300px] text-ellipsis truncate">
                            {{ $announcement['content'] }}
                        </th> 
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 w-[200px] whitespace-nowrap text-ellipsis truncate">
                            {{ $announcement['user_id'] ? $announcement->user->name : '' }}
                        </th> 
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 w-[200px] whitespace-nowrap text-ellipsis truncate">
                            @if($announcement['status'] == 'draft') 
                                <span class="text-indigo-500 border border-indigo-500 bg-indigo-100 px-3 py-1 rounded-md">{{ $states[$announcement['status']] }}</span>
                            @elseif($announcement['status'] == 'published')
                                <span class="text-green-500 border border-green-500 bg-green-100 px-3 py-1 rounded-md">{{ $states[$announcement['status']] }}</span>
                            @elseif($announcement['status'] == 'archived')
                                <span class="text-yellow-500 border border-yellow-500 bg-yellow-100 px-3 py-1 rounded-md">{{ $states[$announcement['status']] }}</span>
                            @endif
                        </th>
                        <th scope="row" wire:click="toggleFix({{ $announcement['id'] }})" class="px-6 py-4 text-gray-900 cursor-pointer font-medium w-[50px] whitespace-nowrap text-ellipsis truncate"> 
                            @if($announcement['fixed']) 
                                Fijado
                            @else 
                                <span class="text-gray-500">No fijado</span>
                            @endif
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 w-[200px] whitespace-nowrap text-ellipsis truncate">
                            {{ $announcement['created_at']->diffForHumans() }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 w-[200px] flex items-center justify-end gap-3 whitespace-nowrap text-ellipsis truncate">
                            <x-button 
                                wireClick="setState({{ $announcement['id'] }}, '{{ $announcement['status'] == 'published' ? 'archived' : 'published' }}')" 
                                icon="{{ $announcement['status'] == 'published' ? 'bookmark' : 'campaign' }}" 
                                styles="py-0 py-1 bg-gray-400 hover:bg-gray-700"
                                content="{{ $announcement['status'] == 'published' ? 'Archivar' : 'Publicar' }}" 
                            />
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            {{ $this->announcements->links() }}
        </div>
    </div>

    {{-- @ Create announcement --}}
    <x-modal wire:model="creating" styles="flex flex-col gap-3">
        @error('title') 
            <span class="text-red-500 text-sm">{{ $message }}</span> 
        @enderror

        <x-labeled-input 
            label="Título" 
            wireModel="title" 
            type="text"
            icon="title"
        />

        <?php 
            $options = [];

            foreach ($levels as $key => $value) {
                $options[] = [
                    'value' => $key,
                    'label' => $value
                ]; 
            }
        ?>

        @error('level') 
            <span class="text-red-500 text-sm">{{ $message }}</span> 
        @enderror

        <x-selector 
            wireModel="level"
            label="Prioridad"
            :options="$options"
        />

        @error('content') 
            <span class="text-red-500 text-sm">{{ $message }}</span> 
        @enderror

        <textarea wire:model.live="content" class="border border-black transition-all w-full flex-1 mt-2 rounded p-2.5 min-h-[150px] max-h-[300px]"></textarea>
        
        <section class="flex items-center w-full gap-3">
            <x-button wireClick="create('draft')" styles="flex items-center justify-center flex-1 bg-gray-400 hover:bg-gray-700" content="Guardar borrador" /> 
            <x-button wireClick="create('published')" styles="flex items-center justify-center flex-1" content="Publicar" /> 
        </section>
    </x-modal>
</div>
