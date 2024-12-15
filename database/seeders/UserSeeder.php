<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {               
        $roles = [
            ['nombre' => 'Administrador', 'descripcion' => 'Usuario con acceso total al sistema'],
            ['nombre' => 'Fisioterapeuta', 'descripcion' => 'Profesional de fisioterapia'],
            ['nombre' => 'Paciente', 'descripcion' => 'Persona que recibe tratamiento'],
            ['nombre' => 'Recepcionista', 'descripcion' => 'Personal de recepción y gestión'],
        ];

        foreach ($roles as $rolData) {
            Rol::create($rolData);
        }

        User::create([
            'nombres' => 'Cristel Keiko',
            'apellidos' => 'Herrera Antezana',
            'celular' => 65626528,
            'email' => 'cristel.herrera.a22@gmail.com',
            'password' => 'administrador',
            'id_rol' => 1,
            'activo' => 1
        ]);
        
        // Obtener IDs de los roles
        $rolFisioterapeutaId = Rol::where('nombre', 'Fisioterapeuta')->first()->id_rol;
        $rolRecepcionistaId = Rol::where('nombre', 'Recepcionista')->first()->id_rol;
        $rolPacienteId = Rol::where('nombre', 'Paciente')->first()->id_rol;

        // Crear 3 fisioterapeutas
        User::factory()->count(3)->create(['id_rol' => $rolFisioterapeutaId]);

        // Crear 1 recepcionista
        User::factory()->create(['id_rol' => $rolRecepcionistaId]);

        // Crear 96 pacientes
        User::factory()->count(96)->create(['id_rol' => $rolPacienteId]);
    }
}
