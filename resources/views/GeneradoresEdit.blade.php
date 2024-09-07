@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Generador</h1>
        <div class="card">
            <div class="card-header">
                <h2>Generador: {{ $generador->name }}</h2>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>ID:</strong> {{ $generador->id }}</li>
                    <li class="list-group-item"><strong>Nombre:</strong> {{ $generador->name }}</li>
                    <li class="list-group-item"><strong>Modelo:</strong> {{ $generador->model }}</li>
                    <li class="list-group-item"><strong>Número de Serie:</strong> {{ $generador->serial_number }}</li>
                </ul>
                <a href="{{ route('generadores.edit', $generador->id) }}" class="btn btn-warning mt-3">Editar</a>
                <form action="{{ route('generadores.destroy', $generador->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-3">Eliminar</button>
                </form>
                <a href="{{ route('generadores.index') }}" class="btn btn-secondary mt-3">Volver a la Lista</a>
            </div>
        </div>
    </div>
@endsection
