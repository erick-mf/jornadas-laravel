<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Lista de Eventos</h1>

                    <a href="{{ route('admin.eventos.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                        {{ __('Crear Evento') }}
                    </a>

                    @if ($eventos->isNotEmpty())
                        <table class="table-fixed w-full border">
                            <thead>
                                <tr>
                                    <th class="w-1/6 px-2 py-2">Tipo</th>
                                    <th class="w-1/4 px-4 py-2">Título</th>
                                    <th class="w-1/6 px-4 py-2">Descripción</th>
                                    <th class="w-1/6 px-4 py-2">Fecha y Hora</th>
                                    <th class="w-1/6 px-3 py-2">Cupo</th>
                                    <th class="w-1/6 px-3 py-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eventos as $evento)
                                    <tr class="odd:bg-gray-100">
                                        <td class="px-2 py-2">{{ $evento->tipo }}</td>
                                        <td class="px-4 py-2">{{ $evento->titulo }}</td>
                                        <td class="px-4 py-2">{{ $evento->descripcion }}</td>
                                        <td class="px-4 py-2">{{ $evento->fecha_hora->format('d/m/Y H:i') }}</td>
                                        <td class="px-4 py-2">
                                            {{ $evento->cupo_actual }} / {{ $evento->cupo_maximo }}
                                        </td>
                                        <td class="px-2 py-4">
                                            <div class="flex flex-col gap-2">
                                                <a href="{{ route('admin.eventos.edit', $evento) }}"
                                                    class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-sm text-center">Editar</a>
                                                <form action="{{ route('admin.eventos.destroy', $evento) }}"
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

                        @include('components.pagination', ['paginator' => $eventos])
                    @else
                        <p class="text-gray-600">No se encontraron eventos.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
