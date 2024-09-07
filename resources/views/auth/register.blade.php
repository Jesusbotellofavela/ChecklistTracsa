@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-lg-8">
        <a href="javascript:window.history.back()" class="btn btn-secondary">Regresar</a>
            <div class="card custom-card">
                <div class="card-header">{{ __('Registro') }}</div>
                <div class="card-body py-5 px-md-5">
                    <img src="{{ asset('images/RSPNG.png') }}" alt="RBO" style="height: 100px; position: absolute; top: 25px; right: 10px;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-outline mb-4">
                            <label for="name" class="form-label">{{ __('Nombre') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <label for="email" class="form-label">{{ __('Dirección de correo electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <label for "password" class="form-label">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <label for="password-confirm" class="form-label">{{ __('Confirmar Contraseña') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-dark btn-block">{{ __('Registrarse') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

