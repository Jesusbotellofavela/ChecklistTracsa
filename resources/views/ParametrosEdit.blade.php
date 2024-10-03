@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-900 text-center">Editar Parámetro</h2>

        {{-- Muestra los errores de validación si los hay --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulario para editar el parámetro --}}
        <form action="{{ route('parametros.update', $parametro->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Es necesario usar PUT o PATCH para actualizar --}}

            <div class="mb-4">
                <label for="generadores_id" class="block text-sm font-medium text-gray-700">Generador</label>
                <input type="number" name="generadores_id" id="generadores_id" value="{{ old('generadores_id', $parametro->generadores_id) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="parameter_name" class="block text-sm font-medium text-gray-700">Nombre del Parámetro</label>
                <input type="text" name="parameter_name" id="parameter_name" value="{{ old('parameter_name', $parametro->parameter_name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="unit" class="block text-sm font-medium text-gray-700">Unidad</label>
                <input type="text" name="unit" id="unit" value="{{ old('unit', $parametro->unit) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>

            <div class="mb-4">
                <label for="min_value" class="block text-sm font-medium text-gray-700">Valor Mínimo (opcional)</label>
                <input type="number" step="0.01" name="min_value" id="min_value" value="{{ old('min_value', $parametro->min_value) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="max_value" class="block text-sm font-medium text-gray-700">Valor Máximo (opcional)</label>
                <input type="number" step="0.01" name="max_value" id="max_value" value="{{ old('max_value', $parametro->max_value) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="flex justify-between">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Actualizar Parámetro
                </button>
                <a href="{{ route('parametros.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
