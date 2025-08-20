<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = [
            [
                'id' => 1,
                'name' => 'Punjab',
            ],
            [
                'id' => 2,
                'name' => 'Sindh',
            ],
            [
                'id' => 3,
                'name' => 'Khyber Pakhtunkhwa',
            ],
            [
                'id' => 4,
                'name' => 'Balochistan',
            ],
            [
                'id' => 5,
                'name' => 'Gilgit-Baltistan',
            ],
            [
                'id' => 6,
                'name' => 'Azad Kashmir',
            ],
            [
                'id' => 7,
                'name' => 'Islamabad Capital Territory',
            ],
            [
                'id' => 8,
                'name' => 'Gilgit-Baltistan',
            ]
        ];

        $exist = Province::all()->pluck('id')->toArray();

        foreach ($provinces as $province) {
            if (!in_array($province['id'], $exist)) {
                Province::create([
                    'id' => $province['id'],
                    'name' => $province['name'],
                ]);
            }
        }
    }
}
