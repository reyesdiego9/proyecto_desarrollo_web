<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredCareer extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function carrera()
    {
        return $this->belongsTo('App\Models\Career');
    }

    public function alumno()
    {
        return $this->belongsTo('App\Models\Student');
    }
}
