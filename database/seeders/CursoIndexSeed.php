<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\CursoIndex;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursoIndexSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        $alumnos = Student::all();
        $cursos  = Curso::all();

        foreach ($alumnos as $alumno) {
            foreach ($cursos as $curso) {
                if ($curso->id_carrera == strtok($alumno->carnet, "-")) {
                    $nota1 = $faker->numberBetween($min = 0, $max = 10);
                    $nota2 = $faker->numberBetween($min = 0, $max = 20);
                    $zona = $faker->numberBetween($min = 0, $max = 35);
                    $final = $faker->numberBetween($min = 0, $max = 35);
                    $indice = new CursoIndex();
                    $indice->id_curso = $curso->id;
                    $indice->id_alumno = $alumno->id;
                    $indice->id_estado_curso = 1;
                    $indice->primer_parcial = $nota1;
                    $indice->segundo_parcial = $nota2;
                    $indice->zona = $zona;
                    $indice->examen_final = $final;
                    $indice->nota_final = ($nota1 + $nota2 + $zona + $final);
                    $indice->save();
                }
            }
        }
    }
}
