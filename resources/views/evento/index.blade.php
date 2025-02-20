<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold mb-6">Eventos</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($eventos as $evento)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold">{{ $evento->titulo }}</h2>
                            <p class="text-gray-600">{{ $evento->descripcion }}</p>
                            <p class="mt-2 text-gray-500"><strong>Tipo:</strong> {{ ucfirst($evento->tipo) }}</p>
                            <p class="mt-2 text-gray-500"><strong>Fecha y Hora:</strong>
                                {{ \Carbon\Carbon::parse($evento->fecha_hora)->format('d/m/Y H:i') }}</p>
                            <p class="mt-2 text-gray-500"><strong>Cupo:</strong> {{ $evento->cupo_actual }} /
                                {{ $evento->cupo_maximo }}</p>
                        </div>
                        <div class="flex justify-between p-4 bg-gray-100">
                            <a href="{{ route('eventos.show', $evento) }}" class="text-blue-600 hover:underline">Ver
                                Detalles</a>
                            <span class="text-sm text-gray-500">{{ $evento->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($eventos->isEmpty())
                <p class="mt-4 text-gray-600">No hay eventos disponibles en este momento.</p>
            @endif

            <!-- Paginación -->
            @include('components.pagination', ['paginator' => $eventos])
        </div>
    </div>
</x-app-layout>
