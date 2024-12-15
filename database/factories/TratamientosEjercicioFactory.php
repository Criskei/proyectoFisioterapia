<?php

namespace Database\Factories;

use App\Models\TratamientosEjercicio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TratamientosEjercicio>
 */
class TratamientosEjercicioFactory extends Factory
{
    protected $model = TratamientosEjercicio::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        
        return [
            'id_ejercicio' => $faker->numberBetween(1, 30),
            'frecuencia_semanal' => $faker->numberBetween(1, 5),
            'repeticiones' => $faker->numberBetween(5, 20),
            'series' => $faker->numberBetween(1, 5),
            'activo' => $faker->boolean(90)
        ];
    }
}
