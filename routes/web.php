<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\HorarioController;
use App\Livewire\FormularioDoctor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('bienvenida');
})->name('bienvenida');

Route::middleware(['auth'])->group(function () {
    Route::resource('cita', CitaController::class);
    Route::get('/cita/crear/{medico}', [CitaController::class, 'crear'])->name('cita.crear');
});

Route::resource('horario', HorarioController::class)->middleware('role:medico');

Route::get('/formularioMedico', function () {
    return view('formularioMedico');
})->middleware('can:create,App\Models\Doctor');

Route::get('/revisarSolicitudes', function () {
    return view('revisarSolicitudes');
})->middleware('role:moderador');

Route::get('/citasMedicos', function () {
    return view('citasMedicos');
})->middleware('role:medico');

Route::get('/buscarMedicos', function () {
    return view('buscarMedicos');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
