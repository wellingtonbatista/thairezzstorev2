<?php

namespace App\Livewire\Estoque;

use Livewire\Component;
use App\Models\Produto;

class ListingProdutosEstoque extends Component
{
    public $produtos = [];

    public function render()
    {
        $this->produtos = Produto::where('estoque', '>', 0)->where('estoque_bonificacao',  '>', 0)->get();

        return view('livewire.estoque.listing-produtos-estoque');
    }
}
