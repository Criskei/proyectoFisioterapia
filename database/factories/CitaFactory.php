<?php

namespace Database\Factories;

use App\Models\Cita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cita>
 */
class CitaFactory extends Factory
{
    protected $model = Cita::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        
        return [
            'fecha_hora' => $faker->dateTimeBetween('-6 months', '+6 months'),
            'duracion_minutos' => $faker->randomElement([30, 45, 60, 90]),
            'motivo' => $faker->sentence,
            'estado' => $faker->randomElement([
                'Programada', 'Confirmada', 'Cancelada', 'Realizada', 'Reprogramada'
            ]),
            'notas' => $faker->optional()->paragraph,
            'activo' => $faker->boolean(90)
        ];
    }
}
