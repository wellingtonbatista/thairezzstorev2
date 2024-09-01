<?php

namespace App\Livewire\Produtos;

use App\Models\Produto;
use Livewire\Component;

class ListingProduto extends Component
{
    public $produtos = [];

    public function render()
    {
        $this->produtos = Produto::all();

        return view('livewire.produtos.listing-produto');
    }
}
