<?php

namespace Database\Factories;

use App\Models\paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\paciente>
 */
class PacienteFactory extends Factory
{
    protected $model = paciente::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [            
            'fecha_nac' => $this->faker->dateTimeBetween('-18 years', '-1 years'),
        ];
    }
}
