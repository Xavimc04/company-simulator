<button wire:click="{{ $wireClick }}" class="bg-blue-500 text-white py-2.5 gap-3 hover:bg-blue-700 transition-all px-5 rounded flex items-center {{ $styles ?? false ? $styles : '' }}">
    @if ($icon ?? false)
        <x-icon label="{{ $icon }}" />
    @endif

    {{ $content }}
</button>