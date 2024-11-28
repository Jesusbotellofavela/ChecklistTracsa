@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 sm:px-6 lg:px-8">
    <div class="bg-white shadow-md sm:rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Registrar Lecturas para Generador</h2>

        <form action="{{ route('lecturas.store') }}" method="POST">
            @csrf

            <!-- Selección de Generador -->
            <div class="mb-6">
                <label for="generador_id" class="block text-sm font-medium text-gray-700">Generador</label>
                <select name="generador_id" id="generador_id" class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    @foreach($generadores as $generador)
                        <option value="{{ $generador->id }}">{{ $generador->name }}</option>
                    @endforeach
                </select>
            </div>

                        <!-- Selección de Generador -->
                <div class="mb-6">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Usuario</label>
                <select name="user_id" id="user_id" class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campos dinámicos para cada Parámetro -->
            <h4 class="text-lg font-semibold mb-4 text-gray-700">Ingrese las Lecturas:</h4>
            @foreach($parametros as $parametro)
                <div class="mb-4">
                    <label for="parametros[{{ $parametro->id }}]" class="block text-sm font-medium text-gray-700">
                        {{ $parametro->name }}
                    </label>
                    <input type="number" step="0.01" name="parametros[{{ $parametro->id }}]" id="parametros[{{ $parametro->id }}]"
                           class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                           placeholder="Ingrese {{ $parametro->parameter_name }}" required>
                </div>
            @endforeach

            <!-- Fecha de la Lectura -->
            <div class="mb-6">
                <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha de Registro</label>
                <input type="datetime-local" name="fecha" id="fecha" class="mt-1 w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>

            <!-- Botones de Acción -->
            <div class="flex justify-end space-x-3 bg-gray-50 px-4 py-3 sm:px-6">
                <a href="{{ route('lecturas.index') }}" class="px-4 py-2 text-sm font-medium text-blue-600 bg-white border border-blue-600 rounded-md hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Regresar
                </a>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
