<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PonenteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $imageRule = 'sometimes|image|mimes:jpeg,png,jpg|max:2048';

        if ($this->method() === 'POST') {
            $imageRule = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        return [
            'nombre' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/', Rule::unique('ponentes', 'nombre')->ignore($this->route('ponente'))],
            'areas_experiencia' => 'required|array',
            'areas_experiencia.*' => 'string|max:255',
            'image' => $imageRule,
            'redes_sociales.twitter' => 'required|string|max:255',
            'redes_sociales.github' => 'required|string|max:255',
            'redes_sociales.linkedin' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no debe exceder los 255 caracteres.',
            'nombre.regex' => 'El nombre debe contener solo letras y espacios.',
            'nombre.unique' => 'El nombre ya está en uso.',

            'areas_experiencia.required' => 'Las áreas de experiencia son obligatorias.',
            'areas_experiencia.array' => 'Las áreas de experiencia deben ser un array.',
            'areas_experiencia.*.string' => 'Cada área de experiencia debe ser una cadena de texto.',
            'areas_experiencia.*.max' => 'Cada área de experiencia no debe exceder los 255 caracteres.',

            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif, svg.',
            'image.max' => 'La imagen no debe exceder los 2048 kilobytes.',
            'image.required' => 'La imagen es obligatoria.',

            'redes_sociales.twitter.max' => 'La URL de Twitter no debe exceder los 255 caracteres.',
            'redes_sociales.github.max' => 'La URL de GitHub no debe exceder los 255 caracteres.',
            'redes_sociales.linkedin.max' => 'La URL de Linkedin no debe exceder los 255 caracteres.',
        ];
    }
}
