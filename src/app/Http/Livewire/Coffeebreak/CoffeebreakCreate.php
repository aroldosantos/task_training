<?php

namespace App\Http\Livewire\Coffeebreak;

use App\Models\Coffeebreak;
use Livewire\Component;

class CoffeebreakCreate extends Component
{

    public $name;
    public $capacity;
    public $msg;
    public $operation = 'create';

    public function render()
    {
        return view('livewire.coffeebreak.coffeebreak-create');
    }

    public function create(): void
    {

        $this->validate($this->rules());

        $coffeebreak = new Coffeebreak();

        $coffeebreak->name = $this->name;
        $coffeebreak->capacity = $this->capacity;

        if ($coffeebreak->save()) {
            $this->msg = 'Espaço criado com sucesso.';

            $this->name = '';
            $this->capacity = '';

        }

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
}
