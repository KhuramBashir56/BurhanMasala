<?php

namespace App\Livewire\ControlPanel\UserManagement\Roles;

use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Title('User Roles List')]
#[Layout('components.layouts.control-panel')]
class RolesList extends Component
{
    use AlertMessage, UserActivity;

    public function toggleRoleStatus(Role $role)
    {
        $this->authorize('change-role-status-active-inactive');
        try {
            DB::transaction(function () use ($role) {
                $role->status = $role->status === 'active' ? 'inactive' : 'active';
                $role->update();
                $this->activity('Spatie\Permission\Models\Role', $role->id, 'create', 'Role status updated as ' . $role->status . '  successfully.');
            });
            $this->alert('success', 'Role status updated successfully.');
        } catch (\Throwable $th) {
            return $this->alert('error', 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        $this->authorize('view-roles-list');
        return view('livewire.control-panel.user-management.roles.roles-list', [
            'roles' => Role::select('id', 'name', 'status')->orderBy('name')->get()
        ]);
    }
}
