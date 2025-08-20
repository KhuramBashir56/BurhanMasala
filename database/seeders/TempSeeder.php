<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use Illuminate\Database\Seeder;

class TempSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            [
                'id' => 1,
                'name' => 'Layyah',
                'province_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Bhakkar',
                'province_id' => 1
            ]
        ];

        $exist = District::all()->pluck('id')->toArray();

        foreach ($districts as $district) {
            if (!in_array($district['id'], $exist)) {
                District::create([
                    'id' => $district['id'],
                    'name' => $district['name'],
                    'province_id' => $district['province_id'],
                ]);
            }
        }

        $cities = [
            [
                'id' => 1,
                'name' => 'Layyah',
                'district_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Karor Lal Ehsan',
                'district_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'Bhakkar',
                'district_id' => 2
            ],
            [
                'id' => 4,
                'name' => 'Daria Khan',
                'district_id' => 2
            ],
            [
                'id' => 5,
                'name' => 'Mankera',
                'district_id' => 2
            ],
            [
                'id' => 6,
                'name' => 'Ada 17ML',
                'district_id' => 2
            ],
            [
                'id' => 7,
                'name' => 'Fateh Pur',
                'district_id' => 1
            ],
            [
                'id' => 8,
                'name' => 'Chock Azam',
                'district_id' => 1
            ],
            [
                'id' => 9,
                'name' => 'Kazmi Chowk',
                'district_id' => 1
            ],
            [
                'id' => 10,
                'name' => 'Qazi Abad',
                'district_id' => 1
            ]
        ];

        $exists  = City::all()->pluck('id')->toArray();

        foreach ($cities as $city) {
            if (!in_array($city['id'], $exists)) {
                City::create([
                    'id' => $city['id'],
                    'name' => $city['name'],
                    'district_id' => $city['district_id'],
                ]);
            }
        }
    }
}
