<?php

namespace App\Http\Requests\Agricola\FincaGroups;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateFincaGroupRequest extends FormRequest
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
            'code' => ['required', 'unique:finca_groups,code'],
            'finca_id' => ['required', 'numeric', 'exists:fincas,id'],
            'lote_id' => ['required', 'numeric', 'exists:lotes,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'El código del grupo es requerido',
            'code.numeric' => 'El código debe de ser un dato númerico',
            'code.unique' => 'El código ya existe',
            'finca_id.required' => 'La finca es requerida',
            'finca_id.numeric' => 'La finca debe de ser un dato númerico',
            'finca_id.exists' => 'La finca no existe',
            'lote_id.required' => 'El lote es requerido',
            'lote_id.numeric' => 'El lote debe de ser un dato númerico',
            'lote_id.exists' => 'El lote no existe',
        ];
    }
}
