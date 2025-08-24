<div class="w-full space-y-4">
    @can('view-customers-list')
        <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.customer-profile', ['customer' => $customer->id]) }}" title="Go Back" class="w-fit" />
    @endcan
    <livewire:control-panel.components.block-account :user="$customer->user->id" />
</div>
