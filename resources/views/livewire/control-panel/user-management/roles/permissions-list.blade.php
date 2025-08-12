<x-slot:title>Permissions to {{ $role->name }}</x-slot>
<div class="w-full space-y-4" x-data="">
    <x-control-panel.page-header>
        @can('view-roles-list')
            <x-control-panel.buttons.link wire:navigate href="{{ route('control-panel.user-management.roles-list') }}" title="Go Back" class="w-fit" />
        @endcan
        <x-control-panel.search title="Search Permissions..." class="sm:max-w-sm" />
    </x-control-panel.page-header>
    <div class="grid lg:grid-cols-2 gap-4">
        <div class="space-y-4">
            <h2 class="text-xl font-bold border-b-2 border-gray-400">Permissions List</h2>
            @forelse ($permissionsList as $model => $permissions)
                <div wire:key="access-{{ $model }}">
                    <h2 class="font-bold mb-1">{!! $model !!}</h2>
                    <x-control-panel.table>
                        <x-control-panel.table.thead>
                            @can('assign-permissions-to-role')
                                <x-control-panel.table.th content="Action" class="text-center" />
                            @endcan
                            <x-control-panel.table.th content="Permission Name" />
                        </x-control-panel.table.thead>
                        <x-control-panel.table.tbody>
                            @foreach ($permissions as $permission)
                                <x-control-panel.table.tr wire:key="permission-{{ $permission->id }}">
                                    @can('assign-permissions-to-role')
                                        <x-control-panel.table.actions>
                                            <x-control-panel.form.checkbox wire:click="assignPermission({{ $permission->id }})" wire:confirm="Are you sure you want to assigned this permission?" for="{!! $permission->name !!}" />
                                        </x-control-panel.table.actions>
                                    @endcan
                                    <x-control-panel.table.td content="{!! str_replace('-', ' ', $permission->name) !!}" class="capitalize" />
                                </x-control-panel.table.tr>
                            @endforeach
                        </x-control-panel.table.tbody>
                    </x-control-panel.table>
                </div>
            @empty
                <x-control-panel.table.empty :colspan="2" :message="__('No Permissions Found...')" />
            @endforelse
        </div>
        <div class="space-y-4">
            <h2 class="text-xl font-bold border-b-2 border-gray-400">Role Has Permissions</h2>
            @forelse ($permissionsAssigned as $model => $permissions)
                <div wire:key="selected-access-{{ $model }}">
                    <h2 class="font-bold mb-1">{!! $model !!}</h2>
                    <x-control-panel.table>
                        <x-control-panel.table.thead>
                            @can('unassign-permissions-from-role')
                                <x-control-panel.table.th content="Action" class="text-center" />
                            @endcan
                            <x-control-panel.table.th content="Permission Name" />
                        </x-control-panel.table.thead>
                        <x-control-panel.table.tbody>
                            @foreach ($permissions as $permission)
                                <x-control-panel.table.tr wire:key="access-{{ $permission->id }}">
                                    @can('unassign-permissions-from-role')
                                        <x-control-panel.table.actions>
                                            <x-control-panel.form.checkbox wire:click="unassignPermission({{ $permission->id }})" checked wire:confirm="Are you sure you want to assigned this permission?" for="{!! $permission->name !!}" />
                                        </x-control-panel.table.actions>
                                    @endcan
                                    <x-control-panel.table.td content="{!! str_replace('-', ' ', $permission->name) !!}" class="capitalize" />
                                </x-control-panel.table.tr>
                            @endforeach
                        </x-control-panel.table.tbody>
                    </x-control-panel.table>
                </div>
            @empty
                <x-control-panel.table.empty :colspan="2" :message="__('No Permissions Assigned to this Role...')" />
            @endforelse
        </div>
    </div>
</div>
