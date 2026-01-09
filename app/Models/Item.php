<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function submodulo()
    {
        return $this->belongsTo(Submodulo::class, 'submodulo_id');
    }
}
