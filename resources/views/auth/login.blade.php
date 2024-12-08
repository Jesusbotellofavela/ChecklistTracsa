@extends('layouts.guest')
    <div class="min-h-screen flex flex-col sm:justify-center items-center bg-gray-900">
        <!-- Background Image and Overlay -->
        <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1661660860311-dc26ed236d5f?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"></div>

        <!-- Login Card -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden rounded-lg z-10">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/energialogo.png') }}" alt="Logo" class="w-35 h-auto">
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-gray-100" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Title -->
                <h2 class="text-2xl font-bold text-center text-gray-900 mb-4">{{ __('Iniciar Sesión') }}</h2>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" class="text-black font-semibold" :value="__('Correo electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full bg-white text-black border-gray-300" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>


                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" class="text-gray-900" :value="__('Contraseña')" />
                    <x-text-input id="password" class="block mt-1 w-full bg-white text-black border-gray-300" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-gray-900" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center text-gray-900">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-yellow-600 focus:ring-yellow-300" name="remember">
                        <span class="ms-2 text-sm">{{ __('Recuérdame') }}</span>
                    </label>
                </div>

                <!-- Forgot Password and Submit Button -->
                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-900 hover:text-yellow-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-yellow-600 hover:bg-yellow-700 text-white border-yellow-600">
                        {{ __('Iniciar sesión') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Register Redirect -->
            <div class="mt-6 text-center">
                <a href="{{ route('register') }}" class="text-sm text-gray-900 hover:text-yellow-600">
                    {{ __('¿No tienes una cuenta? Regístrate') }}
                </a>
            </div>
        </div>
    </div>
    @endsection
