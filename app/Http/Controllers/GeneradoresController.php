<?php

namespace App\Http\Controllers;

use App\Models\Generadores;
use Illuminate\Http\Request;

class GeneradoresController extends Controller
{
    // Método para mostrar la lista de generadores
    public function index(Request $request)
    {
        try {
            $query = $request->input('search'); // Obtener el valor de búsqueda

            // Filtrar los generadores si se proporciona un criterio de búsqueda
            $generadores = Generadores::when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%$query%")
                             ->orWhere('model', 'like', "%$query%")
                             ->orWhere('serial_number', 'like', "%$query%");
            })->get();

            return view('GeneradoresIndex', compact('generadores', 'query'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Devolver error si falla
        }
    }



    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('GeneradoresCreate');
    }

    // Método para almacenar un nuevo generador
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
        ]);

        // Crear un nuevo generador
        Generadores::create($validated);


        return redirect()->route('generadores.index')->with('success', 'Generador creado exitosamente.');
    }

    // Método para mostrar un generador específico
    public function show($id)
    {
        try {
            $generador = Generadores::findOrFail($id); // Obtener el generador por ID
            return view('GeneradoresShow', compact('generador')); // Retornar la vista
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Devolver error si falla
        }
    }
    // Método para editar un generador existente
    public function edit($id)
    {
        $generador = Generadores::findOrFail($id); // Buscar el generador por su ID
        return view('GeneradoresEdit', compact('generador')); // Cargar la vista con el generador
    }

    // Método para actualizar un generador
    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
        ]);

        $generador = Generadores::findOrFail($id);
        $generador->update($validated); // Actualiza el generador con los datos validados

        return redirect()->route('generadores.index')->with('success', 'Generador actualizado exitosamente.');
    }

    // Método para eliminar un generador
    public function destroy($id)
    {
        $generador = Generadores::findOrFail($id);
        $generador->delete();

        return redirect()->route('generadores.index')->with('success', 'Generador eliminado exitosamente.');
    }
}
