<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneradoresController;
use App\Http\Controllers\LecturasController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\TurnosController;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para el recurso Generadores
Route::get('generadores/create', [GeneradoresController::class, 'create'])->name('generadores.create');

// Rutas para el recurso Generadores
Route::resource('generadores', GeneradoresController::class)
    ->except(['create', 'store', 'update', 'destroy']); // Ajusta según tus necesidades

// Ruta para el almacenamiento de un nuevo generador
Route::post('generadores', [GeneradoresController::class, 'store'])->name('generadores.store');

// Ruta para la actualización de un generador
Route::put('generadores/{id}', [GeneradoresController::class, 'update'])->name('generadores.update');

// Ruta para la eliminación de un generador
Route::delete('generadores/{id}', [GeneradoresController::class, 'destroy'])->name('generadores.destroy');

// Ruta para la vista específica de un generador (mostrar)
Route::get('generadores/{id}', [GeneradoresController::class, 'show'])->name('generadores.show');

// Ruta para descargar datos de generadores (si aplicable)
Route::get('generadores/descargar', [GeneradoresController::class, 'pdf'])->name('generadores.pdf');

// Ruta para búsqueda de generadores (si aplicable)
Route::get('generadores/search', [GeneradoresController::class, 'search'])->name('generadores.search');




// Rutas para el recurso Lecturas
Route::resource('lecturas', LecturasController::class);

// Rutas para el recurso Parametros
Route::resource('parametros', ParametrosController::class);

// Rutas para el recurso Turnos
Route::resource('turnos', TurnosController::class);
