<?php

namespace Database\Seeders;

use App\Models\TiposEjercicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposEjercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tiposEjercicios = [
            ['nombre' => 'Estiramiento', 'descripcion' => 'Ejercicios para mejorar la flexibilidad y rango de movimiento'],
            ['nombre' => 'Fortalecimiento', 'descripcion' => 'Ejercicios para aumentar la fuerza muscular'],
            ['nombre' => 'Equilibrio', 'descripcion' => 'Ejercicios para mejorar la estabilidad y coordinación'],
            ['nombre' => 'Cardiovascular', 'descripcion' => 'Ejercicios para mejorar la resistencia y salud cardíaca'],
            ['nombre' => 'Neuromotor', 'descripcion' => 'Ejercicios para mejorar la función neurológica y motora'],
            ['nombre' => 'Respiratorio', 'descripcion' => 'Ejercicios para mejorar la capacidad pulmonar'],
            ['nombre' => 'Postura', 'descripcion' => 'Ejercicios para corregir y mantener una buena postura'],
            ['nombre' => 'Rehabilitación', 'descripcion' => 'Ejercicios específicos para recuperación tras lesión']
        ];

        foreach ($tiposEjercicios as $tipo) {
            TiposEjercicio::create($tipo);
        }
    }
}
