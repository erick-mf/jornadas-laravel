<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Lista de Ponentes</h1>

                    <a href="{{ route('ponentes.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                        Crear Nuevo Ponente
                    </a>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Áreas de Experiencia</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ponentes as $ponente)
                                <tr>
                                    <td class="border px-4 py-2">{{ $ponente->nombre }}</td>
                                    <td class="border px-4 py-2">{{ $ponente->areas_experiencia }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('ponentes.show', $ponente->id) }}"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ver</a>
                                        <a href="{{ route('ponentes.edit', $ponente->id) }}"
                                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                                        <form action="{{ route('ponentes.destroy', $ponente->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
