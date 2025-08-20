@props(['placeholder'])

<div {{ $attributes->merge(['class' => 'w-full relative']) }}>
    <x-control-panel.form.input type="search" wire:model.live.debounce.1000ms="searchQuery" wire:keydown.enter="search" for="searchQuery" maxlength="64" autocomplete="off" placeholder="{{ $placeholder }}" class="pe-14" />
    <x-control-panel.buttons.icon-button title="Search" wire:click="search" target="search" class="absolute top-0 right-0 h-full rounded-s-none px-2.5">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 -960 960 960" fill="currentColor">
            <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
        </svg>
    </x-control-panel.buttons.icon-button>
    @error('searchQuery')
        <x-control-panel.form.error-message message="{{ $message }}" class="absolute top-full" />
    @enderror
</div>
