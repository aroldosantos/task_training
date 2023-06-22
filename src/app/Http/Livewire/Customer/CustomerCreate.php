<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class CustomerCreate extends Component
{

    public $name;
    public $surname;
    public $cpf;
    public $msg;
    public $operation = 'create';

    public function render()
    {
        return view('livewire.customer.customer-create');
    }

    public function create(): void
    {

        $this->validate($this->rules());

        $customer = new Customer();

        $customer->name = $this->name;
        $customer->surname = $this->surname;
        $customer->cpf = $this->cpf;

        if ($customer->save()) {
            $this->msg = 'Pessoa cadastrada com sucesso.';

            $this->name = '';
            $this->surname = '';
            $this->cpf = '';

        }

    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'surname' => "required|min:3",
            'cpf' => "required|size:11|unique:customers,cpf",
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
}
