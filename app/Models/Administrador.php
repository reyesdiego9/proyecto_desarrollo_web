<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Administrador extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'administradors';
    protected $guard = 'administradors';
    public $timestamps = false;

    protected $fillable = [
        'nombre_completo',
        'fotografia',
        'correo',
        'password',
        'id_rol'
    ];

    protected $hidden = [
        'password'
    ];


    public function rol()
    {
        return $this->belongsTo('App\Models\Rol');
    }

    public function estudiante()
    {
        return $this->hasMany('App\Models\Student');
    }
}
