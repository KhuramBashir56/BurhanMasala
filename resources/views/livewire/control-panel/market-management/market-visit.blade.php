<div class="w-full space-y-4" x-data="">
    <x-control-panel.page-header>
        <x-control-panel.form.select wire:model.live.debounce.500ms="market" for="market" title="Select Market" class="sm:max-w-3xs">
            @foreach ($markets as $market)
                <x-control-panel.form.option wire:key="market-{{ $market->id }}" content="{{ $market->name }}" value="{{ $market->id }}" />
            @endforeach
        </x-control-panel.form.select>
        <div class="flex gap-4 w-full sm:max-w-sm">
            <x-control-panel.form.select wire:model.live.debounce.500ms="status" for="status" title="Select Visit Status" class="sm:max-w-3xs">
                <x-control-panel.form.option content="All" value="all" />
                <x-control-panel.form.option content="Visited" value="visited" />
                <x-control-panel.form.option content="Not Visited" value="not-visited" />
            </x-control-panel.form.select>
            <x-control-panel.form.input type="date" wire:model.live.debounce.500ms="visit_date" for="visit_date" max="{{ date('Y-m-d') }}" class="sm:max-w-3xs" onclick="this.showPicker()" onfocus="this.showPicker()" />
        </div>
    </x-control-panel.page-header>
    <x-control-panel.page-header>
        <div class="flex gap-4 w-full sm:max-w-3xs">
            <x-control-panel.form.select wire:model.live.debounce.500ms="category" for="category" title="Select Category">
                @foreach ($categories as $category)
                    <x-control-panel.form.option wire:key="customer-category-{{ $category->id }}" content="{{ $category->name }}" value="{{ $category->id }}" />
                @endforeach
            </x-control-panel.form.select>
            <x-control-panel.buttons.icon-button title="Reset Filters" wire:click="resetFilters" target="resetFilters" class="px-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 -960 960 960" fill="currentColor">
                    <path d="M480-160q-134 0-227-93t-93-227q0-134 93-227t227-93q69 0 132 28.5T720-690v-110h80v280H520v-80h168q-32-56-87.5-88T480-720q-100 0-170 70t-70 170q0 100 70 170t170 70q77 0 139-44t87-116h84q-28 106-114 173t-196 67Z" />
                </svg>
            </x-control-panel.buttons.icon-button>
        </div>
        <x-control-panel.search placeholder="Search Customer..." class="sm:max-w-sm" />
    </x-control-panel.page-header>
    <x-control-panel.table>
        <x-control-panel.table.thead>
            <x-control-panel.table.th content="Customer Title / Customer Name / Phone / Market / Category / Address" />
            <x-control-panel.table.th content="Status" class="text-center" />
            @canany(['add-visit-review', 'customer-visit-history', 'view-customer-profile'])
                <x-control-panel.table.th content="Actions" class="text-center" />
            @endcanany
        </x-control-panel.table.thead>
        <x-control-panel.table.tbody>
            @forelse ($customers as $customer)
                <x-control-panel.table.tr wire:key="customer-{{ $customer->id }}">
                    <x-control-panel.table.td>
                        <p class="text-lg font-semibold capitalize">{{ $customer->title }}</p>
                        <p class="capitalize">{{ $customer->user->name . ' - ' . $customer->user->phone }}</p>
                        <p class="capitalize">{{ $customer->market->name }} / {{ $customer->category->name }}</p>
                        <p class="capitalize">{{ $customer->address . ', ' . $customer->near_by . ', ' . $customer->street . ', ' . $customer->market->city->name . ', District ' . $customer->market->district->name . ', ' . $customer->market->province->name }}</p>
                    </x-control-panel.table.td>
                    <x-control-panel.table.actions>
                        @if ($customer->visit)
                            <div class="text-center">
                                <x-control-panel.badge content="Visited" color="success" />
                                <p class="capitalize">Visited By: {{ $customer->visit->visiter->name }}</p>
                                <p>Visited At: {{ $customer->visit->created_at->format('d M Y h:i:s A') }}</p>
                            </div>
                        @else
                            <x-control-panel.badge content="Not Visited" color="danger" />
                        @endif
                    </x-control-panel.table.actions>
                    @canany(['add-visit-review', 'customer-visit-history', 'view-customer-profile'])
                        <x-control-panel.table.actions>
                            @if (empty($customer->visit))
                                @can('add-visit-review')
                                    <x-control-panel.buttons.icon-link wire:navigate href="{{ route('control-panel.market-management.customer-profile', ['customer' => $customer->id]) }}" title="Add Visit Review">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 inline-flex" viewBox="0 -960 960 960" fill="currentColor">
                                            <path xmlns="http://www.w3.org/2000/svg" d="M200-80v-800h80v80h560l-80 200 80 200H280v320h-80Zm80-640v240-240Zm220 200q33 0 56.5-23.5T580-600q0-33-23.5-56.5T500-680q-33 0-56.5 23.5T420-600q0 33 23.5 56.5T500-520Zm-220 40h442l-48-120 48-120H280v240Z" />
                                        </svg>
                                    </x-control-panel.buttons.icon-link>
                                @endcan
                            @endif
                            @if (count($customer->visits) > 0)
                                @can('customer-visit-history')
                                    <x-control-panel.buttons.icon-link wire:navigate href="{{ route('control-panel.market-management.customer-profile', ['customer' => $customer->id]) }}" title="Visits History" color="success">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6 inline-flex" viewBox="0 -960 960 960" fill="currentColor">
                                            <path xmlns="http://www.w3.org/2000/svg" d="M480-80q-155 0-269-103T82-440h81q15 121 105.5 200.5T480-160q134 0 227-93t93-227q0-134-93-227t-227-93q-86 0-159.5 42.5T204-640h116v80H88q29-140 139-230t253-90q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm112-232L440-464v-216h80v184l128 128-56 56Z" />
                                        </svg>
                                    </x-control-panel.buttons.icon-link>
                                @endcan
                            @endif
                            @can('view-customer-profile')
                                <x-control-panel.buttons.icon-link wire:navigate href="{{ route('control-panel.market-management.customer-profile', ['customer' => $customer->id]) }}" title="Customer Profile" color="info">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 inline-flex" viewBox="0 -960 960 960" fill="currentColor">
                                        <path xmlns="http://www.w3.org/2000/svg" d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                                    </svg>
                                </x-control-panel.buttons.icon-link>
                            @endcan
                        </x-control-panel.table.actions>
                    @endcanany
                </x-control-panel.table.tr>
            @empty
                <x-control-panel.table.empty colspan="3" message="No Cities Found..." />
            @endforelse
        </x-control-panel.table.tbody>
    </x-control-panel.table>
    {{ $customers->links('components.control-panel.table.pagination') }}
</div>
