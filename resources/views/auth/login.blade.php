@extends('layouts.app')


@section('content')
<section class="text-center text-lg-start">
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }

    .custom-card {
      border: 1px solid #e0e0e0;
      box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
      margin: 10px;
      padding: 20px;
    }

    .custom-button {
      background-color: #000; /* Fondo negro */
      color: #fff; /* Texto blanco */
    }
  </style>

<div class="container">
  <div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-lg-8">
      <div class="card custom-card">
        <div class="card-body py-5 px-md-5">
          <div class="row">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
                class="img-fluid rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
            </div>
            <div class="col-md-6 col-lg-7">
              <div>
                <img src="{{ asset('images/RSPNG.png') }}" alt="RBO" style="height: 100px;">
                <strong style="font-size: 24px;">CheckListTracsa</strong>

                <p><strong style="font-size: 24px;">Bienvenido, inicia sesión o regístrate</strong></p>
                <form method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="form-outline mb-4">
                    <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                      value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-outline mb-4">
                    <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                      {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      {{ __('Recordarme') }}
                    </label>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <button type="submit" class="btn btn-dark btn-block mb-2">{{ __('Iniciar Sesión') }}</button>
                    </div>
                    <div class="col-md-6">
                      @if (Route::has('register'))
                      <a href="{{ route('register') }}"
                        class="btn btn-dark btn-block text-white">{{ __('Registrarse') }}</a>

                      @endif
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

