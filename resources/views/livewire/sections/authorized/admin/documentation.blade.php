<div 
    class="flex-1 h-screen flex" 
>
    {{-- @ Mobile announce --}}
    <section class="flex md:hidden flex-1 flex items-center justify-center px-10 text-center">
        Es necesaria una resolución más grande para poder acceder a este módulo.
    </section>

    {{-- @ Folder architecture --}}
    <aside class="overflow-y-scroll w-[300px] hidden md:flex transition-all flex-col bg-white p-5 border-r">
        {{-- @ Header --}}
        <section class="flex flex-col gap-2">
            <h1 class="text-xl font-extrabold text-blue-500">
                Documentación
            </h1>

            <small>
                Gestiona toda la documentación del aplicativo.
            </small>
        </section>

        {{-- @ Files & Folders --}}
        <section class="flex flex-col mt-10 gap-3 flex-1 select-none">
            @foreach ($folders as $folder)
                <div wire:click="addDirectory('{{ basename($folder) }}')" class="flex gap-3 items-center text-sm cursor-pointer">
                    <span class="material-symbols-outlined text-sm">
                        folder
                    </span>

                    {{ basename($folder) }}
                </div>
            @endforeach

            @foreach ($files as $file)
                <div wire:click="openFile('{{ basename($file) }}')" class="flex gap-3 items-center text-sm cursor-pointer">
                    <span class="material-symbols-outlined text-sm">
                        description
                    </span>

                    {{ basename($file) }}
                </div>
            @endforeach
        </section>  

        {{-- @ Buttons --}}
        <section class="flex flex-col mt-5 gap-3">
            <x-button 
                wireClick="$set('creatingFolder', true)" 
                icon="folder" 
                styles="py-0 text-sm"
                content="Nueva carpeta" 
            />

            <x-button 
                wireClick="$set('creatingFile', true)" 
                icon="description" 
                styles="py-0 text-sm"
                content="Nuevo archivo" 
            /> 
        </section>
    </aside>

    {{-- @ File management --}}
    <main class="bg-gray-50 flex-1 hidden md:flex transition-all flex-col p-5">
        <section class="select-none flex items-center">
            @php
                $directories = [
                    "Inicio"
                ]; 

                foreach (explode('/', $directory) as $dir) {
                    if ($dir) {
                        $directories[] = $dir;
                    }
                }
            @endphp

            @foreach ($directories as $dir)
                <span class="cursor-pointer text-sm" wire:click="setDirectory('{{ $dir }}')">
                    {{ $dir }}
                </span>

                @if (!$loop->last)
                    <span class="material-symbols-outlined">
                        chevron_right
                    </span>
                @endif
            @endforeach

            @if ($fileView)
                <div wire:click="saveFileContent" class="flex flex-1 justify-end">
                    <button>Guardar</button>
                </div>
            @endif
        </section>

        <section class="flex-1 flex flex-col mt-5 relative">
            @if (!$fileView)
                <div class="h-full bg-gray-50 flex-1 w-full border border-gray-50 flex items-center justify-center gap-3">
                    <span class="material-symbols-outlined">
                        description
                    </span>
        
                    Selecciona un archivo
                </div>
            @else 
                <textarea wire:model.live="fileContent" class="block flex-1 w-full bg-white rounded-md border-gray-300 shadow-sm p-5 resize-none"></textarea>
            @endif
        </section>
    </main>

    {{-- @ Create folder --}}
    <x-modal wire:model="creatingFolder" styles="flex flex-col gap-2">
        @error('folderName')
            <span class="text-red-500 text-sm">
                {{ $message }}
            </span>
        @enderror

        <x-labeled-input 
            label="Nombre de la carpeta" 
            wireModel="folderName" 
            type="text"
            icon="folder"
            placeholder="{{ $directory }}.."
        />

        <x-button 
            wireClick="createFolder" 
            styles="w-full mt-3 flex items-center justify-center" 
            content="Confirmar" 
        /> 
    </x-modal>

    {{-- @ Create file --}}
    <x-modal wire:model="creatingFile" styles="flex flex-col gap-2">
        @error('fileName')
            <span class="text-red-500 text-sm">
                {{ $message }}
            </span>
        @enderror

        <x-labeled-input 
            label="Nombre del archivo" 
            wireModel="fileName" 
            type="text"
            icon="description"
            placeholder="{{ $directory }}.."
        />

        <x-button 
            wireClick="createFile" 
            styles="w-full mt-3 flex items-center justify-center" 
            content="Confirmar" 
        />
    </x-modal>
</div>
