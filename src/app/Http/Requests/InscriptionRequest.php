<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class InscriptionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'classroom_id' => 'required',
            'coffeebreak_id' => "required",
            'customer_id' => "required",
            'status' => "required",
        ];
    }

    public function messages(): array
    {
        return [
            'classroom_id.required' => 'O Campo Classe é de preenchimento obrigatório.',
            'coffeebreak_id.required' => 'O Campo Espaço de coffeebreak é de preenchimento obrigatório.',
            'customer_id.required' => 'O Campo Pessoa é de preenchimento obrigatório.',
            'status.required' => 'O Campo status é de preenchimento obrigatório.',
        ];
    }

    public function failedValidation(Validator $validator): HttpResponseException
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
