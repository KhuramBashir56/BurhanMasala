@props(['target' => null])

<button {{ $attributes->merge(['class' => 'flex absolute right-5 top-4 items-center justify-center ms-2 text-sm text-primary-100 dark:text-gray-600 hover:text-white dark:hover:text-gray-100 bg-transparent hover:transition-colors hover:duration-500 cursor-pointer']) }} type="button" title="Close" wire:loading.attr="disabled" type="button">
    <svg wire:loading.remove wire:target="{{ $target }}" xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 -960 960 960" fill="currentColor">
        <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
    </svg>
    <svg wire:loading wire:target="{{ $target }}" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="size-6 animate-spin inline-flex" viewBox="0 -960 960 960" fill="currentColor">
        <path d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-155.5t86-127Q252-817 325-848.5T480-880q17 0 28.5 11.5T520-840q0 17-11.5 28.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160q133 0 226.5-93.5T800-480q0-17 11.5-28.5T840-520q17 0 28.5 11.5T880-480q0 82-31.5 155t-86 127.5q-54.5 54.5-127 86T480-80Z" />
    </svg>
</button>
