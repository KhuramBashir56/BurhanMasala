@props(['title'])
<div {{ $attributes->merge(['class' => 'relative p-4 dark:border-b dark:border-gray-500  bg-primary-500 dark:bg-gray-800 rounded-t-lg']) }}>
    <h2 class="text-white text-lg font-semibold">{{ $title }}</h2>
    {{ $slot }}
</div>
