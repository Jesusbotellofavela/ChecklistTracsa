@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Generador</h1>
        <a href="{{ route('generadores.index') }}" class="btn btn-primary">Regresar</a>
        <form action="{{ route('generadores.update', $generador->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $generador->name }}" required>
            </div>
            <div class="form-group">
                <label for="model">Modelo</label>
                <input type="text" name="model" class="form-control" value="{{ $generador->model }}" required>
            </div>
            <div class="form-group">
                <label for="serial_number">Número de Serie</label>
                <input type="text" name="serial_number" class="form-control" value="{{ $generador->serial_number }}" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
@endsection
