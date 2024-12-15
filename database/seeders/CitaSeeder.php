<?php

namespace Database\Seeders;

use App\Models\Cita;
use App\Models\HistoriasClinica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $historiasClinicas = HistoriasClinica::all();

        foreach ($historiasClinicas as $historia) {
            $cantidadCitas = rand(3, 6);

            for ($i = 0; $i < $cantidadCitas; $i++) {
                Cita::factory()->create([
                    'id_paciente' => $historia->id_paciente,
                    'id_fisioterapeuta' => $historia->profesional_registro,
                ]);
            }
        }
    }
}
