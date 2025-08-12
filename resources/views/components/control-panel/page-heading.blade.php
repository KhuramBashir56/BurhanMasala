@props(['title', 'subtitle' => null])

<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <h3 class="font-bold text-xl leading-5 text-gray-950 dark:text-gray-200">{{ $title }}</h3>
    @if ($subtitle)
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $subtitle }}</p>
    @endif
</div>
