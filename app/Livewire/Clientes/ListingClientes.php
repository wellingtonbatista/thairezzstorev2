<?php

namespace App\Livewire\Clientes;

use App\Models\Clientes;
use Livewire\Component;
use Mary\Traits\Toast;

class ListingClientes extends Component
{
    use Toast;

    public $clientes = [];
    public $status_cliente = '';
    public $nome_cliente;

    public function render()
    {
        $this->clientes = Clientes::query()->when($this->status_cliente, function($query){
            return $query->onlyTrashed();
        })->when($this->nome_cliente, function($query){
            return $query->where('nome', 'LIKE', '%'.$this->nome_cliente.'%');
        })->get();

        return view('livewire.clientes.listing-clientes');
    }

    public function ArquivarCliente($id)
    {
        Clientes::find($id)->delete();

        $this->toast(
            type: 'success',
            title: 'Cliente Arquivado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-warning',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function DesarquivarCliente($id)
    {
        Clientes::withTrashed()->where('id', $id)->restore();

        $this->toast(
            type: 'success',
            title: 'Cliente Desarquivado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-warning',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function LimparFiltroCliente()
    {
        $this->reset(
            'status_cliente',
            'nome_cliente'
        );
    }
}
