<?php

namespace Database\Seeders;

use App\Models\AntecedentesPerinatal;
use App\Models\AntecedentesPrenatal;
use App\Models\Cita;
use App\Models\Dificultad;
use App\Models\Ejercicio;
use App\Models\Fisioterapeuta;
use App\Models\Paciente;
use App\Models\Rol;
use App\Models\TiposEjercicio;
use App\Models\Tratamiento;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(RolSeeder::class);
        $this->call(UserSeeder::class); 
        $this->call(PacienteSeeder::class); 
        $this->call(FisioterapeutaSeeder::class); 
        $this->call(TiposEjercicioSeeder::class); 
        $this->call(DificultadSeeder::class); 
        $this->call(EjercicioSeeder::class); 
        $this->call(HistoriasClinicaSeeder::class);
        $this->call(TratamientoSeeder::class);
        $this->call(AntecedentesPrenatalSeeder::class);
        $this->call(AntecedentesPerinatalSeeder::class);
        $this->call(AntecedentesHeredofamiliarSeeder::class);
        $this->call(CitaSeeder::class);
        $this->call(TratamientosEjercicioSeeder::class);
        $this->call(ProgresosPacienteSeeder::class);

        



        // Tratamiento::factory(100)->create();
    }
}
