@props(['title', 'icon', 'color' => 'primary', 'target' => null])

@php
    $baseClasses = 'whitespace-nowrap flex justify-center items-center rounded-md p-1 font-medium tracking-wide transition text-center border focus-visible:outline-2 focus-visible:outline-offset-2 active:outline-offset-0 hover:opacity-75 active:opacity-100 disabled:opacity-75 rounded-md cursor-pointer capitalize';
    $colorClasses = [
        'danger' => 'bg-red-500 border-red-500 text-white focus-visible:outline-red-500 dark:bg-red-500 dark:border-red-500 dark:text-white dark:focus-visible:outline-red-500',
        'dark' => 'bg-neutral-50 border-neutral-50 text-neutral-900 focus-visible:outline-neutral-50 dark:bg-neutral-900 dark:border-neutral-900 dark:text-white dark:focus-visible:outline-neutral-900',
        'info' => 'bg-sky-500 border-sky-500 text-white focus-visible:outline-sky-500 dark:bg-sky-500 dark:border-sky-500 dark:text-white dark:focus-visible:outline-sky-500',
        'light' => 'bg-neutral-950 border-neutral-950 text-neutral-300 focus-visible:outline-neutral-950 dark:bg-white dark:border-white dark:text-neutral-600 dark:focus-visible:outline-white',
        'secondary' => 'bg-neutral-800 border-neutral-800 text-white focus-visible:outline-neutral-800 dark:bg-neutral-300 dark:border-neutral-300 dark:text-black dark:focus-visible:outline-neutral-300',
        'primary' => 'bg-primary-500 border-primary-500 text-white focus-visible:outline-primary-500 dark:bg-primary-500 dark:border-primary-500 dark:text-white dark:focus-visible:outline-primary-500',
        'success' => 'bg-green-500 border-green-500 text-white focus-visible:outline-green-500 dark:bg-green-500 dark:border-green-500 dark:text-white dark:focus-visible:outline-green-500',
        'warning' => 'bg-amber-500 border-amber-500 text-white focus-visible:outline-amber-500 dark:bg-amber-500 dark:border-amber-500 dark:text-white dark:focus-visible:outline-amber-500',
    ];
@endphp

<button {{ $attributes->merge(['class' => $baseClasses . ' ' . $colorClasses[$color], 'title' => $title]) }} wire:loading.attr="disabled" wire:offline.attr="disabled">
    <span wire:loading.remove wire:target="{{ $target }}">{{ $slot }}</span>
    <svg wire:loading wire:target="{{ $target }}" style="display: none;" xmlns="http://www.w3.org/2000/svg" class="size-6 animate-spin inline-flex" viewBox="0 -960 960 960" fill="currentColor">
        <path d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-155.5t86-127Q252-817 325-848.5T480-880q17 0 28.5 11.5T520-840q0 17-11.5 28.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160q133 0 226.5-93.5T800-480q0-17 11.5-28.5T840-520q17 0 28.5 11.5T880-480q0 82-31.5 155t-86 127.5q-54.5 54.5-127 86T480-80Z" />
    </svg>
</button>
