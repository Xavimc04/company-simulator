<main>
    @php
        use App\Models\Company;
    @endphp

    <div wire:click="$set('switching', true)" class="px-3 py-2 rounded-md flex items-center flex-row gap-3 text-sm cursor-pointer">
        <span class="material-symbols-outlined text-blue-500">
            expand_more
        </span>

        <div class="flex flex-col gap-1">
            @if ($selected_company && Company::find($selected_company))
                @php
                    $company = Company::find($selected_company);
                @endphp

                {{ $company->name }}

                <small class="text-gray-500">
                    {{ $company->social_denomination }}
                </small>
            @else 
                Seleccionar empresa
            @endif
        </div>
    </div>

    {{-- @ Switch between company --}}
    <x-modal wire:model="switching" styles="flex flex-col gap-3">  
        <?php 
            $options = [];

            foreach(Auth::user()->companies as $company) { 
                $options[$company->id] = [
                    'label' => $company->company->name,
                    'value' => $company->company->id
                ];
            }
        ?>

        <x-selector 
            wireModel="selected_company" 
            label="Seleccionar empresa"
            :options="$options"
        />

        <x-button wireClick="confirm" styles="justify-center" content="Seleccionar" /> 
    </x-modal>
</main>
