<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class UserTable extends TableComponent
{

    public $per_page = 10;
    public $header_title = 'Usuários';
    public $header_breadcrumb= 'Usuários';
    public $tb_title = 'Listagem de usuários';
    public $tb_desc = 'Usuários cadastrados no sistema.';
    public $btn_create = 'Novo usuário';
    public $btn_create_href = 'users.create';
    public $router = 'dashboard';
    public $infoset;
    public $route_parameter;

    
    public function query()
    {
        return User::query();
    }

    public function columns()
    {
        return [
            Column::make('Cód','id')->searchable()->sortable(),
            Column::make('Nome','name')->searchable()->sortable(),
            Column::make('Email','email')->searchable()->sortable(),
            Column::make('Operações')->view('livewire.user.users-links-table'),
        ];
    }
}
