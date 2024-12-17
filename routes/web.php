<?php

use App\Http\Controllers\FisioterapeutaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/Pacientes', [PacienteController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('Paciente.index');
Route::post('/Pacientes', [PacienteController::class, 'store']);
Route::get('/Paciente/{id}', [PacienteController::class, 'show'])
    ->middleware(['auth', 'verified'])->name('Paciente.ver');
    
// Route::get('/pacienteEditar/{id}', [PacienteController::class, 'edit'])
//     ->middleware(['auth', 'verified'])->name('Paciente.editar');
// Route::get('/pacienteBorrar/{id}', [PacienteController::class, 'destroy'])
//     ->middleware(['auth', 'verified'])->name('Paciente.borrar');


Route::get('/fisioterapeutas', [FisioterapeutaController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('Fisioterapeuta.index');

require __DIR__ . '/auth.php';
