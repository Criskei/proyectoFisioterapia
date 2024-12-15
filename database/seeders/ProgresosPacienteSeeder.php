<?php

namespace Database\Seeders;

use App\Models\ProgresosPaciente;
use App\Models\TratamientosEjercicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgresosPacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tratamientosEjercicios = TratamientosEjercicio::all();

        foreach($tratamientosEjercicios as $tratamiento){
            ProgresosPaciente::factory()->create([
                'id_tratamiento_ejercicio'=>$tratamiento->id_tratamiento_ejercicio, 
            ]);
        }
    }
}
