@props(['title', 'active'])

<a wire:navigate {{ $attributes->merge(['class' => 'w-full flex items-center gap-2 px-2 py-1.5 hover:transition-colors hover:duration-500 active:bg-primary-300 dark:active:bg-secondary-500 last:border-b border-primary-300 dark:border-secondary-700 ' . (request()->routeIs(explode(' ', $active)) ? 'text-primary-500 bg-secondary-200 dark:bg-secondary-950' : 'hover:bg-primary-600 hover:dark:bg-secondary-700')]) }} title="{{ $title }}">
    {{ $slot }}
    <span>{{ $title }}</span>
</a>
