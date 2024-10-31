<?php

namespace App\Http\Controllers;

use App\Models\Turnos;
use App\Models\User;
use Illuminate\Http\Request;

class TurnosController extends Controller
{
    // Método para mostrar la lista de turnos
    public function obtenerEventos()
    {
        // Obtener todos los turnos de la base de datos
        $turnos = Turnos::with('user')->get(); // Suponiendo que tienes una relación con el modelo User

        // Transformar los datos a un formato que FullCalendar pueda entender
        $eventos = $turnos->map(callback: function ($turno) {
            return [
                'id' => $turno->id,
                'title' => $turno->user->name, // Suponiendo que el modelo User tiene un campo 'name'
                'start' => $turno->fecha_inicio, // Asegúrate de que este campo existe en tu modelo
                'end' => $turno->fecha_fin, // Asegúrate de que este campo existe en tu modelo
                // Agrega otros campos que necesites
            ];
        });

        // Devolver los eventos como JSON

        return response()->json($eventos);
    }
    public function index()
    {
        try {
            $turnos = Turnos::with('user')->get();
            $eventos = $turnos->map(function ($turno) {
                return [
                    'title' => 'Turno: ' . $turno->user->name,
                    'start' => $turno->shift_date . 'T' . $turno->start_time,
                    'end' => $turno->shift_date . 'T' . $turno->end_time,
                ];
            });

            return view('TurnosIndex', compact('turnos', 'eventos'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    // Método para mostrar el formulario de creación
    public function create(Request $request)
    {
        $selectedDate = $request->input('date');
        // Obtener todos los usuarios
        $users = User::all();
        //dd($users); // Esto detendrá la ejecución y mostrará el contenido de $users


        return view('TurnosCreate', compact('selectedDate', 'users')); // Pasar los usuarios a la vista
    }

    // Método para almacenar un nuevo turno
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'shift_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        // Crear un nuevo turno
        Turnos::create($validated);

        return redirect()->route('turnos.index')->with('success', 'Turno creado exitosamente.');
    }

    // Método para mostrar un turno específico
    public function show($id)
    {
        try {
            $turno = Turnos::findOrFail($id); // Obtener el turno por ID
            return view('TurnosShow', compact('turno')); // Retornar la vista
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Devolver error si falla
        }
    }

    // Método para editar un turno existente
    public function edit($id)
{
    // Obtener el turno específico por su ID
    $turno = Turnos::findOrFail($id);

    // Obtener todos los usuarios para el selector de operadores
    $users = User::all();

    // Pasar los datos a la vista TurnosEdit
    return view('TurnosEdit', compact('turno', 'users'));
}

    // Método para actualizar un turno
    public function update(Request $request, $id)
    {
        // Validar los datos enviados
        $validated = $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'shift_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        // Obtener el turno por su ID y actualizar los datos
        $turno = Turnos::findOrFail($id);
        $turno->update($validated);

        // Redirigir a la lista de turnos con un mensaje de éxito
        return redirect()->route('turnos.index')->with('success', 'Turno actualizado exitosamente.');
    }

    // Método para eliminar un turno
    public function destroy($id)
    {
        $turno = Turnos::findOrFail($id);
        $turno->delete();

        return redirect()->route('turnos.index')->with('success', 'Turno eliminado exitosamente.');
    }
}
