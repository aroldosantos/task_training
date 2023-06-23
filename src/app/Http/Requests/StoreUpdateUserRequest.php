<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return match ($this->method()) {
            'POST' => $this->store(),
            'PUT', 'PATCH' => $this->update()
        };
    }

    /**
     * Get the validation rules that apply to the post request.
     *
     * @return array
     */
    public function store(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ];
    }

    /**
     * Get the validation rules that apply to the put/patch request.
     *
     * @return array
     */
    public function update()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => "required|string|email|max:255|unique:users,email,$this->user->id",
            'password' => 'required|string|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O Campo nome é de preenchimento obrigatório.',
            'name.min' => 'O Campo nome deve ter 3 ou mais caracteres.',
            'name.max' => 'O Campo nome deve ter menos de 255 caracteres.',
            'email.required' => 'O Campo email é de preenchimento obrigatório.',
            'email.unique' => 'O email informado já está em uso.',
            'email.email' => 'Digite um email válido.',
            'password.required' => 'O Campo senha é de preenchimento obrigatório.',
            'password.min' => 'O Campo senha deve ter no mínimo 8 caracteres.',
            'password.required' => 'O Campo senha é de preenchimento obrigatório.',
            'password.confirmed' => 'Confirme sua senha.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        //write your bussiness logic here otherwise it will give same old JSON response
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
