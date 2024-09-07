@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Generador</h1>
        <form action="{{ route('generadores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="model">Modelo</label>
                <input type="text" id="model" name="model" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="serial_number">Número de Serie</label>
                <input type="text" id="serial_number" name="serial_number" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
