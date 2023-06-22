<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class CustomerUpdate extends Component
{

    public $uid;
    public $name;
    public $surname;
    public $cpf;
    public $created_at;
    public $updated_at;
    public $msg;
    public $operation;
    protected $customer;

    public function render()
    {
        return view('livewire.customer.customer-update');
    }

    public function mount(Customer $id)
    {
        $this->customer = $id;

        $this->uid = $this->customer->id;
        $this->name = $this->customer->name;
        $this->surname = $this->customer->surname;
        $this->cpf = $this->customer->cpf;
        $this->created_at = $this->customer->created_at;
        $this->updated_at = $this->customer->updated_at;

    }

    public function update()
    {

        $this->validate($this->rules());

        $this->operation = 'update';

        if ($customer = Customer::find($this->uid)) {

            $customer->name = $this->name;
            $customer->surname = $this->surname;
            $customer->cpf = $this->cpf;
            $customer->save();

            $this->msg = 'Atualização realizada com sucesso.';
        }

        $this->mount($customer);

    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'surname' => "required|min:3",
            'cpf' => "required|size:11|unique:customers,cpf,$this->uid",
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
            'cpf.min' => 'O Campo CPF deve ter 11 caracteres.',
            'cpf.unique'  => 'O CPF informado já está em uso.',
        ];
    }

}
