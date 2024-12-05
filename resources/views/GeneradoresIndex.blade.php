@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 text-center">Lista de Generadores</h1>
        @vite('resources/css/app.css')

        <!-- Barra de búsqueda -->
        <div class="mb-6">
            <form method="GET" action="{{ route('generadores.index') }}" class="flex items-center space-x-4">
                <input
                    type="text"
                    name="search"
                    placeholder="Buscar por nombre, modelo o número de serie"
                    value="{{ old('search', $query ?? '') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                />
                <button
                    type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Buscar
                </button>
                <a
                    href="{{ route('generadores.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500"
                >
                    Limpiar
                </a>
            </form>
        </div>

        <!-- Botón para crear un nuevo generador -->
        <div class="mb-6">
            <a href="{{ route('generadores.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Nuevo Generador
            </a>
        </div>

        <!-- Tabla de generadores -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modelo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número de Serie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($generadores as $generador)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $generador->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $generador->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $generador->model }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $generador->serial_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('generadores.show', $generador->id) }}" class="text-blue-600 hover:text-blue-900">Ver</a>
                                <a href="{{ route('generadores.edit', $generador->id) }}" class="text-yellow-600 hover:text-yellow-900 ml-4">Editar</a>
                                <form action="{{ route('generadores.destroy', $generador->id) }}" method="POST" class="inline ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                No se encontraron resultados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
