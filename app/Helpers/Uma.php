<?php

namespace App\Helpers;
use App\Models\User;



class Uma  {
    static function  areas($area)
    {
        $datos = [
            'S1' => 8, //ID DIRECTOR DE ESCUELA DE ENFERMERÍA
            'S2' => 40, // ID DIRECTOR DE FYBQ Y DECANATURA DE SALUD
            'S3' => 9, // ID DIRECTOR DE ESCUELA DE NUTRICIÓN
            'S4' => 10, // ID DIRECTOR DE ESCUELA DE PSICOLOGÍA
            'S5' => 36, // ID DIRECTOR DE LA ESCUELA DE TECNOLOGÍA MÉDICA
            'S6' => 666, // ID TEC LAB
            'S7' => 44, //Medicina

            'E1' => 14,//ADENI
            'E2' => 13,// ID DIRECTOR DE ESCUELA DE ADMINISTRACIÓN Y MARKETING
            'E3' => 12,// ID DIRECTOR DE ESCUELA DE CONTABILIDAD Y FINANZAS
            'E4' => 14,// ID DIRECTOR DE ESCUELA DE ADMINISTRACIÓN Y NEGOCIOS I

            'G' => 15,// ID DIRECTOR DE POSGRADO
            'P' => 39 ,// ID DIRECTOR DE SEGUNDAS ESPECIALIDADES

            'S' => 39, //DIRECTOR DE FYBQ Y DECANATURA DE SALUD
            'E' => 17, // DECANATURA DE FACULTAD DE CIENCIAS EMPRESARIALES
            'Z' => 40, // DECANATURA DE FACULTAD DE FBQ

            'EC' => 666,//EECIICD
            'EQ' => 666,//EECQ
            'ED' => 666,//EEED
            'EI' => 8,//EECI
            'ES' => 666,//EESFC

            'MA' => 15,
            'MS' => 15,
        ];
        return $datos[$area];
    }

    static function nombreCarreras($area)
    {
        $datos = [
            // Escuelas Profesionales (S-prefijo)
            'S1' => 'Enfermería',
            'S2' => 'Farmacia y Bioquímica',
            'S3' => 'Nutrición y Dietética',
            'S4' => 'Psicología',
            'S5' => 'Tecnología Médica en Terapia Física y Rehabilitación',
            'S6' => 'Tecnología Médica en Laboratorio Clínico y Anatomía Patológica',
            'S7' => 'Medicina',

            // Escuelas Profesionales (E-prefijo)
            'E1' => 'Administración de Negocios Internacionales',
            'E2' => 'Administración y Marketing',
            'E3' => 'Contabilidad y Finanzas',
            'E4' => 'Administración y Negocios Internacionales',
            'E5' => 'Ingeniería Industrial',
            'E6' => 'Ingeniería de Inteligencia Artificial',
            'E7' => 'Ingeniería de Sistemas',
            'E8' => 'Administración de Empresas',
            'E9' => 'Derecho',

            // Segunda Especialidad Profesional
            'EC' => 'Segunda Especialidad Profesional de Enfermería en Cuidado Integral Infantil con mención en Crecimiento y Desarrollo',
            'ED' => 'Segunda Especialidad Profesional de Enfermería en Emergencias y Desastres',
            'EI' => 'Segunda Especialidad Profesional de Enfermería en Cuidados Intensivos',
            'EO' => 'Segunda Especialidad Profesional de Enfermería en Salud Ocupacional',
            'EQ' => 'Segunda Especialidad Profesional de Enfermería en Centro Quirúrgico',
            'ES' => 'Segunda Especialidad Profesional de Enfermería en Salud Familiar y Comunitaria',
            'EU' => 'Segunda Especialidad Profesional de Enfermería en Urología',
            'F1' => 'Segunda Especialidad Profesional de Asuntos Regulatorios en el Sector Farmacéutico',
            'P1' => 'Segunda Especialidad Profesional de Psicología Clínica',

            // Programas de Posgrado
            'AS' => 'Diplomado en Asuntos Regulatorios del Sector Farmacéutico',
            'DA' => 'Diplomado Internacional en Gestión de Negocios Globales',
            'DC' => 'Diplomado Internacional en Gestión Contable y Financiera',
            'DM' => 'Diplomado Internacional en Gestión de Marketing Estratégico',
            'DT' => 'Diplomado Internacional de Especialización de Toxicología Ambiental y Seguridad',
            'MA' => 'Maestría en Administración de Empresas',
            'MS' => 'Maestría en Salud Pública',
        ];

        return $datos[$area] ?? 'Carrera no definida';
    }

