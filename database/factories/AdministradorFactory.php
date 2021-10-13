<?php

namespace Database\Factories;

use App\Models\Administrador;
use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdministradorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Administrador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_completo' => $this->faker->name(),
            'fotografia' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Unknown_person.jpg/434px-Unknown_person.jpg',
            'correo' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('hola1234'),
            'id_rol' => Rol::all()->random()->id,
        ];
    }
}
