<form method="POST" action="{{ $actionUrl }}" class="space-y-4">
    @csrf
    @method($method)

    <div>
        <label class="block text-gray-700 text-sm font-bold mb-2">Ponentes:</label>
        @error('ponentes')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <div class="mt-2 flex flex-wrap -mx-2">
            @foreach ($ponentes as $clave => $ponente)
                <div class="w-1/2 px-2 mb-2">
                    <div class="flex items-center">
                        <input type="checkbox" id="ponente_{{ $ponente->id }}" name="ponentes[]"
                            value="{{ $ponente->id }}"
                            {{ in_array($ponente->id, old('ponentes', $evento->ponentes->pluck('id')->toArray())) ? 'checked' : '' }}
                            class="form-checkbox h-5 w-5 text-blue-600">
                        <label for="ponente_{{ $ponente->id }}"
                            class="ml-2 text-gray-700">{{ $ponente->nombre }}</label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

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
        <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Fecha:</label>
        @error('fecha')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <select id="fecha" name="fecha"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Seleccione un día</option>
            <option value="jueves" {{ old('fecha', $evento->dia) == 'jueves' ? 'selected' : '' }}>Jueves</option>
            <option value="viernes" {{ old('fecha', $evento->dia) == 'viernes' ? 'selected' : '' }}>Viernes</option>
        </select>
    </div>

    <div>
        <label for="hora_inicio" class="block text-gray-700 text-sm font-bold mb-2">Hora de inicio:</label>
        @error('hora_inicio')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <select id="hora_inicio" name="hora_inicio"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Seleccione hora de inicio</option>
            @foreach (['10:00', '11:00', '12:00', '13:00', '16:00', '17:00', '18:00'] as $hora)
                <option value="{{ $hora }}"
                    {{ old('hora_inicio', $evento->hora_inicio?->format('H:i') ?? '') == $hora ? 'selected' : '' }}>
                    {{ $hora }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="hora_final" class="block text-gray-700 text-sm font-bold mb-2">Hora final:</label>
        @error('hora_final')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <select id="hora_final" name="hora_final"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Seleccione hora final</option>
            @foreach (['10:55', '11:55', '12:55', '13:55', '16:55', '17:55', '18:55'] as $hora)
                <option value="{{ $hora }}"
                    {{ old('hora_final', $evento->hora_final?->format('H:i') ?? '') == $hora ? 'selected' : '' }}>
                    {{ $hora }}
                </option>
            @endforeach
        </select>
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
