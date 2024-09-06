<?php

namespace Database\Seeders;

use App\Models\rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        rol::insert([
            ['nombre' => 'Administrador'],
            ['nombre' => 'Fisioterapeuta'],
            ['nombre' => 'Paciente']
        ]);
    }
}
