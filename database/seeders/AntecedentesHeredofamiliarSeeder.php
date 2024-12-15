<?php

namespace Database\Seeders;

use App\Models\AntecedentesHeredofamiliar;
use App\Models\HistoriasClinica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AntecedentesHeredofamiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $historiasClinicas = HistoriasClinica::all();

        foreach($historiasClinicas as $historia){
            AntecedentesHeredofamiliar::factory()->create([
                'id_paciente'=>$historia->id_paciente,
            ]);
        }
    }
}
