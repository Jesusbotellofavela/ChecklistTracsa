<?php

namespace App\Http\Controllers;

use App\Models\Lecturas;
use App\Models\Parametros;
use App\Models\Generadores;
use App\Models\User;
use Illuminate\Http\Request;

class LecturasController extends Controller
{
    public function index(Request $request)
    {
        $query = Lecturas::with('user', 'generador', 'parametros');

        if ($search = $request->input('search')) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })->orWhereHas('generador', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        if ($fecha = $request->input('fecha')) {
            $query->whereDate('fecha', $fecha);
        }

        $lecturas = $query->paginate(4);

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
        $validated = $request->validate([
            'generador_id' => 'required|exists:generadores,id',
            'parametros' => 'nullable|array',
            'parametros.*' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $lectura = Lecturas::create([
            'generador_id' => $validated['generador_id'],
            'user_id' => auth()->id(),
            'fecha' => $validated['fecha'],
        ]);

        if (!empty($validated['parametros'])) {
            foreach ($validated['parametros'] as $parametroId => $valor) {
                $lectura->parametros()->attach($parametroId, ['valor' => $valor]);
            }
        }

        return redirect()->route('lecturas.index')->with('success', 'Lectura registrada exitosamente.');
    }

    public function edit(Lecturas $lectura)
    {
        $users = User::all();
        $generadores = Generadores::all();
        $parametros = Parametros::all();

        return view('LecturasEdit', compact('lectura', 'users', 'generadores', 'parametros'));
    }

    public function update(Request $request, Lecturas $lectura, $id)
    {
        // Encuentra la lectura que se va a editar
    // Encuentra la lectura que se va a editar
    $lectura = Lecturas::findOrFail($id);

    // Valida la solicitud
    $validated = $request->validate([
        'generador_id' => 'required|exists:generadores,id',
        'parametros' => 'nullable|array',
        'parametros.*' => 'required|numeric|min:0', // Cada valor debe ser numérico y positivo
        'fecha' => 'required|date',
    ]);

    // Actualiza los datos principales de la lectura
    $lectura->update([
        'generador_id' => $validated['generador_id'],
        'fecha' => $validated['fecha'],
    ]);

    // Actualiza los valores en la tabla pivote
    if (!empty($validated['parametros'])) {
        foreach ($validated['parametros'] as $parametroId => $valor) {
            $lectura->parametros()->updateExistingPivot($parametroId, ['valor' => $valor]);
        }
    }

    // Redirige con un mensaje de éxito
    return redirect()->route('lecturas.index')->with('success', 'Lectura actualizada con éxito.');
}
    public function destroy(Lecturas $lectura)
    {
        $lectura->delete();

        return redirect()->route('lecturas.index')->with('success', 'Lectura eliminada con éxito.');
    }
}
