@extends('Layouts.app')

@vite('resources/css/app.css')

@section('content')
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h1 class="text-3xl font-bold leading-tight text-gray-900">
                    Crear Nuevo Generador
                </h1>
            </div>

            <form action="{{ route('generadores.store') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Nombre -->
                <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-3 gap-4">
                        <label for="name" class="text-sm font-medium text-gray-500">Nombre</label>
                        <input type="text" name="name" id="name" class="col-span-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <!-- Modelo -->
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        <label for="model" class="text-sm font-medium text-gray-500">Modelo</label>
                        <input type="text" name="model" id="model" class="col-span-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>

                    <!-- Número de Serie -->
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        <label for="serial_number" class="text-sm font-medium text-gray-500">Número de Serie</label>
                        <input type="text" name="serial_number" id="serial_number" class="col-span-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>
                </div>

                <!-- Botón Guardar -->
                <div class="px-4 py-3 bg-gray-50 sm:px-6 text-right">
                    <a href="{{ route('generadores.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Regresar
                    </a>

                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
