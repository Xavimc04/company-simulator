<div class="flex flex-col gap-2 {{ $styles ?? false ? $styles : '' }}">
    <label class="text-sm text-gray-500">{{ $label }}</label>

    <x-text-input
        wireModel="{{ $wireModel ?? false ? $wireModel : '' }}"
        type="{{ $type }}" 
        icon="{{ $icon }}" 
        value="{{ $value ?? false ? $value : '' }}"
        disabled="{{ $disabled ?? false }}"
        numeric="{{ $numeric ?? false }}"
        placeholder="{{ $placeholder ?? false ? $placeholder : '' }}" 
    />
</div>