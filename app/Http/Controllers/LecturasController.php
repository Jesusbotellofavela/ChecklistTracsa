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
        $lecturas = Lecturas::with('user')->paginate(10);
        return view('LecturasIndex', compact('lecturas'));
    }

    public function show(Lecturas $lectura)
    {
        return view('LecturasShow', compact('lectura'));
    }

    public function create()
    {
        $users = User::all();
        $generadores = Generadores::all(); // Asegúrate de tener el modelo Generador correctamente definido
        $parametros = Parametros::all();  // Asegúrate de tener el modelo Parametro correctamente definido
        return view('LecturasCreate', compact('users', 'generadores', 'parametros'));
    }

    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'generadores_id' => 'required|exists:generadores,id',
            'parametros' => 'required|array',
            'fecha' => 'required|date',
        ]);

        // Guarda la lectura principal en la base de datos
        $lectura = Lecturas::create([
            'generador_id' => $request->generador_id,
            "parametros" => $request->parametros,
            'fecha' => $request->fecha,
        ]);

        // Guarda cada parámetro asociado a esta lectura
        foreach ($request->parametros as $parametroId => $valor) {
            $lectura->parametros()->attach($parametroId, ['valor' => $valor]);
        }

        // Redirige al index de lecturas con un mensaje de éxito
        return redirect()->route('lecturas.index')->with('success', 'Lectura registrada exitosamente.');
    }

    public function edit(Lecturas $lectura)
    {
        $users = User::all();
        return view('LecturasEdit', compact('lectura', 'users'));
    }

    public function update(Request $request, Lecturas $lectura)
    {
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'shift_date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $lectura->update($request->all());

        return redirect()->route('LecturasIndex')->with('success', 'Lectura actualizada con éxito.');
    }

    public function destroy(Lecturas $lectura)
    {
        $lectura->delete();

        return redirect()->route('LecturasIndex')->with('success', 'Lectura eliminada con éxito.');
    }
}
