<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecialidadTableSeeder extends Seeder
{
    public function run(): void
    {
        $especialidades = [
           [
                'facultad_id' => 1,
                'user_id' => 2,
                'codigo' => 'S1',
                'cargo' => 'Directora',
                'escuela' => 'Escuela Profesional',
                'nombre' => 'Enfermería',
                'nombre_completo' => 'Directora de la Escuela Profesional de Enfermería',
            ],
            [
                'facultad_id' => 1,
                'user_id' => 3,
                'codigo' => 'S2',
                'cargo' => 'Director',
                'escuela' => 'Escuela Profesional',
                'nombre' => 'Farmacia y Bioquímica',
                'nombre_completo' => 'Director de la Escuela Profesional de Farmacia y Bioquímica',
            ],
            [
                'facultad_id' => 1,
                'user_id' => 5,
                'codigo' => 'S3',
                'cargo' => 'Director',
                'escuela' => 'Escuela Profesional',
                'nombre' => 'Nutrición y Dietética',
                'nombre_completo' => 'Director de la Escuela Profesional de Nutrición y Dietética',
            ],
            [
                'facultad_id' => 2,
                'user_id' => 6,
                'codigo' => 'E2',
                'cargo' => 'Director',
                'escuela' => 'Escuela Profesional',
                'nombre' => 'Administración y Marketing',
                'nombre_completo' => 'Director de la Escuela Profesional de Administración y Marketing',
            ],
            [
                'facultad_id' => 2,
                'user_id' => 7,
                'codigo' => 'E3',
                'cargo' => 'Director',
                'escuela' => 'Escuela Profesional',
                'nombre' => 'Contabilidad y Finanzas',
                'nombre_completo' => 'Director de la Escuela Profesional de Contabilidad y Finanzas',
            ],
            [
                'facultad_id' => 1,
                'user_id' => 4,
                'codigo' => 'S4',
                'cargo' => 'Director',
                'escuela' => 'Escuela',
                'nombre' => 'Psicología',
                'nombre_completo' => 'Director de la Escuela de Psicología',
            ],
            [
                'facultad_id' => 2,
                'user_id' => 8,
                'codigo' => 'E6',
                'cargo' => 'Director',
                'escuela' => 'Escuela Profesional',
                'nombre' => 'Ingeniería Artificial',
                'nombre_completo' => 'Director de la Escuela Profesional de Ingeniería Artificial',
            ],
            [
                'facultad_id' => 1,
                'user_id' => 9,
                'codigo' => 'S5',
                'cargo' => 'Director',
                'escuela' => 'Escuela Profesional',
                'nombre' => 'Tecnología Médica en Terapia Física y Rehabilitación',
                'nombre_completo' => 'Director de la Escuela Profesional de Tecnología Médica en Terapia Física y Rehabilitación',
            ],

        ];

        Especialidad::insert($especialidades);
    }
}