    static function personalAreaActivo($areaAbreviatura,$roleAbreviatura,$status = 1)
    {
        $users = User::whereHas('userAreas', function ($query) use ($areaAbreviatura, $roleAbreviatura, $status) {
            $query->whereHas('area', function ($query) use ($areaAbreviatura) {
                $query->where('abreviatura', $areaAbreviatura);
            })->whereHas('rol', function ($query) use ($roleAbreviatura) {
                $query->where('abreviatura', $roleAbreviatura);
            })->where('status', $status);
        })->get();

        return $users;
    }

    static function areasNombres($area)
    {
        $datos = [
            // Escuela Profesional (S-prefijo)
            'S1' => 'Enfermería',
            'S2' => 'Farmacia y Bioquímica',
            'S3' => 'Nutrición y Dietética',
            'S4' => 'Psicología',
            'S5' => 'Tecnología Médica en Terapia Física y Rehabilitación',
            'S6' => 'Tecnología Médica en Laboratorio Clínico y Anatomía Patológica',
            'S7' => 'Medicina',

            // Escuela Profesional (E-prefijo)
            'E1' => 'Administración de Negocios Internacionales',
            'E2' => 'Administración y Marketing',
            'E3' => 'Contabilidad y Finanzas',
            'E4' => 'Administración y Negocios Internacionales',
            'E5' => 'Ingeniería Industrial',
            'E6' => 'Ingeniería de Inteligencia Artificial',
            'E7' => 'Ingeniería de Sistemas',
            'E8' => 'Administración de Empresas',
            'E9' => 'Derecho',

            // Segunda Especialidad Profesional (E-prefijo, excepto E1-E9 ya usados)
            'EC' => 'Segunda Especialidad Profesional en Enfermería en Cuidado Integral Infantil con Mención en Crecimiento y Desarrollo',
            'ED' => 'Segunda Especialidad Profesional en Enfermería en Emergencias y Desastres',
            'EI' => 'Segunda Especialidad Profesional en Enfermería en Cuidados Intensivos',
            'EO' => 'Segunda Especialidad Profesional en Enfermería en Salud Ocupacional',
            'EQ' => 'Segunda Especialidad Profesional en Enfermería en Centro Quirúrgico',
            'ES' => 'Segunda Especialidad Profesional en Enfermería en Salud Familiar y Comunitaria',
            'EU' => 'Segunda Especialidad Profesional en Enfermería en Urología',
            'F1' => 'Segunda Especialidad Profesional en Asuntos Regulatorios en el Sector Farmacéutico',
            'P1' => 'Segunda Especialidad Profesional en Psicología Clínica',

            // Programas de Posgrado
            'AS' => 'Diplomado en Asuntos Regulatorios del Sector Farmacéutico',
            'DA' => 'Diplomado Internacional en Gestión de Negocios Globales',
            'DC' => 'Diplomado Internacional en Gestión Contable y Financiera',
            'DM' => 'Diplomado Internacional en Gestión de Marketing Estratégico',
            'DT' => 'Diplomado Internacional de Especialización de Toxicología Ambiental y Seguridad',
            'MA' => 'Maestría en Administración de Empresas',
            'MS' => 'Maestría en Salud Pública',
        ];

        return $datos[$area] ?? 'Código no encontrado';
    }

    static function puntajeDocente($nota)
    {
        if ($nota <= 10) {
           return  'Deficiente';
        } else if ($nota <= 13) {
            return 'Regular';
        } else if ( $nota <= 16) {
            return 'Bueno';
        } else if ( $nota <= 19) {
            return 'Muy Bueno';
        } else if ($nota >= 20) {
            return 'Excelente';
        }

        return 'Bueno';
    }

    
}
