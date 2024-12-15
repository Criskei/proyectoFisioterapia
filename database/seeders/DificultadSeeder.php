<?php

namespace Database\Seeders;

use App\Models\Dificultad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DificultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dificultades = [
            [
                'nivel' => 'Fácil', 
                'descripcion' => 'Fácil: Ejercicios básicos, adecuados para principiantes o recuperación inicial'
            ],
            [
                'nivel' => 'Medio', 
                'descripcion' => 'Medio: Ejercicios que requieren cierta condición física y coordinación'
            ],
            [
                'nivel' => 'Avanzado', 
                'descripcion' => 'Avanzado: Ejercicios avanzados que requieren buena condición física y técnica'
            ]
        ];

        foreach ($dificultades as $dificultad) {
            Dificultad::create($dificultad);
        }
        
    }
}
