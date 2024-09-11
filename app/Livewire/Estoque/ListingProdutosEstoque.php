<?php

namespace App\Livewire\Estoque;

use Livewire\Component;
use App\Models\Produto;

class ListingProdutosEstoque extends Component
{
    public $produtos = [];

    public function render()
    {
        $this->produtos = Produto::all();

        return view('livewire.estoque.listing-produtos-estoque');
    }
}
