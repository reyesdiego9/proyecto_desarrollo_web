<?php

namespace Database\Seeders;

use App\Models\CourseState;
use Illuminate\Database\Seeder;

class CourseStateSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status = new CourseState();
        $status->id = 1;
        $status->descripcion = "Activo";
        $status->save();

        $status = new CourseState();
        $status->descripcion = "Inactivo";
        $status->save();
    }
}
