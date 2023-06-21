<?php

namespace App\Http\Livewire\Classroom;

use App\Models\Classroom;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class ClassroomTable extends TableComponent
{

    public $per_page = 10;
    public $header_title = 'Classes';
    public $header_breadcrumb= 'Classes';
    public $tb_title = 'Listagem de classes';
    public $tb_desc = 'Classes cadastradas no sistema.';
    public $btn_create = 'Nova classe';
    public $btn_create_href = 'classrooms.create';
    public $router = 'dashboard';
    public $infoset;
    public $route_parameter;

    
    public function query()
    {
        return Classroom::query();
    }

    public function columns()
    {
        return [
            Column::make('Cód','id')->searchable()->sortable(),
            Column::make('Classe','name')->searchable()->sortable(),
            Column::make('Lotação','capacity')->searchable()->sortable(),
            Column::make('Operações')->view('livewire.user.users-links-table'),
        ];
    }
}
