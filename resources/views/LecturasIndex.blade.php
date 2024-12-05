@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 text-center">Lista de Lecturas</h1>

    <!-- Barra de búsqueda -->
    <div class="flex justify-between items-center mb-6">
        <form method="GET" action="{{ route('lecturas.index') }}" class="flex">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Buscar por operador o generador..."
                class="px-4 py-2 border border-gray-300 rounded-l-md focus:ring focus:ring-blue-500 focus:border-blue-500"
            />
                    <!-- Campo para buscar por fecha -->
        <input
            type="date"
            name="fecha"
            value="{{ request('fecha') }}"
            class="px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500"
        />
            <button
                type="submit"
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-r-md hover:bg-blue-700">
                Buscar
            </button>
            <a
                    href="{{ route('lecturas.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500"
                >
                    Limpiar
                </a>
        </form>
        <a href="{{ route('lecturas.create') }}" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700">
            Nueva Lectura
        </a>
    </div>

    <!-- Mostrar mensajes de éxito -->
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla de lecturas -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">ID</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Generador</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Fecha de Lectura</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Operador</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Parámetros</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($lecturas as $lectura)
                    <tr class="odd:bg-gray-100 even:bg-white">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $lectura->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $lectura->generador->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $lectura->fecha->format('d-m-Y') }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $lectura->user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <ul>
                                @foreach ($lectura->parametros as $parametro)
                                    <li>
                                        <span class="font-bold text-yellow-600">{{ $parametro->parameter_name }}</span>: {{ $parametro->pivot->valor }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium flex items-center space-x-3">
                            <a href="{{ route('lecturas.edit', $lectura->id) }}" class="text-yellow-600 hover:text-yellow-900">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('lecturas.destroy', $lectura->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $lecturas->links('pagination::tailwind') }}
    </div>
</div>
@endsection
