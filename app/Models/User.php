<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    public function auditorias(){
        return $this->hasMany(Auditoria::class);
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'users_areas', 'user_id', 'rol_id');
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class, 'users_areas', 'user_id', 'area_id');
    }

    public function userAreas()
    {
        return $this->hasMany(UserArea::class);
    }

    public function tieneAccesoPorArea($abreviatura)
    {

        return $this->areas()->where('abreviatura', $abreviatura)->exists();
    }

     public function tieneAccesoPorAreaRol($abreviaturaArea, $abreviaturaRol)
    {
        $area = Area::where('abreviatura', $abreviaturaArea)->first();
        $rol = Rol::where('abreviatura', $abreviaturaRol)->first();
        return UserArea::where('area_id', $area->id)
                ->where('user_id',Auth::Id())
                 ->where('rol_id', $rol->id)->exists();

    }
}
