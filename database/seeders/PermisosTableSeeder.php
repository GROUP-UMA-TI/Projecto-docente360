<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            [
                'user_id' => 1,
                'item_id' => 1,
                'can_view' => true,
            ],
            [
                'user_id' => 1,
                'item_id' => 2,
                'can_view' => true,
            ],
            [
                'user_id' => 1,
                'item_id' => 3,
                'can_view' => true,
            ],            
           

        ];

        Permission::insert($permisos);
    }
}
