<?php

use App\Http\Controllers\CitaController;
use App\Livewire\FormularioDoctor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('bienvenida');
})->name('bienvenida');

Route::post('/citas', [CitaController::class, 'store'])->middleware('auth');

Route::resource('cita', CitaController::class);

Route::get('/formularioMedico', function () {
    return view('formularioMedico');
});

Route::get('/revisarSolicitudes', function () {
    return view('revisarSolicitudes');
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
