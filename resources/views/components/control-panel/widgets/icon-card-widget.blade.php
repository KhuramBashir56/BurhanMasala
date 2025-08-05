@props(['title', 'value', 'textColor', 'bgColor'])
<div class="flex items-center bg-white dark:bg-gray-700 rounded-sm overflow-hidden shadow hover:scale-x-105 hover:scale-y-110 transition duration-500">
    <div class="p-3 {{ $bgColor }} text-white h-full aspect-square flex justify-center items-center">
        {{ $slot }}
    </div>
    <div class="p-3 text-gray-700 dark:text-gray-100">
        <h3 class="text-sm tracking-wider">{{ $title }}</h3>
        <p class="text-3xl {{ $textColor }}">{{ number_format($value) }}</p>
    </div>
</div>
