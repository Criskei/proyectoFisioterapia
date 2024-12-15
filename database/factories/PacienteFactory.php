<?php

namespace Database\Factories;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    protected $model = Paciente::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');

        return [
            'tutor_nombre' => $faker->name,
            'tutor_parentesco' => $this->faker->randomElement([
                'Padre', 'Madre', 'Abuelo', 'Abuela', 'Hermano', 'Hermana', 'Tío', 'Tía'
            ]),
            'fecha_ingreso' => $faker->dateTimeBetween('-5 years', 'now'),
            'escolaridad' => $faker->randomElement([
                'Primaria', 'Secundaria', 'Kinder', 
                'Pre Kinder', 'Sin estudios'
            ]),
            'observaciones_generales' => $faker->optional()->sentence(),
            'activo' => $faker->boolean(90)
        ];
    }
}
