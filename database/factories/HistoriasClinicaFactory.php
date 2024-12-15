<?php

namespace Database\Factories;

use App\Models\Fisioterapeuta;
use App\Models\HistoriasClinica;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HistoriasClinica>
 */
class HistoriasClinicaFactory extends Factory
{
    protected $model = HistoriasClinica::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');
        
        return [
            'id_paciente' => $faker->numberBetween(1, 96),
            'profesional_registro' => $faker->numberBetween(1, 3),
            'tipo_historia' => $faker->randomElement([
                'Inicial', 'Seguimiento', 'Fractura', 'Miembros inferiores', 'Neurológica', 'Postural'
            ]),
            'fecha_registro' => $faker->dateTimeBetween('-2 years', 'now'),
            'motivo_consulta' => $faker->paragraph,
            'diagnostico_medico' => $faker->sentence,
            'medicamentos' => $faker->optional()->sentence,
            'examenes_complementarios' => $faker->optional()->sentence,
            'activo' => $faker->boolean(90)
        ];
    }
}
