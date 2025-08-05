@props(['title' => null, 'description' => null])

<div {{ $attributes->merge(['class' => 'w-full flex justify-between items-center border-b-2 border-primary-500 dark:border-gray-700']) }}>
    <div class="flex flex-col w-full">
        <h3 class="text-lg mb-1 leading-5 font-medium">{{ $title }}</h3>
        @if ($description)
            <p class="text-sm text-gray-500 mb-1 dark:text-gray-400">{{ $description }}</p>
        @endif
    </div>
    {{ $slot }}
</div>
