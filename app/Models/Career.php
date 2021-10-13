<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function cursos()
    {
        return $this->hasMany('App\Models\Curso');
    }

    public function registered()
    {
        return $this->hasMany('App\Models\RegisteredCareer');
    }
}
