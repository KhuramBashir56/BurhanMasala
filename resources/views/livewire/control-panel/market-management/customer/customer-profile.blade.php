<div class="space-y-4">
    @can('view-customers-list')
        <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.customers-list') }}" class="w-fit" title="Go Back" />
    @endcan
    <section class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 place-items-start">
        <div class="space-y-4 w-full">
            <x-control-panel.card class="rounded-lg overflow-hidden">
                <div class="flex justify-center items-center gap-4 bg-primary-500 dark:bg-gray-800 p-4 h-36 relative bg-cover bg-center" style="background-image: url('{{ asset('images/backgrounds/profile-card.avif') }}');">
                    @can('edit-customer-profile-image')
                        <x-control-panel.buttons.icon-link wire:navigate href="{{ route('control-panel.market-management.update-customer-profile-image', ['customer' => $customer->id]) }}" title="Change Profile Image" class="absolute top-4 right-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 -960 960 960" fill="currentColor">
                                <path xmlns="http://www.w3.org/2000/svg" d="M480-240q79 0 136-53.5T678-426l30 28 42-42-100-100-100 100 42 42 26-26q-6 53-45 88.5T480-300q-13 0-25.5-2.5T430-310l-44 44q22 12 45.5 19t48.5 7ZM310-340l100-100-42-42-26 26q6-53 45-88.5t93-35.5q13 0 25.5 2.5T530-570l44-44q-22-12-45.5-19t-48.5-7q-79 0-136 53.5T282-454l-30-28-42 42 100 100ZM160-120q-33 0-56.5-23.5T80-200v-480q0-33 23.5-56.5T160-760h126l74-80h240l74 80h126q33 0 56.5 23.5T880-680v480q0 33-23.5 56.5T800-120H160Zm0-80h640v-480H638l-73-80H395l-73 80H160v480Zm320-240Z" />
                            </svg>
                        </x-control-panel.buttons.icon-link>
                    @endcan
                    <div class="absolute top-1/2 -translate-y-6">
                        <div class="relative size-36 shrink-0 border-2 border-primary-500 dark:border-white rounded-full">
                            @if ($customer->user->avatar)
                                <img src="{{ asset('storage/' . $customer->user->avatar) }}" alt="User Avatar" class="w-full h-full overflow-hidden rounded-full object-cover object-center">
                            @else
                                <span class="flex justify-center items-center w-full h-full font-bold text-6xl text-white">{{ $customer->user->initials() }}</span>
                            @endif
                            <span class="h-5 aspect-square rounded-full  {{ $customer->online ? 'bg-green-500' : 'bg-gray-500' }} block absolute bottom-2 right-3 border-2 border-primary-500 dark:border-white"></span>
                        </div>
                    </div>
                </div>
                <div class="mt-12 p-4 space-y-2" x-data="{ profileMenu: false }">
                    <h2 class="text-center font-bold text-xl">{{ $customer->user->name }}</h2>
                    <div class="flex justify-between">
                        <p>Account Status:</p>
                        <p class="capitalize">{{ $customer->user->status }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p>Ballance:</p>
                        <p>{{ number_format($customer->user->balance->balance ?? 0, 2) }}</p>
                    </div>
                </div>
            </x-control-panel.card>
            <x-control-panel.card class="rounded-lg">
                <x-control-panel.card.header title="Contact Information" class="p-4" />
                <x-control-panel.card.body class="p-4 gap-3">
                    <div>
                        <x-control-panel.card.header title="Phone / Whatsapp" />
                        <p>Phone: {{ $customer->user->phone }}</p>
                        <p> Whatsapp: {{ $customer->user->whatsapp ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <x-control-panel.card.header title="Address" />
                        <p>{{ $customer->address . ', ' . $customer->near_by . ', ' . $customer->street . ', ' . $customer->market->city->name . ', District ' . $customer->market->district->name . ', ' . $customer->market->province->name }}</p>
                    </div>
                </x-control-panel.card.body>
            </x-control-panel.card>
        </div>
        <div class="space-y-4 w-full lg:col-span-2">
            <x-control-panel.card class="rounded-lg w-full">
                <x-control-panel.card.header title="Financial Actions" description="These actions are not reversible please make all the actions carefully." class="px-4 pt-4" />
                <x-control-panel.card.body class="p-4 gap-4">
                    <div class="flex flex-wrap gap-4">
                        {{-- @if (count($customer->visits) > 0)
                            @can('visit-history')
                                <x-control-panel.buttons.link wire:navigate href="{{ route('panel.market-management.markets.visit-history', ['shop' => $customer->id]) }}" title="Visits History" class="grow" />
                            @endcan
                        @endif
                        @if (empty($customer->visit))
                            @can('add-visit-review')
                                <x-control-panel.buttons.link wire:navigate href="{{ route('panel.market-management.markets.add-visit-review', ['shop' => $customer->id]) }}" title="Add Visit Review" class="grow" color="success" />
                            @endcan
                        @endif --}}
                        @if ($customer->user->status == 'active')
                            @can('block-customer-account')
                                <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.block-customer-account', ['customer' => $customer->id]) }}" title="Block Account" class="grow" color="danger" />
                            @endcan
                        @else
                            @can('reactivate-customer-account')
                                <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.market-management.reactivate-customer-account', ['customer' => $customer->id]) }}" title="Reactivate Account" class="grow" color="success" />
                            @endcan
                        @endif
                    </div>
                </x-control-panel.card.body>
            </x-control-panel.card>
            {{-- <x-ui.card class="rounded-lg w-full">
                <x-ui.card.header title="Account Actions" subtitle="These action related to the account settings. Please make all the actions carefully." class="px-4 pt-4" />
                <x-ui.card.body class="p-4 gap-4">
                    <div class="flex flex-wrap gap-4">
                        @if (count($customer->visits) > 0)
                            @can('visit-history')
                                <x-ui.buttons.link wire:navigate href="{{ route('panel.market-management.markets.visit-history', ['shop' => $customer->id]) }}" title="Visits History" class="grow" />
                            @endcan
                        @endif
                        @if (empty($customer->visit))
                            @can('add-visit-review')
                                <x-ui.buttons.link wire:navigate href="{{ route('panel.market-management.markets.add-visit-review', ['shop' => $customer->id]) }}" title="Add Visit Review" class="grow" color="success" />
                            @endcan
                        @endif
                        @if ($customer->user->status == 'active')
                            @can('block-customer-account')
                                <x-ui.buttons.link wire:navigate href="{{ route('panel.market-management.customers.block-account', ['customer' => $customer->id]) }}" title="Block Account" class="grow" color="danger" />
                            @endcan
                        @else
                            @can('reactivate-customer-account')
                                <x-ui.buttons.link wire:navigate href="{{ route('panel.market-management.customers.reactivate-account', ['customer' => $customer->id]) }}" title="Reactivate Account" class="grow" color="success" />
                            @endcan
                        @endif
                        @can('customer-location-view')
                            <x-ui.buttons.link wire:navigate href="{{ route('panel.market-management.customers.location-view', ['customer' => $customer->id]) }}" title="Location View" class="grow" color="info" />
                        @endcan
                    </div>
                </x-ui.card.body>
            </x-ui.card> --}}
        </div>
    </section>
</div>
