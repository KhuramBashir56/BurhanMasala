@props(['title', 'color' => 'primary'])

@php
    $baseClasses = 'hover:underline inline-block font-medium hover:transition-colors hover:duration-500';
    $colorClasses = [
        'danger' => 'text-red-700 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600',
        'info' => 'text-blue-700 hover:text-blue-700 dark:text-blue-500 dark:hover:text-blue-600',
        'primary' => 'text-primary-500 hover:text-primary-600 dark:text-primary-500 dark:hover:text-primary-600',
        'secondary' => 'text-secondary-600 hover:text-secondary-500 dark:text-secondary-400 dark:hover:text-secondary-300',
        'success' => 'text-green-700 hover:text-green-700 dark:text-green-500 dark:hover:text-green-600',
        'warning' => 'text-yellow-500 hover:text-yellow-500 dark:text-yellow-500 dark:hover:text-yellow-600',
    ];
@endphp

<a {{ $attributes->merge(['class' => $baseClasses . ' ' . $colorClasses[$color]]) }} title="{{ $title }}">{{ $title }}</a>
