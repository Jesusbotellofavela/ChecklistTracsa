@extends('layouts.app')
@vite('resources/css/app.css')
@section('content')
    <div class="max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-900 text-center">Detalles del Parámetro</h2>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <p><strong>Generador:</strong> {{ $parametro->generadores_id }}</p>
            <p><strong>Nombre del Parámetro:</strong> {{ $parametro->parameter_name }}</p>
            <p><strong>Unidad:</strong> {{ $parametro->unit }}</p>
            <p><strong>Valor Mínimo:</strong> {{ $parametro->min_value ?? 'No especificado' }}</p>
            <p><strong>Valor Máximo:</strong> {{ $parametro->max_value ?? 'No especificado' }}</p>
        </div>

        <div class="mt-6 flex justify-between">
            <a href="{{ route('parametros.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 text-white rounded-md shadow-sm hover:bg-gray-600">
                Volver
            </a>
            <a href="{{ route('parametros.edit', $parametro->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700">
                Editar
            </a>
        </div>
    </div>
@endsection
