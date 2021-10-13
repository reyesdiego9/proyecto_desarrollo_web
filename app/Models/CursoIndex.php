<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CursoIndex extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function estadoCurso()
    {
        return $this->BelongsTo('App\Models\CourseState');
    }

    public function cursos()
    {
        return $this->BelongsTo('App\Models\Curso');
    }

    public function student()
    {
        return $this->BelongsTo('App\Models\Student');
    }
}
