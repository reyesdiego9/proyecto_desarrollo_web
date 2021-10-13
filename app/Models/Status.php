<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'descripcion'
    ];

    public function student()
    {
        return $this->hasMany('App\Model\Student');
    }
}
