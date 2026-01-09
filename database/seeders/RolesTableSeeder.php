<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $roles = [
            [
                'nombre' => 'Administrador',
                'abreviatura' => 'ADM',
                'status' => 1,
            ],
            [
                'nombre' => 'DECANO',
                'abreviatura' => 'DECA',
                'status' => 1,
            ],
            [
                'nombre' => 'JEFE',
                'abreviatura' => 'JEFE',
                'status' => 1,
            ],
            [
                'nombre' => 'DIRECTOR',
                'abreviatura' => 'DIR',
                'status' => 1,
            ],
            [
                'nombre' => 'ASISTENTE',
                'abreviatura' => 'ASIS',
                'status' => 1,
            ],
            [
                'nombre' => 'COORDINADOR',
                'abreviatura' => 'CORD',
                'status' => 1,
            ],
            
        ];

        
        Rol::insert($roles);
    }
}
