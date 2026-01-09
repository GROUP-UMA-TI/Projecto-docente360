<?php

namespace Database\Seeders;

use App\Models\Facultad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultadTableSeeder extends Seeder
{
    public function run(): void
    {
        $facultades = [
            [
                'user_id' => 2,
                'codigo' => 'S',
                'abreviatura' => 'FCS',
                'nombre' => 'Facultad de Ciencias de la Salud',
                'nombre_completo' => 'Decano de la Facultad de Ciencias de la Salud'
            ],

            [
                'user_id' => 3,
                'codigo' => 'E',
                'abreviatura' => 'ECS',
                'nombre' => 'Facultad de Ciencias Empresariales',
                'nombre_completo' => 'Decano de la Facultad de Ciencias Empresariales',
            ],


        ];

        Facultad::insert($facultades);
    }
}
