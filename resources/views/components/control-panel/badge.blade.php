@props(['content', 'color'])

@php
    $baseClasses = 'w-fit inline-flex overflow-hidden rounded-md border text-xs font-medium capitalize whitespace-nowrap';
    $bgClasses = [
        'danger' => 'border-red-500 bg-white text-red-600 dark:border-red-400 dark:bg-gray-900 dark:text-white',
        'dark' => 'border-gray-300 bg-gray-100 text-gray-800 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200',
        'info' => 'border-sky-500 bg-white text-sky-500 dark:border-sky-400 dark:bg-gray-900 dark:text-sky-400',
        'light' => 'border-gray-900 bg-white text-gray-900 dark:border-gray-200 dark:bg-gray-900 dark:text-gray-200',
        'secondary' => 'border-gray-600 bg-white text-gray-600 dark:border-gray-500 dark:bg-gray-900 dark:text-gray-400',
        'primary' => 'bg-black border-black text-neutral-100 focus-visible:outline-black dark:bg-white dark:border-white dark:text-black dark:focus-visible:outline-white',
        'success' => 'border-green-500 bg-white text-green-600 dark:border-green-400 dark:bg-gray-900 dark:text-white',
        'warning' => 'border-amber-500 bg-white text-amber-600 dark:border-amber-400 dark:bg-gray-900 dark:text-white',
    ];
    $textClasses = [
        'danger' => 'bg-red-100 dark:bg-red-900',
        'dark' => 'bg-gray-200 dark:bg-gray-700',
        'info' => 'bg-sky-100 dark:bg-sky-900',
        'light' => 'bg-gray-300 dark:bg-gray-700',
        'secondary' => 'bg-gray-200 dark:bg-gray-700',
        'primary' => 'bg-black border-black text-neutral-100 focus-visible:outline-black dark:bg-white dark:border-white dark:text-black dark:focus-visible:outline-white',
        'success' => 'bg-green-100 dark:bg-green-900',
        'warning' => 'bg-amber-100 dark:bg-amber-900',
    ];
@endphp

<span {{ $attributes->merge(['class' => $baseClasses . ' ' . $bgClasses[$color]]) }}>
    <span class="px-2 py-1 {{ $textClasses[$color] }}">{{ $content . $slot }}</span>
</span>
