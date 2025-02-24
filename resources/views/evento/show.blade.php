<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6">
                    <h1 class="text-3xl font-bold mb-4">{{ $evento->titulo }}</h1>

                    <div class="mb-6">
                        <p class="text-gray-700">{{ $evento->descripcion }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <h2 class="text-lg font-semibold mb-2">Detalles del Evento</h2>
                            <p><strong>Tipo:</strong> {{ ucfirst($evento->tipo) }}</p>
                            <p><strong>Lugar:</strong> {{ ucfirst($evento->lugar) }}</p>
                            <p><strong>Dia:</strong> {{ $evento->dia }}</p>
                            <p><strong>Hora Inicio:</strong> {{ $evento->hora_inicio->format('H:i') }}</p>
                            <p><strong>Hora Final:</strong> {{ $evento->hora_final->format('H:i') }}</p>
                            <p>
                                <strong>Precio Presencial:</strong> {{ $evento->precio_presencial_formateado }}
                            </p>
                            <p><strong>Precio Virtual:</strong> {{ $evento->precio_virtual_formateado }}</p>
                            @if ($evento->ponentes->isNotEmpty())
                                <p><strong>Cupo:</strong> {{ $evento->cupo_actual }} / {{ $evento->cupo_maximo }}</p>
                            @endif
                        </div>
                    </div>

                    @if ($evento->ponentes->isNotEmpty())
                        <div class="mb-6">
                            <h2 class="text-2xl font-semibold mb-3">Ponentes</h2>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($evento->ponentes as $ponente)
                                    <div class="flex items-center space-x-3">
                                        <img src="{{ $ponente->imagenUrl ?? 'assets/img/default.webp' }}"
                                            alt="{{ $ponente->nombre }}" class="w-12 h-12 rounded-full">
                                        <div>
                                            <p class="font-semibold">{{ $ponente->nombre }}</p>
                                            <p class="text-sm text-gray-600">
                                                {{ implode(', ', $ponente->areas_experiencia) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-8">
                            @if ($evento->cupo_actual < $evento->cupo_maximo)
                                @if (Auth::check() && auth()->user()->inscripciones()->where('evento_id', $evento->id)->exists())
                                    <p class="text-green-600 font-semibold">Ya estas inscrito en este evento</p>
                                @else
                                    <x-danger-button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-inscripcion')">
                                        {{ __('Inscribirse al Evento') }}
                                    </x-danger-button>

                                    <x-modal name="confirm-inscripcion" :show="$errors->inscripcion->isNotEmpty()" focusable>
                                        <div x-data="{ tipoInscripcion: 'presencial' }">
                                            <form method="POST" action="{{ route('inscripcion.store', $evento) }}"
                                                class="p-6">
                                                @csrf
                                                <input type="hidden" name="evento_id" value="{{ $evento->id }}">

                                                <h2 class="text-lg font-medium text-gray-900">
                                                    {{ __('¿Está seguro de querer inscribirse a este evento?') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-gray-600">
                                                    {{ __('Una vez inscrito, recibirá información adicional sobre el evento.') }}
                                                </p>

                                                <div class="mt-6">
                                                    <label for="tipo"
                                                        class="block text-sm font-medium text-gray-700">
                                                        {{ __('Tipo de Evento') }}
                                                    </label>
                                                    <select id="tipo" name="tipo" x-model="tipoInscripcion"
                                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                                        <option value="presencial">{{ __('Presencial') }}</option>
                                                        <option value="virtual">{{ __('Virtual') }}</option>
                                                    </select>
                                                    <x-input-error :messages="$errors->inscripcion->get('tipo')" class="mt-2" />
                                                </div>

                                                <p class="mt-4 text-sm text-gray-600">
                                                    Precio:
                                                    <span
                                                        x-text="tipoInscripcion === 'presencial' ? '{{ $evento->precio_presencial_formateado }}' : '{{ $evento->precio_virtual_formateado }}'"></span>
                                                </p>

                                                <div class="mt-6 flex justify-end">
                                                    <x-secondary-button x-on:click="$dispatch('close')">
                                                        {{ __('Cancelar') }}
                                                    </x-secondary-button>

                                                    <x-danger-button class="ms-3">
                                                        {{ __('Confirmar Inscripción') }}
                                                    </x-danger-button>
                                                </div>
                                            </form>
                                        </div>
                                    </x-modal>
                                @endif
                            @else
                                <p class="text-red-600 font-semibold">Este evento está completo</p>
                            @endif
                        </div>
                    @else
                        <div class="mt-8">
                            <p class="text-red-600 font-semibold">No hay ponentes disponibles para este evento</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('eventos.index') }}" class="text-blue-600 hover:underline">
                    Volver
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
