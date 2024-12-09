@extends('Layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-3xl font-bold leading-tight text-gray-900 text-center">Crear Nuevo Parámetro</h2>
            </div>

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

            {{-- Formulario para crear el parámetro --}}
            <form action="{{ route('parametros.store') }}" method="POST" class="space-y-6 px-4 py-5 sm:p-6">
                @csrf

                <div class="grid grid-cols-3 gap-4">
                    <label for="generadores_id" class="text-sm font-medium text-gray-500">Generador</label>
                    <input type="number" name="generadores_id" id="generadores_id" class="col-span-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-4">
                    <label for="parameter_name" class="text-sm font-medium text-gray-500">Nombre del Parámetro</label>
                    <input type="text" name="parameter_name" id="parameter_name" class="col-span-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-4">
                    <label for="unit" class="text-sm font-medium text-gray-500">Unidad</label>
                    <input type="text" name="unit" id="unit" class="col-span-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-4">
                    <label for="min_value" class="text-sm font-medium text-gray-500">Valor Mínimo (opcional)</label>
                    <input type="number" step="0.01" name="min_value" id="min_value" class="col-span-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="grid grid-cols-3 gap-4 mt-4">
                    <label for="max_value" class="text-sm font-medium text-gray-500">Valor Máximo (opcional)</label>
                    <input type="number" step="0.01" name="max_value" id="max_value" class="col-span-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="flex justify-between py-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Guardar Parámetro
                    </button>
                    <a href="{{ route('parametros.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
