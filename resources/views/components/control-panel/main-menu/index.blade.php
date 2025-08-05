<menu class="w-full overflow-y-auto font-medium divide-y">
    <x-control-panel.main-menu.item href="{{ route('control-panel.dashboard') }}" title="Dashboard" active="control-panel.dashboard">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 -960 960 960" fill="currentColor">
            <path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z" />
        </svg>
    </x-control-panel.main-menu.item>
    {{-- @canany(['generate-new-invoice', 'view-invoices-list', 'generate-claim-stock-invoice', 'generate-return-stock-invoice'])
        <x-panel.main-menu.dropdown title="Inventory Management" name="inventory-management" icon="users" status="panel.inventory-management.*">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 -960 960 960" fill="currentColor">
                    <path xmlns="http://www.w3.org/2000/svg" d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z" />
                </svg>
            </x-slot>
            @can('generate-new-invoice')
                <x-panel.main-menu.dropdown-item href="{{ route('panel.inventory-management.generate-new-invoice') }}" title="Generate New Invoice" status="panel.inventory-management.generate-new-invoice" />
            @endcan
            @can('generate-customer-invoice')
                <x-panel.main-menu.dropdown-item href="{{ route('panel.inventory-management.generate-customer-invoice') }}" title="Generate Customer Invoice" status="panel.inventory-management.generate-customer-invoice" />
            @endcan
            @can('view-invoices-list')
                <x-panel.main-menu.dropdown-item href="{{ route('panel.inventory-management.view-invoices-list') }}" title="Invoices List / History" status="panel.inventory-management.view-invoices-list" />
            @endcan
            @can('generate-claim-stock-invoice')
                <x-panel.main-menu.dropdown-item href="{{ route('panel.inventory-management.generate-claim-invoice') }}" title="Generate Claim Invoice" status="panel.inventory-management.generate-claim-invoice" />
            @endcan
            @can('generate-return-stock-invoice')
                <x-panel.main-menu.dropdown-item href="{{ route('panel.inventory-management.generate-return-invoice') }}" title="Generate Return Invoice" status="panel.inventory-management.generate-return-invoice" />
            @endcan
        </x-panel.main-menu.dropdown>
    @endcanany --}}
</menu>
