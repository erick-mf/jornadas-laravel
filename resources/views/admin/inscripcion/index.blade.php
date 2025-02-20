<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Lista de Inscripciones</h1>

                    @if ($inscripciones->isNotEmpty())
                        <table class="table-fixed w-full border">
                            <thead>
                                <tr>
                                    <th class="w-1/6 px-2 py-2">Usuario</th>
                                    <th class="w-1/6 px-2 py-2">Email</th>
                                    <th class="w-1/4 px-6 py-2">Evento</th>
                                    <th class="w-1/6 px-6 py-2">Fecha de Inscripción</th>
                                    <th class="w-1/6 px-3 py-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscripciones as $inscripcion)
                                    <tr class="odd:bg-gray-100">
                                        <td class="px-2 py-2">{{ $inscripcion->user->nombre }}</td>
                                        <td class="px-2 py-2">{{ $inscripcion->user->email }}</td>
                                        <td class="px-6 py-2">{{ $inscripcion->evento->titulo }}</td>
                                        <td class="px-6 py-2">{{ $inscripcion->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="px-2 py-4">
                                            <div class="flex flex-col gap-2">
                                                <a href="{{ route('admin.inscripciones.edit', $inscripcion) }}"
                                                    class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-sm text-center">Editar</a>
                                                <form action="{{ route('admin.inscripciones.destroy', $inscripcion) }}"
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

                        @include('components.pagination', ['paginator' => $inscripciones])
                    @else
                        <p class="text-gray-600">No se encontraron inscripciones.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
