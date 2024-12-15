<?php

namespace Database\Factories;

use App\Models\AntecedentesPrenatal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AntecedentesPrenatal>
 */
class AntecedentesPrenatalFactory extends Factory
{
    protected $model = AntecedentesPrenatal::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        return [
            'gesta' => $faker->numberBetween(1, 5),
            'para' => $faker->numberBetween(0, 3),
            'cesarea' => $faker->numberBetween(0, 2),
            'abortos' => $faker->numberBetween(0, 2),
            'edad_madre_embarazo' => $faker->numberBetween(18, 45),
            'semanas_gestacion' => $faker->numberBetween(36, 42),
            'control_prenatal' => $faker->boolean(80),
            'profesional_control' => $faker->name,
            'complicaciones' => $faker->optional()->sentence,
            'alimentacion' => $faker->sentence,
            'traumatismos' => $faker->optional()->sentence,
            'activo' => $faker->boolean(90)
        ];
    }
}
