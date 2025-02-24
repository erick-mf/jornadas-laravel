<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold mb-6">Ponentes</h1>

            @if ($ponentes->isEmpty())
                <p class="mt-4 text-gray-600">No hay ponentes disponibles en este momento.</p>
            @else
                <div class="flex flex-col space-y-6">
                    <div class="min-h-[500px]"> <!-- Contenedor con altura mínima -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($ponentes as $ponente)
                                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                    <img src="{{ $ponente->imagenUrl }}" alt="{{ $ponente->nombre }}"
                                        class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h2 class="text-xl font-semibold">{{ $ponente->nombre }}</h2>
                                        <p class="text-gray-600 mt-2">{{ implode(', ', $ponente->areas_experiencia) }}
                                        </p>
                                        @if ($ponente->redes_sociales)
                                            <div class="mt-3 flex space-x-2">
                                                @foreach ($ponente->redes_sociales as $red => $link)
                                                    <a href="{{ $link }}" target="_blank"
                                                        class="text-blue-500 hover:text-blue-700">
                                                        {{ ucfirst($red) }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex justify-between p-4 bg-gray-100">
                                        <a href="{{ route('ponentes.show', $ponente) }}"
                                            class="text-blue-600 hover:underline">Ver
                                            Perfil</a>
                                        <span
                                            class="text-sm text-gray-500">{{ __('Publicado: ') }}{{ $ponente->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-8 flex justify-center">
                        @include('components.pagination', ['paginator' => $ponentes])
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
