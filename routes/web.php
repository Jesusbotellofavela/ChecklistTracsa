<?php

use App\Http\Controllers\GeneradoresController;
use App\Http\Controllers\LecturasController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\TurnosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Página de inicio
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas públicas, que no requieren autenticación
Route::get('generadores/create', [GeneradoresController::class, 'create'])->name('generadores.create');
Route::post('generadores', [GeneradoresController::class, 'store'])->name('generadores.store');

// Agrupar rutas que requieren autenticación con el middleware 'auth'
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas protegidas para el recurso Generadores
    Route::get('generadores', [GeneradoresController::class, 'index'])->name('generadores.index');
    Route::get('generadores/{id}', [GeneradoresController::class, 'show'])->name('generadores.show');
    Route::get('generadores/{id}/edit', [GeneradoresController::class, 'edit'])->name('generadores.edit');
    Route::put('generadores/{id}', [GeneradoresController::class, 'update'])->name('generadores.update');
    Route::delete('generadores/{id}', [GeneradoresController::class, 'destroy'])->name('generadores.destroy');

    // Rutas protegidas para otros recursos
    Route::resource('lecturas', LecturasController::class);



    // Grupo de rutas para parámetros
    Route::get('parametros', [ParametrosController::class, 'index'])->name('parametros.index');
    Route::get('parametros/create', [ParametrosController::class, 'create'])->name('parametros.create');
    Route::post('parametros', [ParametrosController::class, 'store'])->name('parametros.store');
    Route::get('parametros/{id}', [ParametrosController::class, 'show'])->name('parametros.show');
    Route::get('parametros/{id}/edit', [ParametrosController::class, 'edit'])->name('parametros.edit');
    Route::put('parametros/{id}', [ParametrosController::class, 'update'])->name('parametros.update');
    Route::delete('parametros/{id}', [ParametrosController::class, 'destroy'])->name('parametros.destroy');



    Route::resource('turnos', TurnosController::class);
});

require __DIR__.'/auth.php';
