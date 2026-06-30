<?php

namespace App\Http\Requests\Agricola\CropSteps;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCropStepRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'crop_id' =>        ['required', 'numeric', 'exists:crops,id'],
            'step_order' =>     ['required', 'numeric'],
            'result_key' =>     ['required', 'string'],
            'operation' =>      ['required', 'string'],
            'left' =>           ['required', 'string'],
            'right' =>           ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'crop_id.required' => 'El cultivo es obligatorio.',
            'crop_id.numeric'  => 'El cultivo debe ser un valor numérico.',
            'crop_id.exists'   => 'El cultivo seleccionado no existe.',

            'step_order.required' => 'El orden del paso es obligatorio.',
            'step_order.numeric'  => 'El orden del paso debe ser un valor numérico.',

            'result_key.required' => 'La clave del resultado es obligatoria.',
            'result_key.string'   => 'La clave del resultado debe ser una cadena de texto.',

            'operation.required' => 'La operación es obligatoria.',
            'operation.string'   => 'La operación debe ser una cadena de texto.',

            'left.required' => 'El operando izquierdo es obligatorio.',
            'left.string'   => 'El operando izquierdo debe ser una cadena de texto.',

            'right.required' => 'El operando derecho es obligatorio.',
            'right.string'   => 'El operando derecho debe ser una cadena de texto.',
        ];
    }
}
