<?php

namespace Database\Seeders;

use App\Models\AntecedentesPerinatal;
use App\Models\HistoriasClinica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AntecedentesPerinatalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $historiasClinicas = HistoriasClinica::all();

        foreach($historiasClinicas as $historia){
            $existeAntecedente = AntecedentesPerinatal::where('id_paciente', $historia->id_paciente)->exists();
            
            if (!$existeAntecedente) {
                AntecedentesPerinatal::factory()->create([
                    'id_paciente' => $historia->id_paciente,
                ]);
            }
        }
    }
}
