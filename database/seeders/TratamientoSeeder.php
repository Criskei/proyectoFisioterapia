<?php

namespace Database\Seeders;

use App\Models\HistoriasClinica;
use App\Models\Tratamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $historiasClinicas = HistoriasClinica::all();

        foreach($historiasClinicas as $historia){
            Tratamiento::factory()->create([
                'id_paciente'=>$historia->id_paciente, 
                'id_fisioterapeuta' => $historia->profesional_registro,
            ]);
        }
    }
}
