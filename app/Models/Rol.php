<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rol extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'descripcion'
    ];

    public function Administrador()
    {
        return $this->hasMany('App\Model\Administrador');
    }
}
