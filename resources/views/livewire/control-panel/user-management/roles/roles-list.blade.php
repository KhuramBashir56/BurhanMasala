<div class="w-full space-y-4" x-data="">
    @can('add-new-role')
        <x-control-panel.page-header>
            <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.user-management.create-role') }}" title="Add New Role" class="w-fit" />
        </x-control-panel.page-header>
    @endcan
    <x-control-panel.table>
        <x-control-panel.table.thead>
            <x-control-panel.table.th content="Role Name" />
            <x-control-panel.table.th content="Accounts" class="text-center" />
            @canany(['change-role-status-active-inactive', 'edit-role', 'view-role-has-permissions'])
                <x-control-panel.table.th content="Actions" class="text-center" />
            @endcanany
        </x-control-panel.table.thead>
        <x-control-panel.table.tbody>
            @foreach ($roles as $role)
                <x-control-panel.table.tr wire:key="'roles-' . $role->id">
                    <x-control-panel.table.td content="{{ $role->name }}" class="whitespace-nowrap" />
                    <x-control-panel.table.td content="{{ count($role->users) }}" class="text-center" />
                    @canany(['change-role-status-active-inactive', 'edit-role', 'view-role-has-permissions'])
                        <x-control-panel.table.actions>
                            @can('change-role-status-active-inactive')
                                <x-control-panel.buttons.toggle-button wire:click="toggleRoleStatus({{ $role->id }})" wire:confirm="Are you sure you want to {{ $role->status === 'active' ? 'inactivate' : 'activate' }} this role?" title="{{ $role->status === 'active' ? 'Inactivate' : 'Activate' }}" status="{{ $role->status === 'active' }}" />
                            @endcan
                            @can('edit-role')
                                <x-control-panel.buttons.icon-link wire:navigate href="{{ route('control-panel.user-management.edit-role', ['role' => $role->id]) }}" title="Edit Role" color="info">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 inline-flex" viewBox="0 -960 960 960" fill="currentColor">
                                        <path d="M80 0v-160h800V0H80Zm160-320h56l312-311-29-29-28-28-311 312v56Zm-80 80v-170l448-447q11-11 25.5-17t30.5-6q16 0 31 6t27 18l55 56q12 11 17.5 26t5.5 31q0 15-5.5 29.5T777-687L330-240H160Zm560-504-56-56 56 56ZM608-631l-29-29-28-28 57 57Z" />
                                    </svg>
                                </x-control-panel.buttons.icon-link>
                            @endcan
                            @can('view-role-has-permissions')
                                <x-control-panel.buttons.icon-link wire:navigate href="{{ route('control-panel.user-management.view-role-has-permissions', ['role' => $role->id]) }}" title="Assign Permissions" color="success">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-6 inline-flex" viewBox="0 -960 960 960" fill="currentColor">
                                        <path d="M480-480Zm0 400q-139-35-229.5-159.5T160-516v-244l320-120 320 120v262q0 9-1 19h-81q1-10 1.5-19t.5-18v-189l-240-90-240 90v189q0 121 68 220t172 132v84Zm200 0v-120H560v-80h120v-120h80v120h120v80H760v120h-80ZM420-360h120l-23-129q20-10 31.5-29t11.5-42q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 23 11.5 42t31.5 29l-23 129Z" />
                                    </svg>
                                </x-control-panel.buttons.icon-link>
                            @endcan
                        </x-control-panel.table.actions>
                    @endcanany
                </x-control-panel.table.tr>
            @endforeach
        </x-control-panel.table.tbody>
    </x-control-panel.table>
</div>
