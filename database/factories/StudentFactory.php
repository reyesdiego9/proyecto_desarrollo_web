<?php

namespace Database\Factories;

use App\Models\Administrador;
use App\Models\Student;
use App\Models\Status;
use App\Models\Career;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'carnet' => $this->faker->regexify(Career::all()->random()->id . '-18\-[0-9]{4}'),
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->lastName(),
            'dpi' => $this->faker->regexify('/^[0-9]{4}\[0-9]{5}\[0-9]{4}$/'),
            'fechaNacimiento' => $this->faker->date($format = 'Y-m-d', $max = '2003'),
            'foto_estudiante' => 'https://pbs.twimg.com/profile_images/511333573119320064/3q1981fx_400x400.jpeg',
            'correo' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('UMG2021'),
            'id_estado' => Status::all()->random()->id,
            'id_administrador' => Administrador::all()->random()->id,
        ];
    }
}
