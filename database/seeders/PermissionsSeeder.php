<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Districts Permissions
            [
                'model' => 'User Management / District',
                'name' => 'add-district'
            ],
            [
                'model' => 'User Management / District',
                'name' => 'view-districts-list'
            ],
            [
                'model' => 'User Management / District',
                'name' => 'edit-district'
            ],
            // Districts Permissions
            [
                'model' => 'User Management / City',
                'name' => 'add-city'
            ],
            [
                'model' => 'User Management / City',
                'name' => 'view-cities-list'
            ],
            [
                'model' => 'User Management / City',
                'name' => 'edit-city'
            ],
            // User Permissions
            [
                'model' => 'User Management / User',
                'name' => 'add-new-user'
            ],
            [
                'model' => 'User Management / User',
                'name' => 'edit-user'
            ],
            [
                'model' => 'User Management / User',
                'name' => 'delete-user'
            ],
            // Roles Permissions
            [
                'model' => 'User Management / Role',
                'name' => 'view-roles-list'
            ],
            [
                'model' => 'User Management / Role',
                'name' => 'add-new-role'
            ],
            [
                'model' => 'User Management / Role',
                'name' => 'view-role-has-permissions'
            ],
            [
                'model' => 'User Management / Role',
                'name' => 'assign-permissions-to-role'
            ],
            [
                'model' => 'User Management / Role',
                'name' => 'unassign-permissions-from-role'
            ],
            [
                'model' => 'User Management / Role',
                'name' => 'edit-role'
            ],
            [
                'model' => 'User Management / Role',
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
                $permission->assignRole(Role::where('id', 1)->first()->name); // Assign to Super Admin role
            }
        }
    }
}
