<?php

namespace Database\Factories;

use App\Models\AntecedentesHeredofamiliar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AntecedentesHeredofamiliar>
 */
class AntecedentesHeredofamiliarFactory extends Factory
{
    protected $model = AntecedentesHeredofamiliar::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        
        return [
            'descripcion' => $faker->sentence,
            'activo' => $faker->boolean(90)
        ];
    }
}
