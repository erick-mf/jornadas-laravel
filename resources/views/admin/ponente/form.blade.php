<form method="POST" action="{{ $actionUrl }}" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method($method)
    <div>
        <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
        @error('nombre')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $ponente->nombre) }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <x-select-form name="areas_experiencia" :options="['Desarrollo Web', 'Diseño UX/UI', 'Marketing Digital', 'Cloud Computing', 'Inteligencia Artificial']" :selected="old('areas_experiencia', $ponente ? $ponente->areas_experiencia : [])" />

    <div>
        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
        @error('image')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <input type="file" id="image" name="image"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div>
        <label for="redes_sociales[twitter]" class="block text-gray-700 text-sm font-bold mb-2">Twitter:</label>
        @error('redes_sociales.twitter')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <input type="text" id="redes_sociales[twitter]" name="redes_sociales[twitter]"
            value="{{ old('redes_sociales.twitter', $ponente->redes_sociales['twitter'] ?? '') }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div>
        <label for="redes_sociales[github]" class="block text-gray-700 text-sm font-bold mb-2">GitHub:</label>
        @error('redes_sociales.github')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <input type="text" id="redes_sociales[github]" name="redes_sociales[github]"
            value="{{ old('redes_sociales.github', $ponente->redes_sociales['github'] ?? '') }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div>
        <label for="redes_sociales[linkedin]" class="block text-gray-700 text-sm font-bold mb-2">LinkedIn:</label>
        @error('redes_sociales.linkedin')
            <p class="text-red-500 text-sm italic">{{ $message }}</p>
        @enderror
        <input type="text" id="redes_sociales[linkedin]" name="redes_sociales[linkedin]"
            value="{{ old('redes_sociales.linkedin', $ponente->redes_sociales['linkedin'] ?? '') }}"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="flex items-center justify-between">
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ $buttonText }}
        </button>
        <a href="{{ route('admin.ponentes.index') }}"
            class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800">
            Cancelar
        </a>
    </div>
</form>
