<?php

namespace App\Http\Livewire\Inscription;

use App\Models\Classroom;
use App\Models\Coffeebreak;
use App\Models\Customer;
use App\Models\Inscription;
use Livewire\Component;

class InscriptionCreate extends Component
{

    public $classroom_id;
    public $coffeebreak_id;
    public $customer_id;
    public $status;

    public $classrooms;
    public $coffeebreaks;
    public $customers;

    public $msg;
    public $operation = 'create';

    public function render()
    {
        return view('livewire.inscription.inscription-create');
    }

    public function mount()
    {
        $this->classrooms = Classroom::all();
        $this->coffeebreaks = Coffeebreak::all();
        $this->customers = Customer::all();

    }

    public function create(): void
    {

        $this->validate($this->rules());

        $inscription = new Inscription();

        $inscription->classroom_id = $this->classroom_id;
        $inscription->coffeebreak_id = $this->coffeebreak_id;
        $inscription->customer_id = $this->customer_id;
        $inscription->status = $this->status;

        if ($inscription->save()) {
            $this->msg = 'Inscrição criada com sucesso.';

            $this->classroom_id = '';
            $this->coffeebreak_id = '';
            $this->customer_id = '';
            $this->status = '';

        }

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
}
