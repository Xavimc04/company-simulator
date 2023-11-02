<div class="flex items-center bg-white gap-3 border border-black transition-all w-full flex-1 rounded px-3 {{ $styles ?? false ? $styles : '' }}">
    @if ($icon ?? false)
        <x-icon label="{{ $icon }}" />
    @endif

    <input @if ($wireModel ?? false)
        wire:model.live="{{ $wireModel }}"
    @endif value="{{ $value ?? false ? $value : '' }}" @if ($disabled ?? false)
        disabled
    @endif type="{{ $type ?? false ? $type : 'text' }}" class="flex-1 py-2 bg-transparent text-black" placeholder="{{ $placeholder ?? false ? $placeholder : '' }}" />
</div>
