@props(['for', 'title' => null])

@php
    $baseClasses = 'block w-full bg-white dark:bg-gray-800 text-black dark:text-white form-input rounded-md';
    $colorClasses = 'border-gray-600 focus:border-primary-500 focus:ring-primary-500 dark:border-gray400 dark:focus:border-primary-500 dark:focus:ring-primary-500';
    $errorClasses = 'border-2 border-red-600 dark:border-red-500 ring-red-600 focus:border-red-600 focus:ring-red-600';
@endphp

<select {{ $attributes->merge([
    'class' => $baseClasses . ' ' . ($errors->has($for) ? $errorClasses : $colorClasses),
    'id' => $for,
    'name' => $for,
]) }}>
    @if ($title)
        <x-ui.form.option :content="__(' -- ' . $title . ' -- ')" value="" selected class="cursor-not-allowed" />
    @endif
    {{ $slot }}
</select>
