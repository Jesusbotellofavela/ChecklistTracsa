<?php

namespace App\Http\Controllers;

use App\Models\Parametros;
use App\Models\Generadores;
use Illuminate\Http\Request;

class ParametrosController extends Controller
{
    // Mostrar la lista de parámetros
    public function index(Request $request)
    {
        // Obtener el valor de búsqueda desde la solicitud
        $search = $request->input('search');

        // Filtrar los parámetros si hay un valor de búsqueda
        $parametros = Parametros::query()
            ->when($search, function ($query, $search) {
                $query->where('parameter_name', 'like', "%{$search}%")
                      ->orWhere('unit', 'like', "%{$search}%")
                      ->orWhere('generadores_id', 'like', "%{$search}%");
            })
            ->get();

        // Retornar la vista con los resultados y el valor de búsqueda
        return view('ParametrosIndex', compact('parametros', 'search'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('ParametrosCreate');
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

        return view('ParametrosShow', compact('parametro'));
    }

    // Mostrar el formulario de edición
    public function edit(Parametros $parametro)
    {
        return view('ParametrosEdit', compact('parametro'));
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
