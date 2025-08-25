<?php

namespace App\Livewire\ControlPanel\UserManagement\Roles;

use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Title('Create User-Role')]
#[Layout('components.layouts.control-panel')]
class CreateRole extends Component
{
    use AlertMessage, UserActivity;

    public string $name = '';

    public function addNewRole(): void
    {
        $this->authorize('add-new-role');
        $this->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . Role::class . ',name']
        ]);
        try {
            DB::transaction(function () {
                $role = Role::create([
                    'name' => $this->name
                ]);
                $this->activity('Spatie\Permission\Models\Role', $role->id, 'create', ' Role created with name: ' . $role->name . '.');
            });
            $this->reset('name');
            $this->alert('success', 'Role created successfully.');
        } catch (\Throwable $th) {
            $this->alert('error', 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        $this->authorize('add-new-role');
        return view('livewire.control-panel.user-management.roles.create-role');
    }
}
