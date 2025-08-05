@props(['for'])

@php
    $baseClasses = 'block w-full bg-white dark:bg-gray-800 text-black dark:text-white form-input rounded-md';
    $colorClasses = 'border-gray-600 focus:border-primary-500 focus:ring-primary-500 dark:border-gray400 dark:focus:border-primary-500 dark:focus:ring-primary-500';
    $errorClasses = 'border-red-600 dark:border-red-500 ring-red-600 focus:border-red-600 focus:ring-red-600';
@endphp

<div class="relative" x-data="{ charCount: 0, maxLength: {{ $for }}.getAttribute('maxlength') }">
    <textarea {{ $attributes->merge([
        'class' => $baseClasses . ' ' . ($errors->has($for) ? $errorClasses : $colorClasses),
        'id' => $for,
        'name' => $for,
        'rows' => 4,
        'spellcheck' => true,
    ]) }} x-ref="textarea" x-on:input="charCount = $refs.textarea.value.length"></textarea>
    <span class="text-xs absolute bottom-1 right-2 text-gray-900 dark:text-gray-200" x-text="maxLength - charCount"></span>
</div>
