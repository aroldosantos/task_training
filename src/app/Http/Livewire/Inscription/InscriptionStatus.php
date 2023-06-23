<?php

namespace App\Http\Livewire\Inscription;

use Livewire\Component;

class InscriptionStatus extends Component
{

    public $model;

    public function render()
    {
        return view('livewire.inscription.inscription-status');
    }

    public function update()
    {

        if ($this->model) {

            if ($this->model->status == 'Confirmada') {
                $this->model->status = 'Cancelada';
            } else {
                $this->model->status = 'Confirmada';
            }

            $this->model->save();
        }

        $this->emit('locationUpdated');
    }

}
