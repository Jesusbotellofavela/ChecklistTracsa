<?php

namespace App\Http\Controllers;

use App\Models\LecturaParametro;
use App\Models\lecturas as Lectura;
use App\Models\parametros as Parametro;
use Illuminate\Http\Request;

class LecturaParametroController extends Controller
{
    /**
     * Mostrar una lista de los registros.
     */
    public function index()
    {
        $lecturaParametros = LecturaParametro::with(['lectura', 'parametro'])->paginate(10);

        return view('lecturaparametroIndex', compact('lecturaParametros'));
    }

    /**
     * Mostrar el formulario para crear un nuevo registro.
     */
    public function create()
    {
        $lecturas = Lectura::all();
        $parametros = Parametro::all();

        return view('lecturaparametroCreate', compact('lecturas', 'parametros'));
    }

    /**
     * Almacenar un nuevo registro en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lectura_id' => 'required|exists:lecturas,id',
            'parametro_id' => 'required|exists:parametros,id',
            'valor' => 'required|numeric',
        ]);

        LecturaParametro::create($request->all());

        return redirect()->route('lecturaparametro.index')->with('success', 'Registro creado correctamente.');
    }

    /**
     * Mostrar un registro específico.
     */
    public function show(LecturaParametro $lecturaParametro)
    {
        return view('lecturaparametroShow', compact('lecturaParametro'));
    }

    /**
     * Mostrar el formulario para editar un registro específico.
     */
    public function edit(LecturaParametro $lecturaParametro)
    {
        $lecturas = Lectura::all();
        $parametros = Parametro::all();

        return view('lecturaparametroEdit', compact('lecturaParametro', 'lecturas', 'parametros'));
    }

    /**
     * Actualizar un registro específico en la base de datos.
     */
    public function update(Request $request, LecturaParametro $lecturaParametro)
    {
        $request->validate([
            'lectura_id' => 'required|exists:lecturas,id',
            'parametro_id' => 'required|exists:parametros,id',
            'valor' => 'required|numeric',
        ]);

        $lecturaParametro->update($request->all());

        return redirect()->route('lecturaparametro.index')->with('success', 'Registro actualizado correctamente.');
    }

    /**
     * Eliminar un registro específico de la base de datos.
     */
    public function destroy(LecturaParametro $lecturaParametro)
    {
        $lecturaParametro->delete();

        return redirect()->route('lecturaparametro.index')->with('success', 'Registro eliminado correctamente.');
    }
}
