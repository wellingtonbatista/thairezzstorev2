<?php

namespace App\Livewire\Estoque;

use App\Models\Deposito;
use Livewire\Component;
use Mary\Traits\Toast;

class ListingDepositEstoque extends Component
{
    use Toast;

    public $depositos = [];

    public function render()
    {
        $this->depositos = Deposito::all();
        
        return view('livewire.estoque.listing-deposit-estoque');
    }

    public function delete_deposito($id)
    {
        Deposito::find($id)->delete();

        $this->toast(
            type: "error",
            title: "Deposito Apagado com Sucesso!",
            position: "toast-bottom toast-end",
            css: "alert-error",
            icon: "o-trash",
            timeout: '1500'
        );
    }
}
