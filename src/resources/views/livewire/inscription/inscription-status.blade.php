@if ($model->status == 'Confirmada')
    <button wire:click="update()" key="{{ now() }}" title="Atualizar inscrição" class="border border-yellow-200 rounded mr-1 px-2 py-2 bg-yellow-100 text-center align-middle text-gray-600 hover:bg-yellow-400">
            <i class="fas fa-ban"> Cancelar</i> 
    </button>
@else
    <button wire:click="update()" key="{{ now() }}" title="Atualizar inscrição" class="border border-yellow-200 rounded mr-1 px-2 py-2 bg-yellow-100 text-center align-middle text-gray-600 hover:bg-yellow-400">
        <i class="fas fa-check-square"> Reativar</i> 
    </button>
@endif