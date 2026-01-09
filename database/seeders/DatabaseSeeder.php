<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {        

        $this->call([
            UserTableSeeder::class,
            AreasTableSeeder::class,      
            RolesTableSeeder::class,
            UserAreaTableSeeder::class,
            FacultadTableSeeder::class,
            EspecialidadTableSeeder::class,
            ModuloTableSeeder::class,
            SubModuloTableSeeder::class,
            ItemTableSeeder::class,
            PermisosTableSeeder::class,
        ]);
    }
}
