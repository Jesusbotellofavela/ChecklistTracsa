<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center bg-gray-900">
        <!-- Background Image and Overlay -->
        <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1661660860311-dc26ed236d5f?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"></div>

        <!-- Registration Card -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden rounded-lg z-10">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/energialogo.png') }}" alt="Logo" class="w-35 h-auto">
            </div>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Title -->
                <h2 class="text-2xl font-bold text-center text-gray-900 mb-4">{{ __('Registrarse') }}</h2>

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nombre')" class="text-gray-900" />
                    <x-text-input id="name" class="block mt-1 w-full bg-white text-black border-gray-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-gray-900" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Correo electrónico')" class="text-gray-900" />
                    <x-text-input id="email" class="block mt-1 w-full bg-white text-black border-gray-300" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-gray-900" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" class="text-gray-900" />
                    <x-text-input id="password" class="block mt-1 w-full bg-white text-black border-gray-300" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-gray-900" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-gray-900" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full bg-white text-black border-gray-300" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-gray-900" />
                </div>

                <!-- Role -->
                <div class="mt-4">
                    <x-input-label for="rol" :value="__('Rol')" class="text-gray-900" />
                    <select id="rol" name="rol" class="block mt-1 w-full bg-white text-black border-gray-300">
                        <option value="Operación" {{ old('rol') == 'Operación' ? 'selected' : '' }}>Operación</option>
                        <option value="Servicio" {{ old('rol') == 'Servicio' ? 'selected' : '' }}>Servicio</option>
                    </select>
                    <x-input-error :messages="$errors->get('rol')" class="mt-2 text-gray-900" />
                </div>

                <!-- Already Registered -->
                <div class="flex items-center justify-between mt-4">
                    <a class="underline text-sm text-gray-900 hover:text-yellow-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300" href="{{ route('login') }}">
                        {{ __('¿Ya estás registrado?') }}
                    </a>

                    <x-primary-button class="ms-4 bg-yellow-600 hover:bg-yellow-700 text-white border-yellow-600">
                        {{ __('Registrarse') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
