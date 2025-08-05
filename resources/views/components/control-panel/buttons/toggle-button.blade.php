@props(['title', 'status' => false, 'color' => 'primary'])

@php
    $baseClasses = 'relative w-[52px] h-7 peer-focus:outline-none peer-focus:ring-4 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full after:content-[\'\'] after:absolute after:top-[4px] after:start-[6px] after:border after:rounded-full after:h-5 after:w-5 after:transition-all bg-gray-300 dark:bg-gray-600 peer-checked:after:border-white after:bg-white after:border-gray-300 dark:border-gray-600';
    $colorClasses = [
        'primary' => 'peer-checked:bg-primary-500  dark:peer-checked:bg-primary-500',
        'secondary' => 'peer-checked:bg-gray-700 dark:peer-checked:bg-gray-700',
        'danger' => 'peer-checked:bg-red-600',
        'success' => 'peer-checked:bg-green-600',
        'warning' => 'peer-checked:bg-yellow-600',
        'info' => 'peer-checked:bg-blue-600',
    ];
@endphp

<label class="inline-flex items-center cursor-pointer" title="{{ $title }}" wire:loading.attr="disabled" wire:offline.attr="disabled">
    <input type="checkbox" {{ $status ? 'checked' : '' }} value="" {{ $attributes->merge(['class' => 'sr-only hidden peer']) }} wire:loading.attr="disabled" wire:offline.attr="disabled">
    <div class="{{ $baseClasses . ' ' . $colorClasses[$color] }}"></div>
</label>
