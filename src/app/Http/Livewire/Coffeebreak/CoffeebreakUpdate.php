<?php

namespace App\Http\Livewire\Coffeebreak;

use App\Models\Coffeebreak;
use Livewire\Component;

class CoffeebreakUpdate extends Component
{

    public $uid;
    public $name;
    protected $coffeebreak;
    public $capacity;
    public $created_at;
    public $updated_at;
    public $msg;
    public $operation;

    public function render()
    {
        return view('livewire.coffeebreak.coffeebreak-update');
    }

    public function mount(Coffeebreak $id)
    {
        $this->coffeebreak = $id;

        $this->uid = $this->coffeebreak->id;
        $this->name = $this->coffeebreak->name;
        $this->capacity = $this->coffeebreak->capacity;
        $this->created_at = $this->coffeebreak->created_at;
        $this->updated_at = $this->coffeebreak->updated_at;

    }

    public function update()
    {

        $this->validate($this->rules());

        $this->operation = 'update';

        if ($coffeebreak = Coffeebreak::find($this->uid)) {

            $coffeebreak->name = $this->name;
            $coffeebreak->capacity = $this->capacity;
            $coffeebreak->save();

            $this->msg = 'Atualização realizada com sucesso.';
        }

        $this->mount($coffeebreak);

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
