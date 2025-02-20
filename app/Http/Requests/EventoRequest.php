<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventoRequest extends FormRequest
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
        return [
            'tipo' => 'required|in:conferencia,taller',
            'titulo' => ['required', 'max:255', 'string', Rule::unique('eventos', 'titulo')->ignore($this->route('evento'))],
            'descripcion' => 'required|string',
            'fecha_hora' => 'required|date_format:Y-m-d\TH:i|after:now',
            'cupo_maximo' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'tipo.required' => 'El tipo de evento es obligatorio.',
            'tipo.in' => 'El tipo de evento seleccionado no es válido.',

            'titulo.required' => 'El título del evento es obligatorio.',
            'titulo.max' => 'El título no puede tener más de 255 caracteres.',
            'titulo.string' => 'El título debe ser una cadena de texto.',
            'titulo.unique' => 'El título del evento ya existe.',

            'descripcion.required' => 'La descripción del evento es obligatoria.',

            'fecha_hora.required' => 'La fecha y hora del evento son obligatorias.',
            'fecha_hora.date_format' => 'El formato de fecha y hora no es válido.',
            'fecha_hora.after' => 'La fecha y hora deben ser posteriores a la actual.',

            'cupo_maximo.required' => 'El cupo máximo es obligatorio.',
            'cupo_maximo.integer' => 'El cupo máximo debe ser un número entero.',
            'cupo_maximo.min' => 'El cupo máximo debe ser al menos 1.',
        ];
    }
}
