<div class="w-full space-y-4" x-data="">
    <x-control-panel.page-header>
        @can('add-district')
            <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.add-new-district') }}" title="Add New District" class="w-fit" />
        @endcan
        <x-control-panel.search placeholder="Search District..." class="sm:max-w-sm" />
    </x-control-panel.page-header>
    <x-control-panel.table>
        <x-control-panel.table.thead>
            <x-control-panel.table.th content="District Name" />
            <x-control-panel.table.th content="Province Name" />
            @canany(['edit-district'])
                <x-control-panel.table.th content="Actions" class="text-center" />
            @endcanany
        </x-control-panel.table.thead>
        <x-control-panel.table.tbody>
            @forelse ($districts as $district)
                <x-control-panel.table.tr wire:key="district-{{ $district->id }}" class="whitespace-nowrap">
                    <x-control-panel.table.td content="{{ $district->name }}" />
                    <x-control-panel.table.td content="{{ $district->province->name }}" />
                    @canany(['edit-district'])
                        <x-control-panel.table.actions>
                            @can('edit-district')
                                <x-control-panel.buttons.icon-link wire:navigate href="{{ route('control-panel.market-management.edit-district', ['district' => $district->id]) }}" title="Edit District" color="info">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 inline-flex" viewBox="0 -960 960 960" fill="currentColor">
                                        <path d="M80 0v-160h800V0H80Zm160-320h56l312-311-29-29-28-28-311 312v56Zm-80 80v-170l448-447q11-11 25.5-17t30.5-6q16 0 31 6t27 18l55 56q12 11 17.5 26t5.5 31q0 15-5.5 29.5T777-687L330-240H160Zm560-504-56-56 56 56ZM608-631l-29-29-28-28 57 57Z" />
                                    </svg>
                                </x-control-panel.buttons.icon-link>
                            @endcan
                        </x-control-panel.table.actions>
                    @endcanany
                </x-control-panel.table.tr>
            @empty
                <x-control-panel.table.empty colspan="3" message="No District Found..." />
            @endforelse
        </x-control-panel.table.tbody>
    </x-control-panel.table>
</div>
