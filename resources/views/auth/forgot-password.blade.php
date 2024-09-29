<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('¿Olvidaste tu password? Coloca tu email de registro y enviaremeos un enlace para que puedas crear uno nuevo') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex justify-between my-4">
            <x-link
                :href="route('login')"
            >
                Iniciar sesión
            </x-link>

            <x-link
                :href="route('register')"
            >
                Crear Cuenta 
            </x-link>
        </div>

        <x-primary-button>
            {{ __('Eviar instrucciones') }}
        </x-primary-button>
    </form>
</x-guest-layout>
