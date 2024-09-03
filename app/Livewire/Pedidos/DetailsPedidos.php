<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use Mary\Traits\Toast;

class DetailsPedidos extends Component
{
    use Toast;

    public $id_pedido;

    public function render()
    {
        return view('livewire.pedidos.details-pedidos');
    }
}
