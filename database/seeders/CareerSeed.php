<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;

class CareerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $carrera = new Career();
        $carrera->id = 5090;
        $carrera->nombre = "Ingenieria En Sistemas";
        $carrera->save();

        $carrera = new Career();
        $carrera->nombre = "Contaduria Publica";
        $carrera->save();

        $carrera = new Career();
        $carrera->nombre = "Diseño Grafico";
        $carrera->save();

        $carrera = new Career();
        $carrera->nombre = "Derecho";
        $carrera->save();

        $carrera = new Career();
        $carrera->nombre = "Administracion de empresas";
        $carrera->save();
    }
}
