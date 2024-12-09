@extends('Layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 text-center">Lista de Parámetros Registrados en Lecturas</h1>

    <div class="flex justify-end mb-6">
        <a href="{{ route('lecturaparametro.create') }}" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Nuevo Registro
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">ID</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Lectura ID</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Parámetro</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Valor</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($lecturaParametros as $lecturaParametro)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $lecturaParametro->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $lecturaParametro->lectura->id }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $lecturaParametro->parametro->parameter_name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $lecturaParametro->valor }}</td>
                        <td class="px-6 py-4 text-sm font-medium flex items-center">
                            <a href="{{ route('lecturaparametro.show', $lecturaParametro->id) }}" class="text-blue-600 hover:text-blue-900">Ver</a>
                            <a href="{{ route('lecturaparametro.edit', $lecturaParametro->id) }}" class="text-yellow-600 hover:text-yellow-900 ml-4">Editar</a>
                            <form action="{{ route('lecturaparametro.destroy', $lecturaParametro->id) }}" method="POST" class="inline ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $lecturaParametros->links() }}
    </div>
</div>
@endsection
