@props(['name', 'title', 'status', 'icon'])

<div x-data="{ openSection: '{{ request()->routeIs(explode(' ', $status)) ? $name : '' }}' }" class="w-full last:border-b border-primary-300 dark:border-gray-700">
    <button x-on:click="openSection = openSection == '{{ $name }}' ? '': '{{ $name }}'" type="button" class="inline-flex px-3 py-1.5 cursor-pointer items-center justify-between w-full font-semibold text-white hover:bg-primary-600 dark:hover:bg-gray-700 active:bg-primary-300 dark:active:bg-gray-500 hover:transition-colors hover:duration-500">
        <span class="flex items-center gap-2">
            {{ $icon }}
            <span>{{ $title }}</span>
        </span>
        <svg :class="openSection == '{{ $name }}' ? 'rotate-0' : '-rotate-90'" class="transition-transform duration-500 size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor">
            <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
        </svg>
    </button>
    <div x-show="openSection == '{{ $name }}'" x-collapse class="relative" style="display: none;">
        <span class="absolute -top-1.25 left-[23px] h-full border border-white"></span>
        <div class="ps-11 divide-y divide-primary-300 dark:divide-gray-700">
            {{ $slot }}
        </div>
    </div>
</div>
