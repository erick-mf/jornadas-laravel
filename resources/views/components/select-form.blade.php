@props([
    'name' => 'areas_experiencia',
    'options' => [],
    'selected' => [],
    'label' => 'Áreas de Experiencia',
])

<div>
    <label class="block text-gray-700 text-sm font-bold mb-2">{{ $label }}:</label>

    @error($name)
        <p class="text-red-500 text-sm italic">{{ $message }}</p>
    @enderror

    <div class="space-y-2">
        @foreach ($options as $option)
            <div class="flex items-center">
                <input type="checkbox" id="{{ $name }}_{{ Str::slug($option) }}" name="{{ $name }}[]"
                    value="{{ $option }}"
                    class="form-checkbox h-5 w-5 text-blue-600 rounded shadow-sm focus:ring-blue-500"
                    @if (in_array($option, $selected)) checked @endif>
                <label for="{{ $name }}_{{ Str::slug($option) }}" class="ml-2 block text-gray-900 text-sm">
                    {{ $option }}
                </label>
            </div>
        @endforeach
    </div>

</div>
