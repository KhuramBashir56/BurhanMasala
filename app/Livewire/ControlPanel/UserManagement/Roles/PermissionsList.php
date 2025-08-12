<?php

namespace App\Livewire\ControlPanel\UserManagement\Roles;

use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

#[Layout('components.layouts.control-panel')]
class PermissionsList extends Component
{
    use AlertMessage, UserActivity;

    public $role = null;

    public $searchQuery = '';

    public function mount(Role $role)
    {
        if ($role->name === Role::find(1)->name && !Auth::user()->hasRole(Role::find(1)->name)) {
            return abort(403);
        }
        if (Auth::user()->hasRole(Role::find($role->id)->name) && Auth::user()->id !== 1) {
            return abort(403);
        }
        $this->role = $role;
    }

    public function search()
    {
        $this->searchQuery = $this->searchQuery;
    }

    public function assignPermission(Permission $permission)
    {
        $this->authorize('assign-permissions-to-role');
        try {
            DB::transaction(function () use ($permission) {
                $this->role->givePermissionTo($permission->name);
                $this->activity('Spatie\Permission\Models\Role', $this->role->id, 'update', 'Permission ' . $permission->name . ' assigned to Role');
            });
            return $this->alert('success', 'Permission assigned successfully.');
        } catch (\Throwable $th) {
            return $this->alert('error', 'Something went wrong. Please try again.');
        }
    }

    public function unassignPermission(Permission $permission)
    {
        $this->authorize('unassign-permissions-from-role');
        try {
            DB::transaction(function () use ($permission) {
                $this->role->revokePermissionTo($permission->name);
                $this->activity('Spatie\Permission\Models\Role', $this->role->id, 'update', 'Permission ' . $permission->name . ' removed from Role');
            });
            return $this->alert('success', 'Permission removed successfully.');
        } catch (\Throwable $th) {
            return $this->alert('error', 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        $this->authorize('view-role-has-permissions');
        return view('livewire.control-panel.user-management.roles.permissions-list', [
            'permissionsList' => Permission::whereDoesntHave('roles', function ($query) {
                $query->where('role_id', $this->role->id);
            })->whereAny(['name', 'model'], 'LIKE', '%' . $this->searchQuery . '%')->select('id', 'name', 'model')->orderBy('model')->get()->groupBy('model'),
            'permissionsAssigned' => Permission::whereHas('roles', function ($query) {
                $query->where('role_id', $this->role->id);
            })->whereAny(['name', 'model'], 'LIKE', '%' . $this->searchQuery . '%')->select('id', 'name', 'model')->orderBy('model')->get()->groupBy('model')
        ]);
    }
}
