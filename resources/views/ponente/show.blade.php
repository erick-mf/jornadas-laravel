<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-2/3 p-6">
                        <h1 class="text-3xl font-bold mb-4">{{ $ponente->nombre }}</h1>

                        <div class="mb-6">
                            <h2 class="text-xl font-semibold mb-2">Áreas de Experiencia</h2>
                            <p class="text-gray-700">{{ implode(', ', $ponente->areas_experiencia) }}</p>
                        </div>

                        @if ($ponente->redes_sociales)
                            <div class="mb-6">
                                <h2 class="text-xl font-semibold mb-2">Redes Sociales</h2>
                                <div class="flex space-x-4">
                                    @foreach ($ponente->redes_sociales as $red => $link)
                                        <a href="{{ $link }}" target="_blank"
                                            class="text-blue-600 hover:text-blue-800">
                                            {{ ucfirst($red) }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($ponente->eventos->isNotEmpty())
                            <div class="mb-6">
                                <h2 class="text-xl font-semibold mb-2">Próximos Eventos</h2>
                                <ul class="list-disc list-inside">
                                    @foreach ($ponente->eventos as $evento)
                                        <li>
                                            <a href="{{ route('eventos.show', $evento) }}"
                                                class="text-blue-600 hover:underline">
                                                {{ $evento->titulo }} - {{ $evento->fecha_hora->format('d/m/Y H:i') }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="md:w-1/4 w-full">
                        <img src="{{ asset($ponente->imagenUrl ?? 'assets/img/default.webp') }}"
                            alt="{{ $ponente->nombre }}" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('ponentes.index') }}" class="text-blue-600 hover:underline">
                    Volver a la lista de ponentes
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
