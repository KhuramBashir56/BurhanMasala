@props(['for'])

@php
    $baseClasses = 'block w-full px-3 py-1.5 rounded-md bg-white dark:bg-secondary-800 text-black dark:text-white';
    $colorClasses = 'outline-none border border-secondary-600 focus:border-primary-500 focus:ring-2 focus:ring-primary-500 dark:focus:ring-primary-500';
    $errorClasses = 'border-2 border-red-600 dark:border-red-500 focus:ring-red-600';
@endphp

<input id="{{ $for }}" name="{{ $for }}" {{ $attributes->merge([
    'class' => $baseClasses . ' ' . ($errors->has($for) ? $errorClasses : $colorClasses),
]) }} />
