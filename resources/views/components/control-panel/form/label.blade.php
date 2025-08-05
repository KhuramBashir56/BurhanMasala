@props(['label', 'for'])

<label {{ $attributes->merge(['class' => 'block w-full text-md relative']) }} x-data="{ isRequired: false }" x-init="isRequired = $el.querySelector('input, select, textarea')?.hasAttribute('required')">
    <span class="flex items-center gap-1 mb-1">
        <span>{{ $label }}</span>
        <span class="text-xs mt-1 text-gray-600 dark:text-gray-400" x-text="isRequired ? '(Required)': '(Optional)'"></span>
    </span>
    {{ $slot }}
    @error($for)
        <x-control-panel.form.error-message :message="$message" class="absolute top-full" />
    @enderror
</label>
