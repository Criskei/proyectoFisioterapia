<?php

namespace Database\Seeders;

use App\Models\Tratamiento;
use App\Models\TratamientosEjercicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TratamientosEjercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tratamientos = Tratamiento::all();

        foreach ($tratamientos as $tratamiento) {
            $ejerciciosAsignados = rand(5, 13);

            for ($i = 0; $i < $ejerciciosAsignados; $i++) {
                TratamientosEjercicio::factory()->create([
                    'id_tratamiento' => $tratamiento->id_tratamiento,
                ]);
            }
        }
    }
}
