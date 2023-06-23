<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClassroomRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'capacity' => "required|numeric",
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O Campo nome é de preenchimento obrigatório.',
            'name.min' => 'O Campo nome deve ter mais de 3 caracteres.',
            'capacity.required' => 'O Campo lotação é de preenchimento obrigatório.',
            'capacity.numeric' => 'O Campo lotação deve ser um valor inteiro maio que zero.',
        ];
    }

    public function failedValidation(Validator $validator): HttpResponseException
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
