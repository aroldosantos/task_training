<?php

namespace App\Http\Livewire\Inscription;

use App\Models\Inscription;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

use function Termwind\render;

class InscriptionTable extends TableComponent
{

    public $per_page = 10;
    public $header_title = 'Inscrições';
    public $header_breadcrumb = 'Inscrições';
    public $tb_title = 'Listagem de Inscrições';
    public $tb_desc = 'Todas as inscrições cadastradas no sistema.';
    public $btn_create = 'Nova Inscrição';
    public $btn_create_href = 'inscriptions.create';
    public $router = 'dashboard';
    public $infoset;
    public $route_parameter;

    protected $listeners = [
        'locationUpdated'
      ];  

    public function query()
    {
        return Inscription::with(['customer', 'classroom', 'coffeebreak']);
    }

    public function columns()
    {
        return [
            Column::make('Cód', 'id')->searchable()->sortable(),
            Column::make('Nome', 'customer.name')->searchable()->sortable(),
            Column::make('Sobrenome', 'customer.surname')->searchable()->sortable(),
            Column::make('Classe', 'classroom.name')->searchable()->sortable(),
            Column::make('Coffeebreak', 'coffeebreak.name')->searchable()->sortable(),
            Column::make('Status', 'status')->searchable()->sortable(),
            Column::make('Operações')->view('livewire.inscription.inscription-links-table'),
        ];
    }

    public function tdClass($attribute, $value)
    {
        if ($attribute == 'status' && $value == 'Confirmada') {
            return ' border rounded bg-green-100 text-center align-middle text-gray-600';
        }

        if ($attribute == 'status' && $value == 'Cancelada') {
            return 'border rounded bg-red-100 text-center align-middle text-gray-600';
        }

        return null;
    }

    
      public function locationUpdated()
      {
        redirect()->route('inscriptions');
      }
}
