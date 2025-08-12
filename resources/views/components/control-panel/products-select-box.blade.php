@props(['products' => []])

<div {{ $attributes->merge(['class' => 'w-full relative']) }} x-data="{ dropdown: false }">
    <x-ui.form.label title="Product Name" for="product_id" x-on:click="dropdown = !dropdown" x-on:click.away="dropdown = false">
        <x-ui.form.input type="search" wire:model.live.debounce.500ms="product" for="product_id" required autocomplete="off" placeholder="Product Name" />
    </x-ui.form.label>
    <div class="absolute inset-0 z-10 top-full h-80 max-h-sm overflow-y-scroll" x-show="dropdown">
        <ul class="bg-white shadow-lg dark:bg-gray-800 divide-y">
            @forelse ($products as $product)
                <li wire:key="product-{{ $product->id }}" wire:click="selectProduct({{ $product->id }})" class="py-2.5 px-3 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">{{ $product->label }}</li>
            @empty
                <li class="py-2.5 px-3 cursor-not-allowed">Product Not Found...</li>
            @endforelse
        </ul>
    </div>
</div>
