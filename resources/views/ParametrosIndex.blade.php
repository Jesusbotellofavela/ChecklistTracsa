@extends('Layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 text-center">Lista de Parámetros</h1>

        <!-- Barra de búsqueda -->
        <form method="GET" action="{{ route('parametros.index') }}" class="mb-6">
            <div class="flex items-center">
                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Buscar por nombre, unidad o generador..."
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-500"
                >
                <button
                    type="submit"
                    class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none"
                >
                    Buscar
                </button>
                <a
                    href="{{ route('parametros.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500"
                >
                    Limpiar
                </a>
            </div>
        </form>

        <div class="mb-6">
            <a href="{{ route('parametros.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Añadir Parámetro
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Generador</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre del Parámetro</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor mínimo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor máximo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unidad</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($parametros as $parametro)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $parametro->generadores_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $parametro->parameter_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $parametro->min_value }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $parametro->max_value }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $parametro->unit }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('parametros.show', $parametro->id) }}" class="text-blue-600 hover:text-blue-900">Ver</a>
                                <a href="{{ route('parametros.edit', $parametro->id) }}" class="text-yellow-600 hover:text-yellow-900 ml-4">Editar</a>
                                <form action="{{ route('parametros.destroy', $parametro->id) }}" method="POST" class="inline ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">No se encontraron parámetros.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
