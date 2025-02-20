<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Lista de Ponentes</h1>

                    <a href="{{ route('admin.ponentes.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                        {{ __('Crear Ponente') }}
                    </a>
                    @if ($ponentes->isNotEmpty())
                        <table class="table-fixed w-full border">
                            <thead>
                                <tr>
                                    <th class="w-1/6 px-2 py-2">Nombre</th>
                                    <th class="w-1/4 px-4 py-2">Áreas de Experiencia</th>
                                    <th class="w-1/6 px-4 py-2">Redes Sociales</th>
                                    <th class="w-1/4 px-4 py-2">Foto</th>
                                    <th class="w-1/6 px-3 py-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ponentes as $ponente)
                                    <tr class="h-40 odd:bg-gray-100"> <!-- Altura fija para todas las filas -->
                                        <td class="px-2 py-2 overflow-y-auto">{{ $ponente->nombre }}</td>
                                        <td class="px-4 py-2 overflow-y-auto">
                                            {{ implode(', ', $ponente->areas_experiencia) }}
                                        </td>
                                        <td class="px-4 py-2 overflow-y-auto">
                                            <div class="flex flex-col items-center">
                                                @if ($ponente->redes_sociales)
                                                    @foreach ($ponente->redes_sociales as $red => $link)
                                                        <a href="https://{{ $red }}.com/{{ $link }}"
                                                            target="_blank" class="mb-1">
                                                            <strong>{{ ucfirst($red) }}</strong>
                                                        </a>
                                                    @endforeach
                                                @else
                                                    No tiene redes sociales disponibles
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-4 py-2">
                                            <div class="w-full h-32 overflow-hidden flex items-center justify-center">
                                                <img src="{{ $ponente->imagenUrl }}"
                                                    class="max-w-full max-h-full object-contain"
                                                    alt="{{ $ponente->nombre }}">
                                            </div>
                                        </td>
                                        <td class=" px-2 py-4">
                                            <div class="flex flex-col gap-2 h-full justify-center">
                                                <a href="{{ route('admin.ponentes.edit', $ponente) }}"
                                                    class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-sm text-center">Editar</a>
                                                <form action="{{ route('admin.ponentes.destroy', $ponente) }}"
                                                    method="POST" class="w-full">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-sm w-full text-center">Eliminar</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @include('components.pagination', ['paginator' => $ponentes])
                    @else
                        <p class="text-gray-600">No se encontraron ponentes.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
