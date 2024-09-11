<?php

namespace App\Livewire\Fornecedores;

use Livewire\Component;
use App\Models\Fornecedor;
use Mary\Traits\Toast;

class ListingFornecedor extends Component
{
    use Toast;

    public $fornecedores = [];

    public function render()
    {
        $this->fornecedores = Fornecedor::all();

        return view('livewire.fornecedores.listing-fornecedor');
    }

    public function ArquivarFornecedor($id)
    {
        Fornecedor::find($id)->delete();

        $this->toast(
            type: "error",
            title: "Fornecedor Apagado com Sucesso!",
            position: "toast-bottom toast-end",
            css: "alert-error",
            icon: "o-trash",
            timeout: '1500'
        );
    }
}
