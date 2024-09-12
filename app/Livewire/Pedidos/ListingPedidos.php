<?php

namespace App\Livewire\Pedidos;

use App\Models\Clientes;
use App\Models\NaturezaOperacao;
use App\Models\Pedido;
use Livewire\Component;
use Mary\Traits\Toast;

class ListingPedidos extends Component
{
    use Toast;

    public $myModal1 = false;

    // DADOS FILTRO
    public $clientes;
    public $natureza_operacao;

    // FILTROS
    public $status_pedido;
    public $cliente_pedido;
    public $natureza_operacao_pedido;

    public $pedidos;

    public function render()
    {
        $this->pedidos = Pedido::query()->when($this->status_pedido, function($query){
            return $query->withTrashed()->onlyTrashed();
        })->when($this->cliente_pedido, function($query){
            return $query->where('cliente_id', $this->cliente_pedido);
        })->when($this->natureza_operacao_pedido, function($query){
            return $query->where('id_natureza_operacao', $this->natureza_operacao_pedido);
        })->get();

        return view('livewire.pedidos.listing-pedidos');
    }

    public function mount()
    {
        $this->clientes = Clientes::all();
        $this->natureza_operacao = NaturezaOperacao::where('tipo_movimentacao', "1")->get();
    }

    public function ArquivarPedido($id)
    {
        Pedido::find($id)->delete();

        $this->toast(
            type: 'success',
            title: 'Pedido Arquivado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-warning',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function DesarquivarPedido($id)
    {
        Pedido::withTrashed()->where('id', $id)->restore();
    }

    public function LimparFiltroPedido()
    {
        $this->reset(
            'status_pedido'
        );
    }
}
