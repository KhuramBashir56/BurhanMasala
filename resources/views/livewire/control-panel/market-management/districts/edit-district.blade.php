<div class="w-full space-y-4">
    @can('view-districts-list')
        <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.districts-list') }}" title="Go Back" class="w-fit" />
    @endcan
    <x-control-panel.card class="w-full">
        <form wire:submit.prevent="updateDistrict">
            <x-control-panel.card.body class="w-full gap-4 p-4">
                <x-control-panel.form.label label="Province Name" for="province">
                    <x-control-panel.form.select wire:model="province" title="Select Province Name" for="province" required>
                        @foreach ($provinces as $province)
                            <x-control-panel.form.option wire:key="province-{{ $province->id }}" content="{{ $province->name }}" value="{{ $province->id }}" />
                        @endforeach
                    </x-control-panel.form.select>
                </x-control-panel.form.label>
                <x-control-panel.form.label label="District Name" for="name">
                    <x-control-panel.form.input type="text" wire:model="name" for="name" maxlength="48" required placeholder="District Name" />
                </x-control-panel.form.label>
            </x-control-panel.card.body>
            <x-control-panel.card.footer class="p-4 justify-end">
                @can('view-districts-list')
                    <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.districts-list') }}" color="secondary" title="Cancel" />
                @endcan
                @can('edit-district')
                    <x-control-panel.buttons.button type="submit" color="success" target="updateDistrict" title="Update" />
                @endcan
            </x-control-panel.card.footer>
        </form>
    </x-control-panel.card>
</div>
