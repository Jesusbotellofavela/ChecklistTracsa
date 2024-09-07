@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Generador {{ $generador->name }}</h1>
        <p><strong>ID:</strong> {{ $generador->id }}</p>
        <p><strong>Modelo:</strong> {{ $generador->model }}</p>
        <p><strong>Número de Serie:</strong> {{ $generador->serial_number }}</p>
        <a href="{{ route('generadores.index') }}" class="btn btn-primary">Regresar</a>
    </div>
@endsection
