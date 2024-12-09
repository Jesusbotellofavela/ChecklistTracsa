@extends('Layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Crear Lectura Parámetro
                </h2>
                <form action="{{ route('lecturaparametro.store') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label for="lectura_id" class="block text-sm font-medium text-gray-700">Lectura</label>
                        <select name="lectura_id" id="lectura_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                            @foreach ($lecturas as $lectura)
                                <option value="{{ $lectura->id }}">ID: {{ $lectura->id }} - Fecha: {{ $lectura->fecha }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="parametro_id" class="block text-sm font-medium text-gray-700">Parámetro</label>
                        <select name="parametro_id" id="parametro_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                            @foreach ($parametros as $parametro)
                                <option value="{{ $parametro->id }}">{{ $parametro->parameter_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4"
                        <label for="valor" class="block text-sm font-medium text-gray-700">Valor</label>
                        <input type="number" step="0.01" name="valor" id="valor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
