<div class="w-full space-y-4">
    @can('view-markets-list')
        <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.markets-list') }}" title="Go Back" class="w-fit" />
    @endcan
    <x-control-panel.card class="w-full">
        <form wire:submit.prevent="addNewMarket">
            <x-control-panel.card.body class="w-full sm:grid-cols-2 gap-4 p-4">
                <x-control-panel.form.label label="Market Name" for="name" class="sm:col-span-2">
                    <x-control-panel.form.input type="text" wire:model="name" for="name" maxlength="48" required placeholder="Market Name" />
                </x-control-panel.form.label>
                <x-control-panel.form.label label="Province Name" for="province">
                    <x-control-panel.form.select wire:model.live="province" title="Select Province Name" for="province" required>
                        @foreach ($provinces as $province)
                            <x-control-panel.form.option wire:key="province-{{ $province->id }}" content="{{ $province->name }}" value="{{ $province->id }}" />
                        @endforeach
                    </x-control-panel.form.select>
                </x-control-panel.form.label>
                <x-control-panel.form.label label="District Name" for="district">
                    <x-control-panel.form.select wire:model.live="district" title="Select District Name" for="district" required>
                        @foreach ($districts as $district)
                            <x-control-panel.form.option wire:key="district-{{ $district->id }}" content="{{ $district->name }}" value="{{ $district->id }}" />
                        @endforeach
                    </x-control-panel.form.select>
                </x-control-panel.form.label>
                <x-control-panel.form.label label="City Name" for="city">
                    <x-control-panel.form.select wire:model="city" title="Select City Name" for="city" required>
                        @foreach ($cities as $city)
                            <x-control-panel.form.option wire:key="city -{{ $city->id }}" content="{{ $city->name }}" value="{{ $city->id }}" />
                        @endforeach
                    </x-control-panel.form.select>
                </x-control-panel.form.label>
                <x-control-panel.form.label label="Area Description" for="description" class="sm:col-span-2">
                    <x-control-panel.form.textarea wire:model="description" for="description" rows="7" maxlength="1500" placeholder="Please write area description..." required />
                </x-control-panel.form.label>
            </x-control-panel.card.body>
            <x-control-panel.card.footer class="p-4 justify-end">
                @can('view-markets-list')
                    <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.markets-list') }}" color="secondary" title="Cancel" />
                @endcan
                @can('add-new-market')
                    <x-control-panel.buttons.button type="submit" color="success" target="addNewMarket" title="Save" />
                @endcan
            </x-control-panel.card.footer>
        </form>
    </x-control-panel.card>
</div>
