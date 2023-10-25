<div class="flex flex-col gap-2">
    <label class="text-sm text-gray-500">{{ $label }}</label>

    <div wire:model="{{ $wireModel }}" class="flex items-center bg-white gap-3 border border-black transition-all w-full flex-1 rounded px-3 {{ $styles ?? false ? $styles : '' }}">
        <x-icon label="expand_more" />
    
        <select class="flex-1 py-2.5 bg-transparent text-black">
            <option value=""></option>

            @foreach ($options as $value)
                <option value="{{ $value['value'] }}">{{ $value['label'] }}</option>
            @endforeach
        </select>
    </div>
</div>