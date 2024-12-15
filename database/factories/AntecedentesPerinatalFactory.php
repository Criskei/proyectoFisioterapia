<?php

namespace Database\Factories;

use App\Models\AntecedentesPerinatal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AntecedentesPerinatal>
 */
class AntecedentesPerinatalFactory extends Factory
{
    protected $model = AntecedentesPerinatal::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        
        return [
            'trabajo_parto_caracteristicas' => $faker->sentence,
            'duracion_trabajo_parto' => $faker->numberBetween(2, 24),
            'lugar_atencion' => $faker->randomElement([
                'Hospital Público', 'Clínica Privada', 'Centro de Salud', 'Consultorio'
            ]),
            'metodo_obtencion' => $faker->randomElement([
                'Parto Natural', 'Cesárea', 'Fórceps', 'Vacuum'
            ]),
            'complicaciones_extraccion' => $faker->optional()->sentence,
            'uso_forceps' => $faker->boolean(20),
            'incubadora' => $faker->boolean(15),
            'tiempo_incubadora' => $faker->optional()->numberBetween(1, 30),
            'activo' => $faker->boolean(90)
        ];
    }
}
