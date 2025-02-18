<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Panel de Administración</h1>

                    <p class="text-gray-600 mb-8">Bienvenido al panel de administración. Aquí puedes gestionar los
                        eventos, ponentes, inscripciones y pagos.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="{{ route('admin.eventos.index') }}"
                            class="block p-6 bg-blue-100 hover:bg-blue-200 rounded-lg transition duration-300">
                            <h2 class="text-xl font-semibold mb-2">Gestionar Eventos</h2>
                            <p>Administra los eventos y talleres</p>
                        </a>
                        <a href="{{ route('admin.ponentes.index') }}"
                            class="block p-6 bg-green-100 hover:bg-green-200 rounded-lg transition duration-300">
                            <h2 class="text-xl font-semiboldmb-2">Gestionar Ponentes</h2>
                            <p>Administra los ponentes y sus perfiles</p>
                        </a>
                        <a href="{{ route('admin.inscripciones.index') }}"
                            class="block p-6 bg-yellow-100 hover:bg-yellow-200 rounded-lg transition duration-300">
                            <h2 class="text-xl font-semibold mb-2">Gestionar Inscripciones</h2>
                            <p>Revisa y gestiona las inscripciones</p>
                        </a>
                        <a href="{{ route('admin.pagos.index') }}"
                            class="block p-6 bg-purple-100 hover:bg-purple-200 rounded-lg transition duration-300">
                            <h2 class="text-xl font-semibold  mb-2">Gestionar Pagos</h2>
                            <p>Administra los pagos y transacciones</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
