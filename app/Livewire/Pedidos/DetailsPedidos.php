<?php

namespace App\Livewire\Pedidos;

use App\Models\Pedido;
use Livewire\Component;
use Mary\Traits\Toast;

class DetailsPedidos extends Component
{
    use Toast;

    public $id_pedido;
    public $pedido;

    public float $valor_total_pedido = 0;

    public function render()
    {
        return view('livewire.pedidos.details-pedidos');
    }

    public function mount()
    {
        $this->pedido = Pedido::find($this->id_pedido);
    }
}
