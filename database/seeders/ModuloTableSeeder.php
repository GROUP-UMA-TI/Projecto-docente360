<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modulos = [
            [                
                'nombre' => 'Gestión usuario',
                'codigo' => '1'
            ],                      
            [
                'nombre' => 'Gestión Docente',
                'codigo' => '2'
            ],
           
        ];

        Modulo::insert($modulos);
    }
}
