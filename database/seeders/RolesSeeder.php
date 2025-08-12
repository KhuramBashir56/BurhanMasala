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
                'name' => 'Shop Owner'
            ],
            [
                'id' => 3,
                'name' => 'Manager'
            ],
            [
                'id' => 4,
                'name' => 'Sales Man'
            ],
            [
                'id' => 5,
                'name' => 'Store Keeper'
            ],
            [
                'id' => 6,
                'name' => 'Delivery Boy'
            ],
            [
                'id' => 7,
                'name' => 'Customer'
            ],
            [
                'id' => 8,
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
