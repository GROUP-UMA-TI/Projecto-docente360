<?php

namespace App\Helpers;
use App\Models\Auditoria as AuditoriaModel;
class Auditoria  {
    static function  crear($user_id,$accion_id,$descripcion = null)
    {
        $auditoria = new AuditoriaModel;
        $auditoria->user_id = $user_id;
        $auditoria->accion_id = $accion_id;
        $auditoria->descripcion = $descripcion;
        $auditoria->save();

        return $auditoria;
    }

}
