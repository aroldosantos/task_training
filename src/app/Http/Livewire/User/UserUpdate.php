<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserUpdate extends Component
{

    public $uid;
    public $user;
    public $name;
    public $email;
    public $created_at;
    public $updated_at;
    public $password;
    public $password_confirmation;
    public $msg;
    public $operation;

    public function render()
    {
        return view('livewire.user.user-update');
    }

    public function mount(User $id)
    {
        $this->user = $id;

        $this->uid = $this->user->id;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->created_at = $this->user->created_at;
        $this->updated_at = $this->user->updated_at;

    }

    public function update()
    {

        $this->validate($this->rulesData());

        $this->operation = 'update';

        if ($user = User::find($this->uid)) {

            $user->name = $this->name;
            $user->email = $this->email;
            $user->save();

            $this->msg = 'Atualização realizada com sucesso.';
        }

        $this->mount($user);

    }

    public function updatePassword()
    {

        $this->validate($this->rulesPwd());
        $this->operation = 'updatePassword';

        if ($user = User::find($this->uid)) {
            $user->password = Hash::make($this->password);
            $user->save();

            $this->msg = 'Atualização realizada com sucesso.';

        }

    }

    public function rulesData(): array
    {
        return [
            'name' => 'required|min:3',
            'email' => "required|email|unique:users,email,$this->uid",
        ];
    }

    public function rulesPwd(): array
    {
        return [
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O Campo nome é de preenchimento obrigatório.',
            'name.min' => 'O Campo nome deve ter mais de 3 caracteres.',
            'email.required' => 'O Campo email é de preenchimento obrigatório.',
            'email.unique' => 'O email informado já está em uso.',
            'email.email' => 'Digite um email válido.',
            'password.required' => 'O Campo senha é de preenchimento obrigatório.',
            'password.min' => 'O Campo senha deve ter no mínimo 8 caracteres.',
            'password.required' => 'O Campo senha é de preenchimento obrigatório.',
            'password.confirmed' => 'Confirme sua senha.',
        ];
    }

}
