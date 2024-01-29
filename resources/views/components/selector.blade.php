<div class="flex flex-col gap-2">
    @if (isset($label))
        <label class="text-sm text-gray-500">{{ $label }}</label>
    @endif

    <div class="flex items-center bg-white gap-3 border border-black transition-all w-full flex-1 rounded px-3 {{ $styles ?? false ? $styles : '' }}">
        <x-icon label="expand_more" />
    
        <select wire:model.live="{{ $wireModel }}" class="flex-1 py-2.5 bg-transparent text-black appearance-none">
            <option value=""></option>

            @foreach ($options as $value)
                <option value="{{ $value['value'] }}">{{ $value['label'] }}</option>
            @endforeach
        </select>
    </div>
</div>