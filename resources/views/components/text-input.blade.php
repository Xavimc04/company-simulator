<div wire:model="{{ $wireModel }}" class="flex items-center gap-3 border border-black transition-all w-full rounded px-3 {{ $styles ?? false ? $styles : '' }}">
    @if ($icon ?? false)
        <x-icon label="{{ $icon }}" />
    @endif

    <input type="{{ $type ?? false ? $type : 'text' }}" class="flex-1 py-2 bg-transparent text-black" placeholder="{{ $placeholder ?? false ? $placeholder : '' }}" />
</div>