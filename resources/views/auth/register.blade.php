<x-app-layout>
    <x-guest-layout>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="nombre" :value="__('Nombre')" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"
                    autofocus autocomplete="name" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Repetir contraseña')" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" autocomplete="new-password" />
            </div>

            <!-- Tipo Inscripcion -->
            <div class="mt-4">
                <x-input-label for="tipo_inscripcion" :value="__('Tipo de Inscripción')" />
                <x-input-error :messages="$errors->get('tipo_inscripcion')" class="mt-2" />
                <select id="tipo_inscripcion" class="block mt-1 w-full" name="tipo_inscripcion">
                    <option value="virtual" {{ old('tipo_inscripcion') == 'virtual' ? 'selected' : '' }}>Virtual
                    </option>
                    <option value="presencial" {{ old('tipo_inscripcion') == 'presencial' ? 'selected' : '' }}>
                        Presencial
                    </option>
                    <option value="gratuita" {{ old('tipo_inscripcion') == 'gratuita' ? 'selected' : '' }}>Gratuita
                    </option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Ya tienes una cuenta?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Registrar') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</x-app-layout>
