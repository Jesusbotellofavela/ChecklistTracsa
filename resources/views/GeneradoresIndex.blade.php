<!-- resources/views/generadores/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Generadores</h1>
        <a href="{{ route('generadores.create') }}" class="btn btn-primary">Nuevo Generador</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Modelo</th>
                    <th>Número de Serie</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($generadores as $generador)
                    <tr>
                        <td>{{ $generador->id }}</td>
                        <td>{{ $generador->name }}</td>
                        <td>{{ $generador->model }}</td>
                        <td>{{ $generador->serial_number }}</td>
                        <td>
                            <a href="{{ route('generadores.show', $generador->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('generadores.edit', $generador->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('generadores.destroy', $generador->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
