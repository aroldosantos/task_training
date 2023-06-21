<?php

namespace App\Http\Livewire\Classroom;

use App\Models\Classroom;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ClassroomCreate extends Component
{

    public $name;
    public $capacity;
    public $msg;
    public $operation = 'create';

    public function render()
    {
        return view('livewire.classroom.classroom-create');
    }

    public function create(): void
    {

        $this->validate($this->rules());

        $classroom = new Classroom();

        $classroom->name = $this->name;
        $classroom->capacity = $this->capacity;

        if ($classroom->save()) {
            $this->msg = 'Classe criada com sucesso.';

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
