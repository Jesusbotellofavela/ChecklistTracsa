<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center bg-gray-900">
        <!-- Background Image and Overlay -->
        <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1661660860311-dc26ed236d5f?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"></div>

        <!-- Login Card -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden rounded-lg z-10"> <!-- Fondo amarillo -->
            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-gray-100" :status="session('status')" /> <!-- Texto blanco -->

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Title -->
                <h2 class="text-2xl font-bold text-center text-gray-900 mb-4">{{ __('Iniciar Sesión') }}</h2> <!-- Texto blanco -->

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" class="text-gray-900" :value="__('Correo electrónico')" /> <!-- Texto blanco -->
                    <x-text-input id="email" class="block mt-1 w-full bg-black text-black border-black" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" /> <!-- Fondo blanco, texto negro, bordes negros -->
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-gray-900" /> <!-- Error en blanco -->
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" class="text-white" :value="__('Contraseña')" /> <!-- Texto blanco -->
                    <x-text-input id="password" class="block mt-1 w-full bg-black text-black border-black" type="password" name="password" required autocomplete="current-password" /> <!-- Fondo blanco, texto negro, bordes negros -->
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-black" /> <!-- Error en blanco -->
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center text-black"> <!-- Texto blanco -->
                        <input id="remember_me" type="checkbox" class="rounded border-black text-yellow-200 focus:ring-black" name="remember"> <!-- Checkbox con bordes negros -->
                        <span class="ms-2 text-sm">{{ __('Recuérdame') }}</span>
                    </label>
                </div>

                <!-- Forgot Password and Submit Button -->
                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-black hover:text-yellow-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-black hover:bg-yellow-300 text-black border-black"> <!-- Botón negro, con hover amarillo -->
                        {{ __('Iniciar sesión') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Register Redirect -->
            <div class="mt-6 text-center">
                <a href="{{ route('register') }}" class="text-sm text-black hover:text-yellow-300"> <!-- Texto blanco, hover amarillo -->
                    {{ __('¿No tienes una cuenta? Regístrate') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
