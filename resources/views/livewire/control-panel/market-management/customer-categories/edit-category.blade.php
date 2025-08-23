<div class="w-full space-y-4">
    @can('view-customer-categories-list')
        <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.customer-categories-list') }}" title="Go Back" class="w-fit" />
    @endcan
    <x-control-panel.card class="w-full">
        <form wire:submit.prevent="updateCustomerCategory">
            <x-control-panel.card.body class="w-full gap-4 p-4">
                <x-control-panel.form.label label="Category Name" for="name">
                    <x-control-panel.form.input type="text" wire:model="name" for="name" maxlength="48" required placeholder="Category Name" />
                </x-control-panel.form.label>
                <x-control-panel.form.label label="Category Description" for="description">
                    <x-control-panel.form.textarea wire:model="description" for="description" maxlength="255" placeholder="Please write customer category description..." />
                </x-control-panel.form.label>
            </x-control-panel.card.body>
            <x-control-panel.card.footer class="p-4 justify-end">
                @can('view-customer-categories-list')
                    <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.customer-categories-list') }}" color="secondary" title="Cancel" />
                @endcan
                @can('edit-customer-category')
                    <x-control-panel.buttons.button type="submit" color="success" target="updateCustomerCategory" title="Save" />
                @endcan
            </x-control-panel.card.footer>
        </form>
    </x-control-panel.card>
</div>
