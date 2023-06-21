<?php

namespace App\Http\Livewire\Classroom;

use App\Models\Classroom;
use Livewire\Component;

class ClassroomUpdate extends Component
{

    public $uid;
    public $user;
    public $name;
    protected $classroom;
    public $capacity;
    public $created_at;
    public $updated_at;
    public $msg;
    public $operation;

    public function render()
    {
        return view('livewire.classroom.classroom-update');
    }

    public function mount(Classroom $id)
    {
        $this->classroom = $id;

        $this->uid = $this->classroom->id;
        $this->name = $this->classroom->name;
        $this->capacity = $this->classroom->capacity;
        $this->created_at = $this->classroom->created_at;
        $this->updated_at = $this->classroom->updated_at;

    }

    public function update()
    {

        $this->validate($this->rules());

        $this->operation = 'update';

        if ($classroom = Classroom::find($this->uid)) {

            $classroom->name = $this->name;
            $classroom->capacity = $this->capacity;
            $classroom->save();

            $this->msg = 'Atualização realizada com sucesso.';
        }

        $this->mount($classroom);

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
