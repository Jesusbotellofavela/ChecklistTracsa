@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 text-center">Editar Lectura</h1>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('lecturas.update', $lectura->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Selección de Generador -->
        <div class="mb-6">
            <label for="generador_id" class="block text-sm font-medium text-gray-700">Generador</label>
            <select name="generador_id" id="generador_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                @foreach ($generadores as $generador)
                    <option value="{{ $generador->id }}" {{ $lectura->generador_id == $generador->id ? 'selected' : '' }}>
                        {{ $generador->name }}
                    </option>
                @endforeach
            </select>
            @error('generador_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Selección de Fecha -->
        <div class="mb-6">
            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha de Lectura</label>
            <input type="date" name="fecha" id="fecha" value="{{ $lectura->fecha->format('Y-m-d') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            @error('fecha')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Selección de Operador -->
        <div class="mb-6">
            <label for="user_id" class="block text-sm font-medium text-gray-700">Operador</label>
            <select name="user_id" id="user_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $lectura->user_id == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Parámetros de la Lectura -->
        <div class="mb-6">
            <h2 class="text-lg font-medium text-gray-700 mb-2">Parámetros</h2>
            @foreach ($parametros as $parametro)
                <div class="mb-4">
                    <label for="parametro_{{ $parametro->id }}" class="block text-sm font-medium text-gray-700">{{ $parametro->name }}</label>
                    <input type="number" step="0.01" name="parametros[{{ $parametro->id }}]" id="parametro_{{ $parametro->id }}" value="{{ old('parametros.' . $parametro->id, $lectura->parametros->find($parametro->id)->pivot->valor ?? '') }}" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
            @endforeach
        </div>

        <!-- Botones de Acción -->
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Guardar Cambios</button>
            <a href="{{ route('lecturas.index') }}" class="ml-4 px-4 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Cancelar</a>
        </div>
    </form>
</div>
@endsection
