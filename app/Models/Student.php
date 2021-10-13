<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;

    //Relacion uno a muchos (inversa)
    public function student()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function Administrador()
    {
        return $this->belongsTo('App\Models\Administrador');
    }

    public function cursoIndex()
    {
        return $this->hasMany('App\Models\CursoIndex');
    }

    public function registered()
    {
        return $this->hasMany('App\Models\RegisteredCareer');
    }
}
