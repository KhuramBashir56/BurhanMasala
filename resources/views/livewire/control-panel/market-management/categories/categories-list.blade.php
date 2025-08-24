<div class="w-full space-y-4" x-data="">
    @can('add-new-customer-category')
        <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.add-new-customer-category') }}" title="Add New Category" class="w-fit" />
    @endcan
    <x-control-panel.table>
        <x-control-panel.table.thead>
            <x-control-panel.table.th content="Category Name" />
            <x-control-panel.table.th content="Customers" class="text-center" />
            @canany(['edit-customer-category'])
                <x-control-panel.table.th content="Actions" class="text-center" />
            @endcanany
        </x-control-panel.table.thead>
        <x-control-panel.table.tbody>
            @forelse ($categories as $customer)
                <x-control-panel.table.tr wire:key="district-{{ $customer->id }}">
                    <x-control-panel.table.td>
                        <p class="text-lg font-semibold capitalize whitespace-nowrap">{{ $customer->name }}</p>
                        <p>{{ $customer->description }}</p>
                    </x-control-panel.table.td>
                    <x-control-panel.table.td content="{{ $customer->customers->count() }}" class="text-center" />
                    @canany(['edit-customer-category'])
                        <x-control-panel.table.actions>
                            @can('edit-customer-category')
                                <x-control-panel.buttons.icon-link wire:navigate href="{{ route('control-panel.market-management.edit-customer-category', ['category' => $customer->id]) }}" title="Edit District" color="info">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 inline-flex" viewBox="0 -960 960 960" fill="currentColor">
                                        <path d="M80 0v-160h800V0H80Zm160-320h56l312-311-29-29-28-28-311 312v56Zm-80 80v-170l448-447q11-11 25.5-17t30.5-6q16 0 31 6t27 18l55 56q12 11 17.5 26t5.5 31q0 15-5.5 29.5T777-687L330-240H160Zm560-504-56-56 56 56ZM608-631l-29-29-28-28 57 57Z" />
                                    </svg>
                                </x-control-panel.buttons.icon-link>
                            @endcan
                        </x-control-panel.table.actions>
                    @endcanany
                </x-control-panel.table.tr>
            @empty
                <x-control-panel.table.empty colspan="3" message="No Categories Found..." />
            @endforelse
        </x-control-panel.table.tbody>
    </x-control-panel.table>
</div>
