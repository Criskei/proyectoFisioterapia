<?php

namespace Database\Seeders;

use App\Models\HistoriasClinica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistoriasClinicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HistoriasClinica::factory()->count(70)->create();
    }
}
