<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $msg;
    public $operation = 'create';

    public function render()
    {
        return view('livewire.user.user-create');
    }

    public function create():void
    {

        $this->validate($this->rules());

        $user = new User();

        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);

        if ($user->save()) {
            $this->msg = 'Usuário criado com sucesso.';

            $this->name = '';
            $this->email = '';
            $this->password = '';
            $this->password_confirmation = '';

        }

    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
            'email' => "required|email|unique:users",
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'O Campo nome é de preenchimento obrigatório.',
            'name.min'  => 'O Campo nome deve ter mais de 3 caracteres.',            
            'email.required'  => 'O Campo email é de preenchimento obrigatório.',
            'email.unique'  => 'O email informado já está em uso.',
            'email.email'  => 'Digite um email válido.',
            'password.required'  => 'O Campo senha é de preenchimento obrigatório.',
            'password.min'  => 'O Campo senha deve ter no mínimo 8 caracteres.',
            'password.required'  => 'O Campo senha é de preenchimento obrigatório.',
            'password.confirmed'  => 'Confirme sua senha.',
        ];
    }
}
