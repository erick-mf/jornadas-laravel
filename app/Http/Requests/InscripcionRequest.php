<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InscripcionRequest extends FormRequest
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
            'evento_id' => ['required', 'exists:eventos,id', Rule::unique('inscripcions', 'evento_id')->ignore($this->route('inscripcion'))],
            'fecha_inscripcion' => ['required', 'date'],
        ];
    }

    public function messages(): array
    {
        return [
            'evento_id.required' => 'El evento es obligatorio',
            'evento_id.exists' => 'El evento seleccionado no es válido',
            'fecha_inscripcion.required' => 'La fecha de inscripción es obligatoria',
            'fecha_inscripcion.date' => 'La fecha de inscripción debe ser una fecha válida',
        ];
    }
}
