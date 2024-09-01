<?php

namespace App\Livewire\Produtos;

use App\Models\Produto;
use Livewire\Component;
use Mary\Traits\Toast;

class ListingProduto extends Component
{
    use Toast;

    public $produtos = [];

    public function render()
    {
        $this->produtos = Produto::all();

        return view('livewire.produtos.listing-produto');
    }

    public function delete_produto($id)
    {
        Produto::find($id)->delete();

        $this->toast(
            type: 'success',
            title: 'Produto Apagado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-error',
            icon: 'o-trash',
            timeout: '1500'
        );
    }
}
