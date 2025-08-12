<menu class="w-full overflow-y-auto font-medium divide-y">
    <x-control-panel.menubar.item href="{{ route('control-panel.dashboard') }}" title="Dashboard" active="control-panel.dashboard">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 -960 960 960" fill="currentColor">
            <path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z" />
        </svg>
    </x-control-panel.menubar.item>
    @canany(['add-new-user', 'view-users-list', 'add-new-role', 'view-roles-list'])
        <x-control-panel.menubar.dropdown title="User Management" name="user-management" icon="users" status="control-panel.user-management.*">
            <x-slot:icon>
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 -960 960 960" fill="currentColor">
                    <path xmlns="http://www.w3.org/2000/svg" d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z" />
                </svg>
            </x-slot>
            @can('add-new-user')
                <x-control-panel.menubar.dropdown-item href="" title="Create New User Account" status="" />
            @endcan
            @can('view-users-list')
                <x-control-panel.menubar.dropdown-item href="" title="View User List" status="" />
            @endcan
            @can('add-new-role')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.user-management.create-role') }}" title="Add New Role" status="control-panel.user-management.create-role" />
            @endcan
            @can('view-roles-list')
                <x-control-panel.menubar.dropdown-item href="{{ route('control-panel.user-management.roles-list') }}" title="View Roles List" status="control-panel.user-management.roles-list" />
            @endcan
        </x-control-panel.menubar.dropdown>
    @endcanany
</menu>
