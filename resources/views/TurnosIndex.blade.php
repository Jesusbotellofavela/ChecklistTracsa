@extends('layouts.app')
@viteReactRefresh('resources/js/calendar.js')
@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-900 text-center">Lista de Turnos</h1>

                <!-- Botón de nuevo turno -->
                <div class="mb-6">
            <a href="{{ route('turnos.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Nuevo Turno
            </a>
        </div>

        <!-- Barra de búsqueda -->
        <div class="mb-6">
            <form method="GET" action="{{ route('turnos.index') }}">
                <div class="flex items-center">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Buscar por operador, fecha, etc."
                        class="flex-grow px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                    <button
                        type="submit"
                        class="ml-2 px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Buscar
                    </button>
                    <a
                    href="{{ route('turnos.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500"
                >
                    Limpiar
                </a>
                </div>
            </form>
        </div>


        <!-- Calendario -->
        <div class="mb-8">
            <div id="calendar" style="width: 100%; height: 600px; background-color: lightgray;"></div>
        </div>



        <!-- Tabla de registros -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg mb-8">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hora de Inicio</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hora de Fin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Operador</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($turnos as $turno)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $turno->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $turno->start_time }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $turno->end_time }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $turno->shift_date }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $turno->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('turnos.show', $turno->id) }}" class="text-blue-600 hover:text-blue-900">Ver</a>
                                <a href="{{ route('turnos.edit', $turno->id) }}" class="text-yellow-600 hover:text-yellow-900 ml-4">Editar</a>
                                <form action="{{ route('turnos.destroy', $turno->id) }}" method="POST" class="inline ml-4">
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
    </div>
@endsection

@push('scripts')
    <!-- Incluye el CSS de FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

    <!-- Incluye el script principal de FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Script personalizado para inicializar el calendario -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');
        if (calendarEl) {
            console.log("Inicializando calendario...");
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es', // Configura el idioma español
                events: @json($eventos) || [], // Verifica que $eventos esté en formato correcto o sea un array vacío
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                dateClick: function (info) {
                    window.location.href = `/turnos/create?date=${info.dateStr}`;
                }
            });

            calendar.render(); // Renderiza el calendario después de inicializarlo
        } else {
            console.error("Elemento #calendar no encontrado.");
        }
    });
    </script>
@endpush
