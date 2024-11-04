@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 sm:px-6 lg:px-8">
    <div class="bg-white shadow-md sm:rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Registrar Lecturas para Generador</h2>

        <form action="{{ route('lecturas.store') }}" method="POST">
            @csrf

            <!-- Selección de Generador -->
            <div class="mb-6">
                <label for="generadores_id" class="block text-sm font-medium text-gray-700">Generador</label>
                <select name="generadores_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    @foreach($generadores as $generador)
                        <option value="{{ $generador->id }}">{{ $generador->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campos dinámicos para cada Parámetro -->
            <h4 class="text-lg font-semibold mb-4 text-gray-700">Ingrese las Lecturas:</h4>
            @foreach($parametros as $parametro)
                <div class="mb-4">
                    <!-- Muestra el nombre del parámetro en la etiqueta y en el placeholder -->
                    <label for="parametros[{{ $parametro->id }}]" class="block text-sm font-medium text-gray-700">
                        {{ $parametro->name }}
                    </label>
                    <input type="number" step="0.01" name="parametros[{{ $parametro->id }}]"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           placeholder="Ingrese {{ $parametro->parameter_name }}" required>
                </div>
            @endforeach

            <!-- Fecha de la Lectura -->
            <div class="mb-6">
                <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha de Registro</label>
                <input type="datetime-local" name="fecha" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>

            <!-- Botón de Registro -->
            <div class="px-4 py-3 bg-gray-50 sm:px-6 text-right">
                <a href="{{ route('lecturas.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Regresar
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
