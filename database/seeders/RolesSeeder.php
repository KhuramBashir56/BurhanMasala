<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'id' => 1,
                'name' => 'Super Admin'
            ],
            [
                'id' => 2,
                'name' => 'Manager'
            ],
            [
                'id' => 3,
                'name' => 'Sales Man'
            ],
            [
                'id' => 4,
                'name' => 'Store Keeper'
            ],
            [
                'id' => 5,
                'name' => 'Delivery Boy'
            ],
            [
                'id' => 6,
                'name' => 'Customer'
            ],
            [
                'id' => 7,
                'name' => 'Supplier'
            ]
        ];

        $exist = Role::all()->pluck('id')->toArray();

        foreach ($roles as $role) {
            if (!in_array($role['id'], $exist)) {
                Role::create([
                    'id' => $role['id'],
                    'name' => $role['name']
                ]);
            }
        }
    }
}
