<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Lista de Pagos</h1>

                    <p class="mb-4 text-gray-600">Total de pagos: {{ $totalDePagos }}</p>
                    @if ($pagos->isNotEmpty())
                        <table class="table-fixed w-full border">
                            <thead>
                                <tr>
                                    <th class="w-1/4 px-4 py-2">Usuario</th>
                                    <th class="w-1/6 px-4 py-2">Rol</th>
                                    <th class="w-1/6 px-4 py-2">Monto</th>
                                    <th class="w-1/6 px-4 py-2">Estado</th>
                                    <th class="w-1/6 px-4 py-2">Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pagos as $pago)
                                    <tr class="odd:bg-gray-100">
                                        <td class="px-4 py-2">{{ $pago->user->nombre }}</td>
                                        <td class="px-4 py-2">{{ $pago->user->rol }}</td>
                                        @if ($pago->user->rol === 'estudiante')
                                            <td class="px-4 py-2">0</td>
                                        @else
                                            <td class="px-4 py-2">{{ $pago->monto }}</td>
                                        @endif
                                        <td class="px-4 py-2">{{ $pago->estado }}</td>
                                        <td class="px-4 py-2">{{ $pago->created_at->format('d/m/Y') }}</td>
                                        <!-- <td class="px-2 py-4"> -->
                                        <!--     <div class="flex flex-col gap-2"> -->
                                        <!--         <a href="{{ route('admin.pagos.edit', $pago) }}" -->
                                        <!--             class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-sm text-center">Editar</a> -->
                                        <!--         <form action="{{ route('admin.pagos.destroy', $pago) }}" method="POST" -->
                                        <!--             class="w-full"> -->
                                        <!--             @csrf -->
                                        <!--             @method('DELETE') -->
                                        <!--             <button type="submit" -->
                                        <!--                 class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-sm w-full text-center">Eliminar</button> -->
                                        <!--         </form> -->
                                        <!--     </div> -->
                                        <!-- </td> -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @include('components.pagination', ['paginator' => $pagos])
                    @else
                        <p class="text-gray-600">No se encontraron pagos.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
