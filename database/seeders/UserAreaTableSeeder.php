<?php

namespace Database\Seeders;

use App\Models\UserArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_areas = [
            [
                'user_id' => 1,
                'area_id' => 1,
                'rol_id' => 1
            ],
            [
                'user_id' => 1,
                'area_id' => 7,
                'rol_id' => 1
            ],
            [
                'user_id' => 1,
                'area_id' => 15,
                'rol_id' => 1
            ],
            [
                'user_id' => 1,
                'area_id' => 9,
                'rol_id' => 1
            ],
            [
                'user_id' => 1,
                'area_id' => 4,
                'rol_id' => 1
            ],
            [
                'user_id' => 1,
                'area_id' => 12,
                'rol_id' => 1
            ],
            [
                'user_id' => 1,
                'area_id' => 16,
                'rol_id' => 1
            ],
            [
                'user_id' => 1,
                'area_id' => 17,
                'rol_id' => 1
            ],

            [
                'user_id' => 1,
                'area_id' => 9,
                'rol_id' => 3
            ],
            [
                'user_id' => 1,
                'area_id' => 9,
                'rol_id' => 5
            ],
            [
                'user_id' => 1,
                'area_id' => 7,
                'rol_id' => 3
            ],
            [
                'user_id' => 1,
                'area_id' => 4,
                'rol_id' => 4
            ],
            [
                'user_id' => 1,
                'area_id' => 12,
                'rol_id' => 2
            ],
            [
                'user_id' => 1,
                'area_id' => 7,
                'rol_id' => 5
            ],

            [
                'user_id' => 2,
                'area_id' => 15,
                'rol_id' => 5
            ],
            [
                'user_id' => 2,
                'area_id' => 2,
                'rol_id' => 5
            ],
            [
                'user_id' => 3,
                'area_id' => 16,
                'rol_id' => 3
            ],
            [
                'user_id' => 3,
                'area_id' => 4,
                'rol_id' => 3
            ],

            [
                'user_id' => 3,
                'area_id' => 17,
                'rol_id' => 3
            ],
            



        ];

        UserArea::insert($user_areas);
    }
}
