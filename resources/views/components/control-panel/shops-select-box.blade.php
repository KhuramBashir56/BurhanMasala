@props(['shops' => []])

<div class="w-full relative sm:col-span-2" x-data="{ dropdown: false }">
    <x-ui.form.label title="Sales Man Name" for="shop_id" x-on:click="dropdown = !dropdown" x-on:click.away="dropdown = false">
        <x-ui.form.input type="search" wire:model.live.debounce.500ms="shop" for="shop_id" required autocomplete="off" placeholder="Product Name" />
    </x-ui.form.label>
    <div class="absolute inset-0 z-10 top-full h-screen max-h-4xs overflow-y-auto" x-show="dropdown">
        <ul class="bg-white shadow-lg dark:bg-gray-800 divide-y">
            @forelse ($shops as $shop)
                <li wire:key="shop-{{ $shop->id }}" wire:click="selectShop({{ $shop->id }})" class="py-2.5 px-3 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">{{ $shop->name . ' - ' . $shop->near_by . ', ' . $shop->street . ', ' . $shop->address . ', ' . $shop->market->name }}</li>
            @empty
                <li class="py-2.5 px-3 cursor-not-allowed">Shops Not Found...</li>
            @endforelse
        </ul>
    </div>
</div>
