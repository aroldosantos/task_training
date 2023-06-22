<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class CustomerTable extends TableComponent
{

    public $per_page = 10;
    public $header_title = 'Pessoas';
    public $header_breadcrumb= 'Pessoas';
    public $tb_title = 'Listagem de Pessoas';
    public $tb_desc = 'Pessoas cadastradas no sistema.';
    public $btn_create = 'Nova pessoa';
    public $btn_create_href = 'customers.create';
    public $router = 'dashboard';
    public $infoset;
    public $route_parameter;

    
    public function query()
    {
        return Customer::query();
    }

    public function columns()
    {
        return [
            Column::make('Cód','id')->searchable()->sortable(),
            Column::make('Nome','name')->searchable()->sortable(),
            Column::make('Sobrenome','surname')->searchable()->sortable(),
            Column::make('CPF','cpf')->searchable()->sortable(),
            Column::make('Operações')->view('livewire.customer.customer-links-table'),
        ];
    }
}
