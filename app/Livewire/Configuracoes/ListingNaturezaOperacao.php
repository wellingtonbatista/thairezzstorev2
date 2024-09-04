<?php

namespace App\Livewire\Configuracoes;

use App\Models\NaturezaOperacao;
use Livewire\Component;

class ListingNaturezaOperacao extends Component
{
    public $natureza_operacao = [];

    public function render()
    {
        $this->natureza_operacao = NaturezaOperacao::all();

        return view('livewire.configuracoes.listing-natureza-operacao');
    }
}
