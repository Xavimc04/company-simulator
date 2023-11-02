<div class="flex flex-col gap-2">
    <label class="text-sm text-gray-500">{{ $label }}</label>

    <x-text-input
        wireModel="{{ $wireModel }}"
        type="{{ $type }}" 
        icon="{{ $icon }}" 
        disabled="{{ $disabled ?? false ? $disabled : 'false' }}"
        placeholder="{{ $placeholder ?? false ? $placeholder : '' }}" 
    />
</div>