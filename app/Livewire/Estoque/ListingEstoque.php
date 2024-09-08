<?php

namespace App\Livewire\Estoque;

use App\Models\Estoque;
use App\Models\Produto;
use Livewire\Component;
use Mary\Traits\Toast;

class ListingEstoque extends Component
{
    use Toast;

    public $estoques = [];

    public function render()
    {
        $this->estoques = Estoque::orderBy('id', 'desc')->get();

        return view('livewire.estoque.listing-estoque');
    }
}
