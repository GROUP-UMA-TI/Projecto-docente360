<?php

namespace Database\Seeders;

use App\Models\SubModulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubModuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $submodulos = [
            [
                'modulo_id' => 1,
                'nombre' => 'Usuarios',
                'codigo' => '1.1'
            ],
            [
                'modulo_id' => 2,
                'nombre' => 'Evaluación y Seguimiento',
                'codigo' => '2.1'
            ],
         
        ];

        SubModulo::insert($submodulos);
    }
}
