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
                <option value="{{ $evento->id }}" {{ $inscripcion->evento_id == $evento->id ? 'selected' : '' }}>
                    {{ $evento->titulo }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="fecha_inscripcion" class="block text-sm font-medium text-gray-700">Fecha de
            Inscripción</label>
        <input type="datetime-local" id="fecha_inscripcion" name="fecha_inscripcion"
            value="{{ $inscripcion->created_at->format('Y-m-d\TH:i') }}"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    </div>

    <div class="flex items-center justify-end mt-4">
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ $buttonText }}
        </button>
        <a href="{{ route('admin.inscripciones.index') }}"
            class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800">
            Cancelar
        </a>
    </div>
</form>
