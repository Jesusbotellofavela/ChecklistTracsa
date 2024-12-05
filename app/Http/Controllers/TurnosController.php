<?php

namespace App\Http\Controllers;

use App\Models\Turnos;
use App\Models\User;
use Illuminate\Http\Request;

class TurnosController extends Controller
{
    // Método para mostrar la lista de turnos
    public function index(Request $request)
    {
        try {
            $search = $request->input('search'); // Recibir el término de búsqueda

            // Filtrar turnos según el término de búsqueda
            $turnos = Turnos::query()
                ->when($search, function ($query, $search) {
                    $query->where('shift_date', 'like', "%{$search}%")
                        ->orWhereHas('user', function ($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%");
                        });
                })
                ->with('user') // Cargar la relación del operador
                ->get();

            // Preparar eventos para FullCalendar
            $eventos = $turnos->map(function ($turno) {
                return [
                    'id' => $turno->id,
                    'title' => 'Turno: ' . $turno->user->name,
                    'start' => $turno->shift_date . 'T' . $turno->start_time,
                    'end' => $turno->shift_date . 'T' . $turno->end_time,
                ];
            });

            return view('TurnosIndex', compact('turnos', 'eventos', 'search'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Método para mostrar el formulario de creación
    public function create(Request $request)
    {
        $selectedDate = $request->input('date');
        $users = User::all();

        return view('TurnosCreate', compact('selectedDate', 'users'));
    }

    // Método para almacenar un nuevo turno
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'shift_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        Turnos::create($validated);

        return redirect()->route('turnos.index')->with('success', 'Turno creado exitosamente.');
    }

    // Método para mostrar un turno específico
    public function show($id)
    {
        try {
            $turno = Turnos::findOrFail($id);

            return view('TurnosShow', compact('turno'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Método para editar un turno existente
    public function edit($id)
    {
        $turno = Turnos::findOrFail($id);
        $users = User::all();

        return view('TurnosEdit', compact('turno', 'users'));
    }

    // Método para actualizar un turno
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'shift_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $turno = Turnos::findOrFail($id);
        $turno->update($validated);

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
