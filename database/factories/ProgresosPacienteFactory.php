<?php

namespace Database\Factories;

use App\Models\ProgresosPaciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProgresosPaciente>
 */
class ProgresosPacienteFactory extends Factory
{
    protected $model = ProgresosPaciente::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        
        return [
            'fecha_realizacion' => $faker->dateTimeBetween('-6 months', 'now'),
            'repeticiones_realizadas' => $faker->numberBetween(3, 25),
            'calidad_ejecucion' => $faker->randomFloat(2, 0, 10),
            'observaciones' => $faker->optional()->sentence,
            'activo' => $faker->boolean(90)
        ];
    }
}
