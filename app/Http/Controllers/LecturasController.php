<?php

namespace App\Http\Controllers;

use App\Models\Lecturas;
use App\Models\Parametros;
use App\Models\Generadores;
use App\Models\User;
use Illuminate\Http\Request;

class LecturasController extends Controller
{
    public function index()
    {
        $lecturas = Lecturas::with('user', 'generador', 'parametros')->paginate(10);
        return view('LecturasIndex', compact('lecturas'));
    }

    public function show(Lecturas $lectura)
    {
        return view('LecturasShow', compact('lectura'));
    }

    public function create()
    {
        $users = User::all();
        $generadores = Generadores::all();
        $parametros = Parametros::all();
        return view('LecturasCreate', compact('users', 'generadores', 'parametros'));
    }

    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $validated = $request->validate([
            'generador_id' => 'required|exists:generadores,id',
            'parametros' => 'nullable|array',
            'parametros.*' => 'required|numeric', // Cada parámetro debe tener un valor numérico
            'fecha' => 'required|date',
        ]);

        // Guarda la lectura principal en la base de datos
        $lectura = Lecturas::create([
            'generador_id' => $request->generador_id,
            'user_id' => auth()->id(),
            'fecha' => $request->fecha,
        ]);

         // Asocia los parámetros a la lectura si se proporcionan
    if (!empty($validated['parametros'])) {
        foreach ($validated['parametros'] as $parametroId => $valor) {
            $lectura->parametros()->attach($parametroId, ['valor' => $valor]);
        }
    }

        // Redirige al index de lecturas con un mensaje de éxito
        return redirect()->route('lecturas.index')->with('success', 'Lectura registrada exitosamente.');
    }

    public function edit(Lecturas $lectura)
    {
        $users = User::all();
        $generadores = Generadores::all();
        $parametros = Parametros::all();
        return view('LecturasEdit', compact('lectura', 'users', 'generadores', 'parametros'));
    }

    public function update(Request $request, Lecturas $lectura)
    {
        $validated = $request->validate([
            'generador_id' => 'required|exists:generadores,id',
            'parametros' => 'nullable|array',
            'parametros.*' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        // Actualiza los datos de la lectura
        $lectura->update([
            'generador_id' => $validated['generador_id'],
            'fecha' => $validated['fecha'],
        ]);

        // Sincroniza los parámetros
        $syncData = [];
        if (!empty($validated['parametros'])) {
            foreach ($validated['parametros'] as $parametroId => $valor) {
                $syncData[$parametroId] = ['valor' => $valor];
            }
        }
        $lectura->parametros()->sync($syncData);

        return redirect()->route('lecturas.index')->with('success', 'Lectura actualizada con éxito.');
    }

    public function destroy(Lecturas $lectura)
    {
        $lectura->delete();

        return redirect()->route('lecturas.index')->with('success', 'Lectura eliminada con éxito.');
    }
}
