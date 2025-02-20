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
                            <p><strong>Fecha:</strong> {{ $evento->fecha_hora->format('d/m/Y') }}
                            </p>
                            <p><strong>Hora:</strong> {{ $evento->fecha_hora->format('H:i') }}
                            </p>
                            <p><strong>Cupo:</strong> {{ $evento->cupo_actual }} / {{ $evento->cupo_maximo }}</p>
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
                    @endif

                    <div class="mt-8">
                        @if ($evento->ponentes->isNotEmpty())
                            @if ($evento->cupo_actual < $evento->cupo_maximo)
                                <a href="#"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Inscribirse al Evento
                                </a>
                            @else
                                <p class="text-red-600 font-semibold">Este evento está completo</p>
                            @endif
                        @else
                            <p class="text-red-600 font-semibold">No hay ponentes disponibles para este evento</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('eventos.index') }}" class="text-blue-600 hover:underline">
                    Volver a la lista de eventos
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
