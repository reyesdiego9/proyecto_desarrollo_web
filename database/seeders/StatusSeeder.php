<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status_alumno = new Status();
        $status_alumno->id = 1;
        $status_alumno->descripcion = "Activo";
        $status_alumno->save();

        $status_alumno = new Status();
        $status_alumno->descripcion = "Inactivo";
        $status_alumno->save();
    }
}
