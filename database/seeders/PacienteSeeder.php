<?php

namespace Database\Seeders;

use App\Models\Paciente;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener usuarios con el rol 'Paciente'
        $usuariosPacientes = User::whereHas('roles', function ($query) {
            $query->where('nombre', 'Paciente');
        })->get();

        // Crear pacientes relacionados con cada usuario
        foreach ($usuariosPacientes as $usuario) {
            Paciente::factory()->create(['id_usuario' => $usuario->id_usuario]);
        }
    }
}
