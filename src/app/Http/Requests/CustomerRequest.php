<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CustomerRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return match ($this->method()) {
            'POST' => $this->store(),
            'PUT', 'PATCH' => $this->update()
        };
    }

    public function store(): array
    {
        return [
            'name' => 'required|min:3',
            'surname' => "required|min:3",
            'cpf' => "required|size:11|unique:customers,cpf",
        ];
    }

    public function update(): array
    {
        return [
            'name' => 'required|min:3',
            'surname' => "required|min:3",
            'cpf' => "required|size:11|unique:customers,cpf,$this->customer->id",
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O Campo nome é de preenchimento obrigatório.',
            'name.min' => 'O Campo nome deve ter mais de 3 caracteres.',
            'surname.required' => 'O Campo sobrenome é de preenchimento obrigatório.',
            'surname.min' => 'O Campo sobrenome deve ter mais de 3 caracteres.',
            'cpf.required' => 'O Campo CPF é de preenchimento obrigatório.',
            'cpf.unique'  => 'O CPF informado já está em uso.',
            'cpf.size' => 'O Campo CPF deve ter 11 caracteres.',
        ];
    }

    public function failedValidation(Validator $validator): HttpResponseException
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
