<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;

    protected $table = 'especialidades';

    public function facultad()
    {
        return $this->belongsTo(Facultad::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
