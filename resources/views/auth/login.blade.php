<x-app-layout>
    <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    autofocus autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                    autocomplete="current-password" />
            </div>
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Iniciar sesión') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</x-app-layout>
