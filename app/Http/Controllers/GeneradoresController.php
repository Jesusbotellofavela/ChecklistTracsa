<?php

namespace App\Http\Controllers;

use App\Models\Generadores;
use Illuminate\Http\Request;

class GeneradoresController extends Controller
{
    // Método para mostrar la lista de generadores
    public function index()
{
    try {
        $generadores = Generadores::all(); // Obtener todos los generadores
        return view('GeneradoresIndex', compact('generadores')); // Retornar la vista
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
