<?php

namespace Database\Factories;

use App\Models\Dificultad;
use App\Models\Ejercicio;
use App\Models\TiposEjercicio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ejercicio>
 */
class EjercicioFactory extends Factory
{
    protected $model = Ejercicio::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        
        return [
            'id_tipo_ejercicio' => $faker->numberBetween(1, 8),
            'id_dificultad' => $faker->numberBetween(1, 3),
            'nombre' => $faker->words(3, true),
            'descripcion' => $faker->paragraph,
            'instrucciones' => $faker->paragraph,
            'video_tutorial_url' => $faker->optional()->url,
            'imagen_demostracion' => $faker->optional()->imageUrl(),
            'duracion_estimada' => $faker->numberBetween(5, 30),
            'requiere_supervision' => $faker->boolean(50),
            'activo' => $faker->boolean(90)
        ];
    }
}
