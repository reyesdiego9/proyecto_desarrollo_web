<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(StatusSeeder::class);
        $this->call(CareerSeed::class);
        $this->call(RolSeeder::class);
        $this->call(AdministradorSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(CourseStateSeed::class);
        $this->call(RegisteredCareerSeed::class);
        $this->call(CursosSeeder::class);
        $this->call(CursoIndexSeed::class);
    }
}
