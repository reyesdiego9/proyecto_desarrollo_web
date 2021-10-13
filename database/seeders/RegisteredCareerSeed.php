<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\RegisteredCareer;
use App\Models\Student;
use Illuminate\Database\Seeder;

class RegisteredCareerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $estudiantes = Student::all();
        foreach ($estudiantes as $estudiante) {
            $estud = new RegisteredCareer();
            $estud->id_carrera = strtok($estudiante->carnet, "-");
            $estud->id_alumno  = $estudiante->id;
            $estud->fecha_inscripcion = '2018/01/01';
            $estud->ciclo = "2";
            $estud->save();
        }
    }
}
