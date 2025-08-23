<div class="w-full space-y-4">
    @can('view-cities-list')
        <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.cities-list') }}" title="Go Back" class="w-fit" />
    @endcan
    <x-control-panel.card class="w-full">
        <form wire:submit.prevent="addNewCity">
            <x-control-panel.card.body class="w-full sm:grid-cols-2 gap-4 p-4">
                <x-control-panel.form.label label="Province Name" for="province">
                    <x-control-panel.form.select wire:model.live="province" title="Select Province Name" for="province" required>
                        @foreach ($provinces as $province)
                            <x-control-panel.form.option wire:key="province-{{ $province->id }}" content="{{ $province->name }}" value="{{ $province->id }}" />
                        @endforeach
                    </x-control-panel.form.select>
                </x-control-panel.form.label>
                <x-control-panel.form.label label="District Name" for="district">
                    <x-control-panel.form.select wire:model="district" title="Select District Name" for="district" required>
                        @foreach ($districts as $district)
                            <x-control-panel.form.option wire:key="district-{{ $district->id }}" content="{{ $district->name }}" value="{{ $district->id }}" />
                        @endforeach
                    </x-control-panel.form.select>
                </x-control-panel.form.label>
                <x-control-panel.form.label label="City Name" for="name" class="sm:col-span-2">
                    <x-control-panel.form.input type="text" wire:model="name" for="name" maxlength="48" required placeholder="City Name" />
                </x-control-panel.form.label>
            </x-control-panel.card.body>
            <x-control-panel.card.footer class="p-4 justify-end">
                @can('view-cities-list')
                    <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.cities-list') }}" color="secondary" title="Cancel" />
                @endcan
                @can('add-city')
                    <x-control-panel.buttons.button type="submit" color="success" target="addNewCity" title="Save" />
                @endcan
            </x-control-panel.card.footer>
        </form>
    </x-control-panel.card>
</div>
