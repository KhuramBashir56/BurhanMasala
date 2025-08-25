<menu class="w-full overflow-y-auto font-medium divide-y">
    <x-control-panel.menubar.item href="{{ route('control-panel.dashboard') }}" title="Dashboard" active="control-panel.dashboard">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 -960 960 960" fill="currentColor">
            <path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z" />
        </svg>
    </x-control-panel.menubar.item>
    @canany(['add-new-district', 'view-districts-list', 'add-new-city', 'view-cities-list', 'add-new-market', 'view-markets-list', 'market-visit', 'view-customer-categories-list', 'add-new-customer-category'])
        <x-control-panel.menubar.dropdown title="Market Management" name="market-management" status="control-panel.market-management.*">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 -960 960 960" fill="currentColor">
                    <path xmlns="http://www.w3.org/2000/svg" d="M160-720v-80h640v80H160Zm0 560v-240h-40v-80l40-200h640l40 200v80h-40v240h-80v-240H560v240H160Zm80-80h240v-160H240v160Zm-38-240h556-556Zm0 0h556l-24-120H226l-24 120Z" />
                </svg>
            </x-slot>
            @can('add-new-district')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.market-management.add-new-district') }}" title="Add New District" status="control-panel.market-management.add-new-district" />
            @endcan
            @can('view-districts-list')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.market-management.districts-list') }}" title="View District List" status="control-panel.market-management.districts-list" />
            @endcan
            @can('add-new-city')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.market-management.add-new-city') }}" title="Add New City" status="control-panel.market-management.add-new-city" />
            @endcan
            @can('view-cities-list')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.market-management.cities-list') }}" title="View Cities List" status="control-panel.market-management.cities-list" />
            @endcan
            @can('add-new-market')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.market-management.add-new-market') }}" title="Add New Market Area" status="control-panel.market-management.add-new-market" />
            @endcan
            @can('view-markets-list')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.market-management.markets-list') }}" title="Market Areas List" status="control-panel.market-management.markets-list" />
            @endcan
            @can('add-new-customer-category')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.market-management.add-new-customer-category') }}" title="Add New Customer Category" status="control-panel.market-management.add-new-customer-category" />
            @endcan
            @can('view-customer-categories-list')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.market-management.customer-categories-list') }}" title="Customer Categories List" status="control-panel.market-management.customer-categories-list" />
            @endcan
            @can('add-new-customer')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.market-management.add-new-customer') }}" title="Add New Customer" status="control-panel.market-management.add-new-customer" />
            @endcan
            @can('view-customers-list')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.market-management.customers-list') }}" title="Customers List" status="control-panel.market-management.customers-list" />
            @endcan
            @can('market-visit')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.market-management.market-visit') }}" title="Market Visit" status="control-panel.market-management.market-visit" />
            @endcan
        </x-control-panel.menubar.dropdown>
    @endcanany
    @canany(['add-new-user', 'view-users-list', 'add-new-role', 'view-roles-list'])
        <x-control-panel.menubar.dropdown title="User Management" name="user-management" status="control-panel.user-management.*">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 -960 960 960" fill="currentColor">
                    <path xmlns="http://www.w3.org/2000/svg" d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z" />
                </svg>
            </x-slot>
            @can('add-new-role')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.user-management.create-role') }}" title="Add New Role" status="control-panel.user-management.create-role" />
            @endcan
            @can('view-roles-list')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.user-management.roles-list') }}" title="View Roles List" status="control-panel.user-management.roles-list" />
            @endcan
        </x-control-panel.menubar.dropdown>
    @endcanany
</menu>
