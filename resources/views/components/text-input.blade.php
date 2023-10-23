<div class="flex items-center bg-white gap-3 border border-black transition-all w-full flex-1 rounded px-3 {{ $styles ?? false ? $styles : '' }}">
    @if ($icon ?? false)
        <x-icon label="{{ $icon }}" />
    @endif

    <input wire:model="{{ $wireModel }}" type="{{ $type ?? false ? $type : 'text' }}" class="flex-1 py-2 bg-transparent text-black" placeholder="{{ $placeholder ?? false ? $placeholder : '' }}" />
</div>
