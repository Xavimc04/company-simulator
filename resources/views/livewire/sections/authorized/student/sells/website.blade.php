<main class="w-full p-10 flex h-screen flex-col overflow-y-scroll">
    @php
        use App\Models\Company; 
    @endphp

    <section class="flex gap-3 items-end flex-wrap">
        <x-labeled-input 
            styles="flex-1"
            label="Dirección de la página" 
            type="text"
            wireModel="website"
            icon="public"
        />

        <button wire:click="save" class="mt-5 bg-blue-500 hover:bg-blue-700 transition-all text-white py-2 px-5 rounded">
            Guardar
        </button>
    </section>

    @error('website')
        <p class="text-red-500 text-sm my-2">
            {{ $message }}
        </p>
    @enderror

    @if ($company && $company->website)
        <iframe src="{{ $company->website }}" class="w-full flex-1 mt-7 border"></iframe>
    @else
        <div class="flex-1 bg-gray-100 border flex items-center mt-7 justify-center">
            <h1 class="text-gray-500">
                No has configurado tu página web
            </h1>
        </div>
    @endif
</main>