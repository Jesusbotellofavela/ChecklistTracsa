@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-12 sm:px-6 lg:px-8">
        <div class="bg-gray-0 overflow-hidden shadow-md sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Turno</h2>

                {{-- Formulario de edición --}}
                <form method="POST" action="{{ route('turnos.update', $turno->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Hora de inicio -->
                    <div class="mb-4">
                        <label for="start_time" class="block text-sm font-medium text-gray-700">Hora de inicio</label>
                        <input type="time" id="start_time" name="start_time" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ $turno->start_time }}" required>
                        @error('start_time')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Hora de fin -->
                    <div class="mb-4">
                        <label for="end_time" class="block text-sm font-medium text-gray-700">Hora de fin</label>
                        <input type="time" id="end_time" name="end_time" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ $turno->end_time }}" required>
                        @error('end_time')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fecha del turno -->
                    <div class="mb-4">
                        <label for="shift_date" class="block text-sm font-medium text-gray-700">Fecha del turno</label>
                        <input type="date" id="shift_date" name="shift_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ $turno->shift_date }}" required>
                        @error('shift_date')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Operador -->
                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">Operador</label>
                        <select id="user_id" name="user_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $turno->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botón de actualizar -->
                    <div class="px-4 py-3 bg-gray-50 sm:px-6 text-right">
                    <a href="{{ route('turnos.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Regresar
                    </a>
                    <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Actualizar
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
