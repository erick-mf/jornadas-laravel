<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($inscripciones->isEmpty())
                        <p class="mt-4 text-gray-600 mb-4 text-center font-semibold text-lg">
                            {{ __('No tienes inscripciones actualmente.') }}</p>
                    @else
                        <h3 class="text-xl font-semibold mb-2">{{ __('Tus Inscripciones') }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($inscripciones as $inscripcion)
                                <div class="bg-gray-100 p-4 rounded-lg flex flex-col justify-between">
                                    <div>
                                        <h4 class="font-semibold">{{ $inscripcion->evento->titulo }}</h4><br>
                                        <p>{{ __('Tipo') }}: {{ ucfirst($inscripcion->evento->tipo) }}</p>
                                        <p>{{ __('Dia') }}: {{ $inscripcion->evento->dia }}
                                        </p>
                                        <p>{{ __('Hora Inicio') }}:
                                            {{ $inscripcion->evento->hora_inicio->format('H:i') }}
                                        <p>{{ __('Hora Final') }}:
                                            {{ $inscripcion->evento->hora_final->format('H:i') }}
                                        </p>
                                        <p>{{ __('Tipo de Inscripcion') }}:
                                            {{ ucfirst($inscripcion->tipo_inscripcion) }}</p>
                                    </div>
                                    <div>
                                        <x-danger-button x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-eliminar-inscripcion')">
                                            {{ __('Eliminar Inscripción') }}
                                        </x-danger-button>

                                        <x-modal name="confirm-eliminar-inscripcion" :show="$errors->inscripcionDelete->isNotEmpty()" focusable>
                                            <form method="POST"
                                                action="{{ route('inscripcion.destroy', $inscripcion) }}"
                                                class="p-6">
                                                @csrf
                                                @method('DELETE')

                                                <h2 class="text-lg font-medium text-gray-900">
                                                    {{ __('¿Está seguro de querer eliminar esta inscripción?') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-gray-600">
                                                    {{ __('Una vez eliminada la inscripción, todos los recursos asociados serán permanentemente eliminados.') }}
                                                </p>

                                                <div class="mt-6 flex justify-end">
                                                    <x-secondary-button type="button" x-on:click="$dispatch('close')">
                                                        {{ __('Cancelar') }}
                                                    </x-secondary-button>

                                                    <x-danger-button type="submit" class="ms-3">
                                                        {{ __('Confirmar Eliminación') }}
                                                    </x-danger-button>
                                                </div>
                                            </form>
                                        </x-modal>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
