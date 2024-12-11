<?php

use App\Http\Controllers\GeneradoresController;
use App\Http\Controllers\LecturasController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\TurnosController;
use App\Http\Controllers\LecturaParametroController;
use App\Http\Controllers\ProfileController;
use App\Models\Turnos;
use App\Models\Lecturas;
use App\Models\LecturaParametro;
use App\Models\Generadores;
use App\Models\Parametros;
use Illuminate\Support\Facades\Route;

// Página de inicio (no requiere autenticación)
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas públicas (no requieren autenticación)
Route::get('login', [Auth\AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [Auth\AuthenticatedSessionController::class, 'store']);
Route::get('register', [Auth\RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [Auth\RegisteredUserController::class, 'store']);

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
    Route::get('generadores/create', [GeneradoresController::class, 'create'])->name('generadores.create');
    Route::post('generadores', [GeneradoresController::class, 'store'])->name('generadores.store');
    Route::get('generadores/{id}', [GeneradoresController::class, 'show'])->name('generadores.show');
    Route::get('generadores/{id}/edit', [GeneradoresController::class, 'edit'])->name('generadores.edit');
    Route::put('generadores/{id}', [GeneradoresController::class, 'update'])->name('generadores.update');
    Route::delete('generadores/{id}', [GeneradoresController::class, 'destroy'])->name('generadores.destroy');

    // Rutas protegidas para otros recursos

    Route::get('lecturas', [LecturasController::class, 'index'])->name('lecturas.index');
    Route::get('lecturas/create', [LecturasController::class, 'create'])->name('lecturas.create');
    Route::post('lecturas', [lecturasController::class, 'store'])->name('lecturas.store');
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

    //Rutas para el registro de las lecturas
    Route::get('lecturaparametro', [LecturaParametroController::class, 'index'])->name('lecturaparametro.index');            // Lista de turnos
    Route::get('lecturaparametro/create', [LecturaParametroController::class, 'create'])->name('lecturaparametro.create');   // Formulario de creación
    Route::post('lecturaparametro', [LecturaParametroController::class, 'store'])->name('lecturaparametro.store');           // Almacenar nuevo turno
    Route::get('lecturaparametro/{id}', [LecturaParametroController::class, 'show'])->name('lecturaparametro.show');         // Mostrar turno específico
    Route::get('lecturaparametro/{id}/edit', [LecturaParametroController::class, 'edit'])->name('lecturaparametro.edit');    // Formulario de edición
    Route::put('lecturaparametro/{id}', [LecturaParametroController::class, 'update'])->name('lecturaparametro.update');     // Actualizar turno
    Route::delete('lecturaparametro/{id}', [LecturaParametroController::class, 'destroy'])->name('lecturaparametro.destroy'); // Eliminar turno
});

// Requiere autenticación para todas las rutas
require __DIR__.'/auth.php';
