<div class="w-full space-y-4">
    @can('view-roles-list')
        <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.user-management.roles-list') }}" title="Go Back" class="w-fit" />
    @endcan
    <x-control-panel.card class="w-full">
        <form wire:submit.prevent="addNewRole">
            <x-control-panel.card.body class="w-full gap-4 p-4">
                <x-control-panel.form.label :label="__('Role Name')" :for="__('name')">
                    <x-control-panel.form.input type="text" wire:model="name" for="name" maxlength="48" required placeholder="Role Name" />
                </x-control-panel.form.label>
            </x-control-panel.card.body>
            <x-control-panel.card.footer class="p-4 justify-end">
                @can('view-roles-list')
                    <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.user-management.roles-list') }}" color="secondary" title="Cancel" />
                @endcan
                @can('add-new-role')
                    <x-control-panel.buttons.button type="submit" color="success" target="addNewRole" title="Save" />
                @endcan
            </x-control-panel.card.footer>
        </form>
    </x-control-panel.card>
</div>
