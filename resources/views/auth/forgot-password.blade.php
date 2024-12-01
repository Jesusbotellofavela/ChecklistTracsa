<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center bg-gray-900">
        <!-- Background Image and Overlay -->
        <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('https://images.unsplash.com/photo-1661660860311-dc26ed236d5f?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');"></div>

        <!-- Forgot Password Card -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden rounded-lg z-10">
            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/energialogo.png') }}" alt="Logo" class="w-35 h-auto">
            </div>

            <!-- Message -->
            <div class="mb-4 text-sm text-gray-800 font-medium text-center">
                {{ __('¿Olvidaste tu contraseña? No hay problema. Ingresa tu correo y te enviaremos un enlace para restablecerla.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-green-600 text-center" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" class="text-gray-900" :value="__('Correo Electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full bg-white text-black border-gray-300" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="bg-black hover:bg-yellow-300 text-black border-black">
                        {{ __('Enviar enlace de restablecimiento') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Back to Login -->
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-sm text-gray-900 hover:text-yellow-300">
                    {{ __('Volver a iniciar sesión') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
