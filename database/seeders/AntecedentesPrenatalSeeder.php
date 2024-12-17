<?php

namespace Database\Seeders;

use App\Models\AntecedentesPrenatal;
use App\Models\HistoriasClinica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AntecedentesPrenatalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $historiasClinicas = HistoriasClinica::all();

        foreach($historiasClinicas as $historia){
            $existeAntecedente = AntecedentesPrenatal::where('id_paciente', $historia->id_paciente)->exists();
            
            if (!$existeAntecedente) {
                AntecedentesPrenatal::factory()->create([
                    'id_paciente' => $historia->id_paciente,
                ]);
            }
        }
    }
}
