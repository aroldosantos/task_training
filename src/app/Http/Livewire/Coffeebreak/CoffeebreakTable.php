<?php

namespace App\Http\Livewire\Coffeebreak;

use App\Models\Coffeebreak;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class CoffeebreakTable extends TableComponent
{

    public $per_page = 10;
    public $header_title = 'Coffeebreak';
    public $header_breadcrumb= 'Coffeebreaks';
    public $tb_title = 'Listagem de espaços para coffeebreak';
    public $tb_desc = 'Espaços cadastrados no sistema.';
    public $btn_create = 'Novo espaço';
    public $btn_create_href = 'coffeebreaks.create';
    public $router = 'dashboard';
    public $infoset;
    public $route_parameter;

    
    public function query()
    {
        return Coffeebreak::query();
    }

    public function columns()
    {
        return [
            Column::make('Cód','id')->searchable()->sortable(),
            Column::make('Espaço','name')->searchable()->sortable(),
            Column::make('Lotação','capacity')->searchable()->sortable(),
            Column::make('Operações')->view('livewire.coffeebreak.coffeebreak-links-table'),
        ];
    }
}
