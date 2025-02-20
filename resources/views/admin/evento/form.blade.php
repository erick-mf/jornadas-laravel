<form method="POST" action="{{ $actionUrl }}" class="space-y-4">
    @csrf
    @method($method)
    <div>
        <label for="tipo" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Evento:</label>
        @error('tipo')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <select id="tipo" name="tipo"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Seleccione un tipo</option>
            <option value="conferencia" {{ old('tipo', $evento->tipo) == 'conferencia' ? 'selected' : '' }}>Conferencia
            </option>
            <option value="taller" {{ old('tipo', $evento->tipo) == 'taller' ? 'selected' : '' }}>Taller</option>
        </select>
    </div>

    <div>
        <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
        @error('titulo')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $evento->titulo) }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div>
        <label for="descripcion" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
        @error('descripcion')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <textarea id="descripcion" name="descripcion" rows="4"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('descripcion', $evento->descripcion) }}</textarea>
    </div>

    <div>
        <label for="fecha_hora" class="block text-gray-700 text-sm font-bold mb-2">Fecha y Hora:</label>
        @error('fecha_hora')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <input type="datetime-local" id="fecha_hora" name="fecha_hora"
            value="{{ old('fecha_hora', $evento->fecha_hora) }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div>
        <label for="cupo_maximo" class="block text-gray-700 text-sm font-bold mb-2">Cupo Máximo:</label>
        @error('cupo_maximo')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <input type="number" id="cupo_maximo" name="cupo_maximo"
            value="{{ old('cupo_maximo', $evento->cupo_maximo) }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="flex items-center justify-between">
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ $buttonText }}
        </button>
        <a href="{{ route('admin.eventos.index') }}"
            class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800">
            Cancelar
        </a>
    </div>
</form>
