<?php

namespace App\Livewire\Clientes;

use App\Models\Clientes;
use Livewire\Component;
use Mary\Traits\Toast;

class ListingClientes extends Component
{
    use Toast;

    public $clientes = [];

    public function render()
    {
        $this->clientes = Clientes::all();

        return view('livewire.clientes.listing-clientes');
    }

    public function delete_cliente($id)
    {
        Clientes::find($id)->delete();

        $this->toast(
            type: 'success',
            title: 'Cliente Apagado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-error',
            icon: 'o-trash',
            timeout: '1500'
        );
    }
}
