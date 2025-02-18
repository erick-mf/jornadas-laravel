<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nombre" :value="__('Name')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Tipo Inscripcion -->
        <div class="mt-4">
            <x-input-label for="tipo_inscripcion" :value="__('Tipo de Inscripción')" />
            <select id="tipo_inscripcion" class="block mt-1 w-full" name="tipo_inscripcion" required>
                <option value="virtual" {{ old('tipo_inscripcion') == 'virtual' ? 'selected' : '' }}>Virtual</option>
                <option value="presencial" {{ old('tipo_inscripcion') == 'presencial' ? 'selected' : '' }}>Presencial
                </option>
                <option value="gratuita" {{ old('tipo_inscripcion') == 'gratuita' ? 'selected' : '' }}>Gratuita</option>
            </select>
            <x-input-error :messages="$errors->get('tipo_inscripcion')" class="mt-2" />
        </div>

        <!-- Rol -->
        <div class="mt-4">
            <x-input-label for="rol" :value="__('Rol')" />
            <select id="rol" class="block mt-1 w-full" name="rol" required>
                <option value="estudiante" {{ old('rol') == 'estudiante' ? 'selected' : '' }}>Estudiante</option>
                <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <!-- Cuenta Confirmada -->
        <div class="mt-4">
            <x-input-label for="cuenta_confirmada" :value="__('Cuenta Confirmada')" />
            <input type="checkbox" id="cuenta_confirmada" name="cuenta_confirmada" value="1"
                {{ old('cuenta_confirmada') ? 'checked' : '' }} />
            <x-input-error :messages="$errors->get('cuenta_confirmada')" class="mt-2" />
        </div>

        <!-- Token de Confirmación -->
        <div class="mt-4">
            <x-input-label for="token_confirmacion" :value="__('Token de Confirmación')" />
            <x-text-input id="token_confirmacion" class="block mt-1 w-full" type="text" name="token_confirmacion"
                :value="old('token_confirmacion')" />
            <x-input-error :messages="$errors->get('token_confirmacion')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
