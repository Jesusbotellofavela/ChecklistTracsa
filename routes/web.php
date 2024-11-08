<?php

use App\Http\Controllers\GeneradoresController;
use App\Http\Controllers\LecturasController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\TurnosController;
use App\Http\Controllers\ProfileController;
use App\Models\Turnos;
use App\Models\Lecturas; // Asegúrate de que este sea el modelo correcto
use Illuminate\Support\Facades\Route;

// Página de inicio
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas públicas, que no requieren autenticación
Route::get('generadores/create', [GeneradoresController::class, 'create'])->name('generadores.create');
Route::post('generadores', [GeneradoresController::class, 'store'])->name('generadores.store');

// Agrupar rutas que requieren autenticación con el middleware 'auth'
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        $turnos = Turnos::with('user')->get(); // Asegúrate de que este sea el nombre correcto
        return view('dashboard', compact('turnos'));
    })->name('dashboard');

    // Rutas de perfil
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
    Route::get('lecturas', [LecturasController::class, 'index'])->name('lecturas.index');
    Route::get('lecturas/{id}', [LecturasController::class, 'show'])->name('lecturas.show');
    Route::get('lecturas/{id}/edit', [LecturasController::class, 'edit'])->name('lecturas.edit');
    Route::put('lecturas/{id}', [LecturasController::class, 'update'])->name('lecturas.update');
    Route::delete('lecturas/{id}', [LecturasController::class, 'destroy'])->name('lecturas.destroy');


    // Grupo de rutas para parámetros
    Route::get('parametros', [ParametrosController::class, 'index'])->name('parametros.index');
    Route::get('parametros/create', [ParametrosController::class, 'create'])->name('parametros.create');
    Route::post('parametros', [ParametrosController::class, 'store'])->name('parametros.store');
    Route::get('parametros/{id}', [ParametrosController::class, 'show'])->name('parametros.show');
    Route::get('parametros/{id}/edit', [ParametrosController::class, 'edit'])->name('parametros.edit');
    Route::put('parametros/{id}', [ParametrosController::class, 'update'])->name('parametros.update');
    Route::delete('parametros/{id}', [ParametrosController::class, 'destroy'])->name('parametros.destroy');

    // Rutas para Turnos
    Route::get('turnos', [TurnosController::class, 'index'])->name('turnos.index');            // Lista de turnos
    Route::get('turnos/create', [TurnosController::class, 'create'])->name('turnos.create');   // Formulario de creación
    Route::post('turnos', [TurnosController::class, 'store'])->name('turnos.store');           // Almacenar nuevo turno
    Route::get('turnos/{id}', [TurnosController::class, 'show'])->name('turnos.show');         // Mostrar turno específico
    Route::get('turnos/{id}/edit', [TurnosController::class, 'edit'])->name('turnos.edit');    // Formulario de edición
    Route::put('turnos/{id}', [TurnosController::class, 'update'])->name('turnos.update');     // Actualizar turno
    Route::delete('turnos/{id}', [TurnosController::class, 'destroy'])->name('turnos.destroy'); // Eliminar turno
    // Ruta para obtener eventos
    Route::get('turnos/eventos', [TurnosController::class, 'obtenerEventos'])->name('turnos.eventos');
});

// Requiere autenticación para todas las rutas
require __DIR__.'/auth.php';
