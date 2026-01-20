<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'submodulo_id' => 1,
                'nombre' => 'Lista de usuarios',
                'codigo' => '1.1.1',
                'ruta' => 'home'
            ],
            [
                'submodulo_id' => 1,
                'nombre' => 'Permisos Usuario',
                'codigo' => '1.1.2',
                'ruta' => 'home'
            ],
            [
                'submodulo_id' => 2,
                'nombre' => 'Evaluación Docente',
                'codigo' => '2.1.1',
                'ruta' => 'home'
            ],
            [
                'submodulo_id' => 2,
                'nombre' => 'Historial de Evaluaciones',
                'codigo' => '2.1.2',
                'ruta' => 'home'
            ],
            [
                'submodulo_id' => 2,
                'nombre' => 'Encuestas',
                'codigo' => '2.1.3',
                'ruta' => 'home'
            ]

        ];

        Item::insert($items);
    }
}
