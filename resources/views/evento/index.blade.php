<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold mb-6">Eventos</h1>

            @if ($eventos->isEmpty())
                <p class="mt-4 text-gray-600">No hay eventos disponibles en este momento.</p>
            @else
                <div class="flex flex-col space-y-6">
                    <div class="min-h-[500px]"> <!-- Contenedor con altura mínima -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($eventos as $evento)
                                <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col justify-between">
                                    <div class="p-4">
                                        <h2 class="text-xl font-semibold">{{ $evento->titulo }}</h2>
                                        <p class="text-gray-600">{{ $evento->descripcion }}</p>
                                        <p class="mt-2 text-gray-500"><strong>Tipo:</strong>
                                            {{ ucfirst($evento->tipo) }}</p>
                                        <p class="mt-2 text-gray-500"><strong>Dia:</strong>
                                            {{ $evento->dia }}</p>
                                        <p class="mt-2 text-gray-500"><strong>Hora Inicio:</strong>
                                            {{ $evento->hora_inicio->format('H:i') }}</p>
                                        <p class="mt-2 text-gray-500"><strong>Hora Final:</strong>
                                            {{ $evento->hora_final->format('H:i') }}</p>
                                        @if ($evento->ponentes->isNotEmpty())
                                            <p class="mt-2 text-gray-500"><strong>Cupo:</strong>
                                                {{ $evento->cupo_actual }}
                                                / {{ $evento->cupo_maximo }}</p>
                                        @endif
                                    </div>
                                    <div class="flex justify-between p-4 bg-gray-100">
                                        <a href="{{ route('eventos.show', $evento) }}"
                                            class="text-blue-600 hover:underline">Ver
                                            Detalles</a>
                                        <span
                                            class="text-sm text-gray-500">{{ $evento->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-8 flex justify-center">
                        @include('components.pagination', ['paginator' => $eventos])
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
