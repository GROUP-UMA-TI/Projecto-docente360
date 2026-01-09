<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubModulo extends Model
{
    use HasFactory;
    protected $table = 'submodulos';

    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'modulo_id');
    }
}
