@props(['for', 'size' => 'w-full h-full', 'description' => null])

@php
    $baseClasses = 'flex flex-col items-center justify-center w-full h-full bg-white dark:bg-gray-800 border-2 border-dashed rounded-lg cursor-pointer hover:transition-colors hover:duration-500 relative overflow-hidden';
    $colorClasses = 'border-gray-600 dark:border-gray-600 hover:border-primary-500 dark:border-gray-400 dark:hover:border-primary-500';
    $errorClasses = 'border-red-600 dark:border-red-500 hover:border-red-600';
@endphp

<div class="{{ $size }} relative">
    <label for="{{ $for }}" class="{{ $baseClasses . ' ' . ($errors->has($for) ? $errorClasses : $colorClasses) }}" for="{{ $for }}" x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false , progress = 0" x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
        <div class="w-full h-full absolute z-20">
            {{ $slot }}
        </div>
        <div class="w-full bg-gray-200 dark:bg-gray-700 absolute bottom-0 z-30" x-show="uploading" style="display: none;">
            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none" x-bind:style="'width: ' + progress + '%'" x-text="progress + '%'"></div>
        </div>
        <div class="flex flex-col items-center justify-center p-2 text-gray-400 dark:text-gray-500 bg-transparent text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-10" viewBox="0 -960 960 960" fill="currentColor">
                <path d="M260-160q-91 0-155.5-63T40-377q0-78 47-139t123-78q25-92 100-149t170-57q117 0 198.5 81.5T760-520q69 8 114.5 59.5T920-340q0 75-52.5 127.5T740-160H520q-33 0-56.5-23.5T440-240v-206l-64 62-56-56 160-160 160 160-56 56-64-62v206h220q42 0 71-29t29-71q0-42-29-71t-71-29h-60v-80q0-83-58.5-141.5T480-720q-83 0-141.5 58.5T280-520h-20q-58 0-99 41t-41 99q0 58 41 99t99 41h100v80H260Zm220-280Z" />
            </svg>
            <span class="font-semibold leading-5">Click to upload or drag and drop hear.</span>
            <p class="text-xs">{{ $description }}</p>
        </div>
        <input type="file" name="{{ $for }}" id="{{ $for }}" {{ $attributes->merge(['class' => 'hidden']) }} wire:loading.attr="disabled" />
    </label>
    @error($for)
        <x-control-panel.form.error-message :message="$message" class="absolute left-0 top-full" />
    @enderror
</div>
