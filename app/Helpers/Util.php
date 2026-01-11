<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class Util
{
     public static function getEstado($estado)
    {
        return $estado == 1 ? 'Activo' : 'Inactivo';
    }

    public static function getGenero($genero)
    {
        return $genero == 'F' ? 'Femenino' : 'Masculino';
    }
    
    static function formatoFecha($fecha)
    {
        $contenedor = strtotime($fecha);
        $dia = date('d', $contenedor);
        $mes = date('m', $contenedor);
        $anio = date('Y', $contenedor);
        $hora = date('H:i:s', $contenedor);
       // $meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'setiembre', 'octubre', 'noviembre', 'diciembre'];
        $texto = $dia . '-' . $mes. '-' . $anio . ' ' . $hora;
        return $texto;
    }
    static function formatoSoloFecha($fecha)
    {
        $contenedor = strtotime($fecha);
        return date('Y-m-d', $contenedor);
    }

    static function nombreMes($mes){
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        return $meses[$mes-1];
    }

    static function base64Img($rutaImagen){
        $contenidoImagen = Storage::get($rutaImagen);
        $base64Imagen = base64_encode($contenidoImagen);
        echo $base64Imagen;
    }

    static function prueba1(){
        return 'hola';
    }

   

    


    static function facultadNombresReales($codigoFacultad)
    {
        $Nombrefacultades = [
            'D' => 'DIPLOMADOS',
            'E' => 'FACULTAD DE INGENIERÍA Y NEGOCIOS',
            'P' => 'SEGUNDA ESPECIALIDAD',
            'S' => 'FACULTAD DE CIENCIAS DE LA SALUD',
            'G' => 'ESCUELA DE POSGRADO'
        ];

        return $Nombrefacultades[$codigoFacultad] ?? 'Código no encontrado';
    }

}
