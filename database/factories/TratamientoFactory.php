<?php

namespace Database\Factories;

use App\Models\Fisioterapeuta;
use App\Models\Paciente;
use App\Models\Tratamiento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tratamiento>
 */
class TratamientoFactory extends Factory
{
    protected $model = Tratamiento::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        $fechaInicio = $faker->dateTimeBetween('-1 year', 'now');
        
        return [
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $faker->optional()->dateTimeBetween($fechaInicio, '+6 months'),
            'diagnostico' => $faker->sentence,
            'objetivo_tratamiento' => $faker->paragraph,
            'estado' => $faker->randomElement([
                'Activo', 'Completado', 'Suspendido', 'En Pausa'
            ]),
            'activo' => $faker->boolean(90)
        ];
    }
}
