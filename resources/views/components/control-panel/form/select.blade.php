@props(['for', 'title' => null])

@php
    $baseClasses = 'block w-full px-3 py-[9.25px] rounded-md bg-white dark:bg-secondary-800 text-black dark:text-white outline-none focus:ring appearance-none';
    $colorClasses = 'border border-secondary-600 focus:border-primary-500 focus:ring-2 focus:ring-primary-500 dark:focus:ring-primary-500';
    $errorClasses = 'border-2 border-red-600 dark:border-red-500 focus:ring-red-600';
@endphp

<select {{ $attributes->merge([
    'class' => $baseClasses . ' ' . ($errors->has($for) ? $errorClasses : $colorClasses),
    'id' => $for,
    'name' => $for,
]) }}>
    @if ($title)
        <x-control-panel.form.option content="{{ __(' -- ' . $title . ' -- ') }}" value="" selected class="cursor-not-allowed" />
    @endif
    {{ $slot }}
</select>
