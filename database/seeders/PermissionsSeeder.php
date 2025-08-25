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
            [
                'model' => 'Market Management / District',
                'name' => 'add-new-district'
            ],
            [
                'model' => 'Market Management / District',
                'name' => 'view-districts-list'
            ],
            [
                'model' => 'Market Management / District',
                'name' => 'edit-district'
            ],
            [
                'model' => 'Market Management / City',
                'name' => 'add-new-city'
            ],
            [
                'model' => 'Market Management / City',
                'name' => 'view-cities-list'
            ],
            [
                'model' => 'Market Management / City',
                'name' => 'edit-city'
            ],
            [
                'model' => 'Market Management / Markets',
                'name' => 'view-markets-list',
            ],
            [
                'model' => 'Market Management / Markets',
                'name' => 'add-new-market',
            ],
            [
                'model' => 'Market Management / Markets',
                'name' => 'edit-market-information',
            ],
            [
                'model' => 'Market Management / Markets',
                'name' => 'change-market-status',
            ],
            [
                'model' => 'Market Management / Markets',
                'name' => 'market-visit',
            ],
            [
                'model' => 'Market Management / Markets',
                'name' => 'add-visit-remakes',
            ],
            [
                'model' => 'Market Management / Markets',
                'name' => 'visit-history',
            ],
            [
                'model' => 'Market Management / Customer Category',
                'name' => 'view-customer-categories-list',
            ],
            [
                'model' => 'Market Management / Customer Category',
                'name' => 'add-new-customer-category',
            ],
            [
                'model' => 'Market Management / Customer Category',
                'name' => 'edit-customer-category',
            ],
            [
                'model' => 'Market Management / Customer',
                'name' => 'add-new-customer'
            ],
            [
                'model' => 'Market Management / Customer',
                'name' => 'view-customers-list'
            ],
            [
                'model' => 'Market Management / Customer',
                'name' => 'view-customer-profile'
            ],
            [
                'model' => 'Market Management / Customer / Profile',
                'name' => 'edit-customer-profile-image'
            ],
            [
                'model' => 'Market Management / Customer / Profile',
                'name' => 'block-customer-account'
            ],
            [
                'model' => 'Market Management / Customer / Profile',
                'name' => 'reactivate-customer-account'
            ],
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
            ],
            [
                'model' => 'User Management / User',
                'name' => 'block-account'
            ],
            [
                'model' => 'User Management / User',
                'name' => 'reactivate-account'
            ],
            [
                'model' => 'User Management / User',
                'name' => 'update-profile-image'
            ],
        ];

        $exists  = Permission::all()->pluck('name')->toArray();
        foreach ($permissions as $permission) {
            if (!in_array($permission['name'], $exists)) {
                $permission = Permission::create([
                    'model' => $permission['model'],
                    'name' => $permission['name']
                ]);
                $permission->assignRole(Role::where('id', 1)->first()->name);
            }
        }
    }
}
