<?php

namespace App\Livewire\ControlPanel\UserManagement\Roles;

use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Title('Edit User-Role')]
#[Layout('components.layouts.control-panel')]
class EditRole extends Component
{
    use AlertMessage, UserActivity;

    public $role = null;

    public $name = '';

    public function mount(Role $role): void
    {
        $this->role = $role;
        $this->name = $role->name;
    }

    public function updateRole(): void
    {
        $this->authorize('edit-role');
        $this->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . Role::class . ',name,' . $this->role->id]
        ]);
        try {
            DB::transaction(function () {
                $this->role->update([
                    'name' => $this->name
                ]);
                $this->activity('Spatie\Permission\Models\Role', $this->role->id, 'update', 'role name updated as ' . $this->role->name . ' successfully.');
            });
            $this->alert('success', 'Role updated successfully.');
            $this->reset(['name']);
            $this->role = null;
            $this->redirectRoute('control-panel.user-management.roles-list', navigate: true);
        } catch (\Throwable $th) {
            $this->alert('error', 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        $this->authorize('edit-role');
        return view('livewire.control-panel.user-management.roles.edit-role');
    }
}
