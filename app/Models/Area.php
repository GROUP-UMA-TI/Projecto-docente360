<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_areas', 'area_id', 'user_id');
    }


    public function visitas(){
        return $this->hasMany(Visita::class);
    }

    public function incidencias(){
        return $this->hasMany(Incidencia::class);
    }

    public function userAreas()
    {
        return $this->hasMany(UserArea::class);
    }
}
