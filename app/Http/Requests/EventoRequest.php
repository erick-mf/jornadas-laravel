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
            'ponentes' => 'nullable|array',
            'ponentes.*' => 'exists:ponentes,id',
            'tipo' => 'required|in:conferencia,taller',
            'titulo' => ['required', 'max:255', 'string', Rule::unique('eventos', 'titulo')->ignore($this->route('evento'))],
            'descripcion' => 'required|string',
            'fecha' => 'required|string|in:jueves,viernes',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_final' => 'required|date_format:H:i|after:hora_inicio',
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

            'fecha.required' => 'La fecha del evento son obligatorias.',
            'fecha.in' => 'La fecha del evento debe ser jueves o viernes.',
            'hora_inicio.required' => 'La hora de inicio del evento es obligatoria.',
            'hora_final.required' => 'La hora de finalización del evento es obligatoria.',
            'hora_final.after' => 'La hora de finalización debe ser posterior a la de inicio.',

            'cupo_maximo.required' => 'El cupo máximo es obligatorio.',
            'cupo_maximo.integer' => 'El cupo máximo debe ser un número entero.',
            'cupo_maximo.min' => 'El cupo máximo debe ser al menos 1.',
        ];
    }
}
