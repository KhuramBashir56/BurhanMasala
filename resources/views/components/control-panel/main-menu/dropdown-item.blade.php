@props(['title', 'status'])

<a wire:navigate wire:offline.attr="disabled" {{ $attributes->merge(['class' => 'w-full block px-3 py-1.5 hover:transition-colors hover:duration-500 text-primary-500 active:bg-primary-300 dark:active:bg-gray-500 first:border-t border-primary-300 dark:border-gray-700 ' . (request()->routeIs(explode(' ', $status)) ? 'text-primary-500 dark:text-secondary-500 bg-gray-200 dark:bg-slate-950' : 'hover:bg-primary-600 hover:dark:bg-gray-700 text-white'), 'title' => $title]) }}>{{ $title }}</a>
