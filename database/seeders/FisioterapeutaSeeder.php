<?php

namespace Database\Seeders;

use App\Models\Fisioterapeuta;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FisioterapeutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        // Obtener usuarios con el rol 'Paciente'
        $usuariosFisioterapeutas = User::whereHas('roles', function ($query) {
            $query->where('nombre', 'Fisioterapeuta');
        })->get();

        // Crear pacientes relacionados con cada usuario
        foreach ($usuariosFisioterapeutas as $usuario) {
            Fisioterapeuta::factory()->create(['id_usuario' => $usuario->id_usuario]);
        }
    }                 
}
