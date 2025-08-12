<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user seeder

        $User = User::factory()->create([
            'name' => 'Admin',
            'phone' => '1234567890',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456789'),
            'terms' => true,
        ]);

        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
        ]);

        // Assigning the admin role to the user
        $User->assignRole('Super Admin');

        // Assigning permissions to the admin role
        $permissions = Permission::get()->pluck('name');
        foreach ($permissions as $permission) {
            $User->givePermissionTo($permission);
        }
    }
}
