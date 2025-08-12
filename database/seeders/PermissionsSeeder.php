<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // User Permissions
            [
                'model' => 'User',
                'name' => 'view-users-list'
            ],
            [
                'model' => 'User',
                'name' => 'add-new-user'
            ],
            [
                'model' => 'User',
                'name' => 'edit-user'
            ],
            [
                'model' => 'User',
                'name' => 'delete-user'
            ],
            // Roles Permissions
            [
                'model' => 'Role',
                'name' => 'view-roles-list'
            ],
            [
                'model' => 'Role',
                'name' => 'add-new-role'
            ],
            [
                'model' => 'Role',
                'name' => 'view-role-has-permissions'
            ],
            [
                'model' => 'Role',
                'name' => 'assign-permissions-to-role'
            ],
            [
                'model' => 'Role',
                'name' => 'unassign-permissions-from-role'
            ],
            [
                'model' => 'Role',
                'name' => 'edit-role'
            ],
            [
                'model' => 'Role',
                'name' => 'change-role-status-active-inactive'
            ]
        ];

        $exists  = Permission::all()->pluck('name')->toArray();
        foreach ($permissions as $permission) {
            if (!in_array($permission['name'], $exists)) {
                $permission = Permission::create([
                    'model' => $permission['model'],
                    'name' => $permission['name']
                ]);
                $permission->assignRole('Super Admin');
            }
        }
    }
}
