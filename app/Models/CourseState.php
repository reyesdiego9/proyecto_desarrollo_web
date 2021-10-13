<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseState extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function cursoIndex()
    {
        return $this->hasMany('App\Models\CursoIndex');
    }
}
