    @vite ('resources/js/script.js')
    <form action="{{ $actionUrl }}" method="POST">
        @csrf
        @method($method)

        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">Usuario</label>
            <input type="text" id="user_id" name="user_id" value="{{ $inscripcion->user->nombre }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" disabled>
        </div>

        <div class="mb-4">
            <label for="evento_id" class="block text-sm font-medium text-gray-700">Evento</label>
            <select id="evento_id" name="evento_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @foreach ($inscripcion->getEventos() as $evento)
                    <option value="{{ $evento->id }}" data-dia="{{ $evento->dia }}"
                        data-hora-inicio="{{ $evento->hora_inicio->format('H:i') }}"
                        data-hora-final="{{ $evento->hora_final->format('H:i') }}"
                        data-cupo="{{ $evento->cupo_maximo - $evento->cupo_actual }}"
                        {{ $inscripcion->evento_id == $evento->id ? 'selected' : '' }}>
                        {{ $evento->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="dia_evento" class="block text-sm font-medium text-gray-700">Día del Evento</label>
            <input type="text" id="dia_evento" readonly
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100">
        </div>

        <div class="mb-4">
            <label for="hora_evento" class="block text-sm font-medium text-gray-700">Hora del Evento</label>
            <input type="text" id="hora_evento" readonly
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100">
        </div>

        <div class="mb-4">
            <label for="cupo_disponible" class="block text-sm font-medium text-gray-700">Cupo Disponible</label>
            <input type="text" id="cupo_disponible" readonly
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100">
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                {{ $buttonText }}
            </button>
            <a href="{{ route('admin.inscripciones.index') }}"
                class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800 ml-4">
                Cancelar
            </a>
        </div>
    </form>
