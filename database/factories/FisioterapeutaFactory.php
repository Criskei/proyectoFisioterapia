<?php

namespace Database\Factories;

use App\Models\Fisioterapeuta;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fisioterapeuta>
 */
class FisioterapeutaFactory extends Factory
{
    protected $model = Fisioterapeuta::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('es_ES');

        // $usuarioFisioterapeuta = User::whereHas('rol', function($query) {
        //     $query->where('nombre', 'Fisioterapeuta');
        // })->inRandomOrder()->first();
        
        return [
            'especialidad' => $faker->randomElement([
                'Neurología', 'Ortopedia', 'Pediatría', 
                'Deportiva', 'Geriatría', 'Neurorrehabilitación'
            ]),
            'cedula_profesional' => $faker->numerify('########'),
            'fecha_graduacion' => $faker->dateTimeBetween('-30 years', '-2 years'),
            'activo' => $faker->boolean(90)
        ];
    }
}
