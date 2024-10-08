<?php

namespace App\Http\Controllers;

use App\Models\Parametros;
use App\Models\Generadores;
use Illuminate\Http\Request;

class ParametrosController extends Controller
{
    // Mostrar la lista de parámetros
    public function index()
    {
        $parametros = Parametros::all();
        return view('parametrosIndex', compact('parametros'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('parametrosCreate');
    }

    // Almacenar un nuevo parámetro
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'generadores_id' => 'required|integer',
            'parameter_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'min_value' => 'nullable|numeric', // Campo permitido como nulo
            'max_value' => 'nullable|numeric', // Campo permitido como nulo
        ]);

        Parametros::create($validatedData);
        return redirect()->route('parametros.index')->with('success', 'Parámetro creado correctamente.');
    }

    // Mostrar un parámetro específico
    public function show(Parametros $parametro)
    {

        return view('parametrosShow', compact('parametro'));
    }

    // Mostrar el formulario de edición
    public function edit(Parametros $parametro)
    {
        return view('parametrosEdit', compact('parametro'));
    }

    // Actualizar un parámetro existente
    public function update(Request $request, Parametros $parametro)
    {
        $validatedData = $request->validate([
            'generadores_id' => 'required|integer',
            'parameter_name' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'min_value' => 'nullable|numeric', // Campo permitido como nulo
            'max_value' => 'nullable|numeric', // Campo permitido como nulo
        ]);

        $parametro->update($validatedData);
        return redirect()->route('parametros.index')->with('success', 'Parámetro actualizado correctamente.');
    }

    // Eliminar un parámetro
    public function destroy($id)
{
    $parametro = Parametros::findOrFail($id); // Encuentra el parámetro por ID
    $parametro->delete(); // Elimina el parámetro

    return redirect()->route('parametros.index')->with('success', 'Parámetro eliminado correctamente.');
}
}
