@props(['path' => null, 'alt' => 'Thumbnail of Object'])

<div {{ $attributes->merge(['class' => 'w-full aspect-square']) }}>
    <img src="{{ isset($path) ? $path : asset('images/thumbnail.svg') }}" alt="{{ $alt }}" class="w-full h-full object-cover object-left-top bg-200 dark:bg-gray-700">
</div>
