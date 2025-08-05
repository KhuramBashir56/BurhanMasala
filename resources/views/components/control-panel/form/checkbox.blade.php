@props(['label', 'for', 'color' => 'primary'])

@php
    $colors = [
        'primary' => 'accent-primary-500',
        'secondary' => 'accent-secondary-500',
        'danger' => 'accent-red-500',
        'success' => 'accent-green-500',
        'warning' => 'accent-yellow-500',
        'info' => 'accent-blue-500',
    ];

    $classes = 'size-5 cursor-pointer rounded form-checkbox ' . ($errors->has($for) ? 'border-red-600 focus:ring-red-500' : $colors[$color]);
@endphp

<label for="{{ $for }}" class="flex items-center gap-1 w-fit relative">
    <input type="checkbox" id="{{ $for }}" name="{{ $for }}" {{ $attributes->merge(['class' => $classes]) }}>
    <span class="text-black dark:text-gray-300">
        {{ $label ?? $slot }}
    </span>
    @error($for)
        <x-control-panel.form.error-message :message="$message" class="absolute top-full" />
    @enderror
</label>
