<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            [
                'nombre' => 'Oficina de la Técnologia de la Información',
                'abreviatura' => 'TI'
            ],
            [
                'nombre' => 'Oficina de Educación Virtual',
                'abreviatura' => 'EV'
            ],
            [
                'nombre' => 'Oficina de la Escuela de Farmacia y Bioquimica',
                'abreviatura' => 'EFBQ'
            ],
            [
                'nombre' => 'Oficina de la Escuela de Enfermeria',
                'abreviatura' => 'EENF'
            ],
            [
                'nombre' => 'Oficina de la Escuela de la Nutrición',
                'abreviatura' => 'ONUT'
            ],
            [
                'nombre' => 'Oficina de Coordinación académica',
                'abreviatura' => 'COA'
            ],
            [
                'nombre' => 'Oficina de Servicios académicos',
                'abreviatura' => 'OSAR'
            ],
            [
                'nombre' => 'Oficina de Grados y Titulos',
                'abreviatura' => 'GT'
            ],
            [
                'nombre' => 'Tesosrería',
                'abreviatura' => 'TESO'
            ],
            [
                'nombre' => 'Biblioteca',
                'abreviatura' => 'BIBL'
            ],

            [
                'nombre' => 'Oficina de Admisión y Marketing',
                'abreviatura' => 'AYM'
            ],
            [
                'nombre' => 'Oficina Decanatura Facultad de Salud',
                'abreviatura' => 'FACS'
            ],
            [
                'nombre' => 'Oficina Decanatura Facultad de Ingeniería',
                'abreviatura' => 'FACI'
            ],
            [
                'nombre' => 'Oficina de Post Grado',
                'abreviatura' => 'OPG'
            ],
            [
                'nombre' => 'Oficina de Administración Financiera',
                'abreviatura' => 'OAF'
            ],
            [
                'nombre' => 'Vicerrector',
                'abreviatura' => 'VICE'
            ],
            [
                'nombre' => 'Imagen Institucional',
                'abreviatura' => 'IMGI'
            ],
            [
                'nombre' => 'India',
                'abreviatura' => 'INDIA'
            ],
            [
                'nombre' => 'India2',
                'abreviatura' => 'INDIADOS'
            ],



        ];

        Area::insert($areas);
    }
}
