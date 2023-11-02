<div>
    <div wire:loading wire:target="image">Subiendo...</div>

    <div class="flex items-center mt-3 justify-center w-full">
        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                @if($image)
                    <img src="{{ $image->temporaryUrl() }}" class="w-20 h-20 mb-5">
                @else
                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                @endif

                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Subir nueva imagen de perfil</span></p>
                <p class="text-xs text-gray-500 pb-5">SVG, PNG, JPG or GIF</p>
            </div>
    
            <input id="dropzone-file" wire:model.live="image" type="file" class="hidden" accept="image/png, image/gif, image/jpeg" />
        </label>
    </div>
</div>
