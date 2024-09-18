<?php

namespace App\Livewire\Configuracoes;

use App\Models\VariaveisAmbiente;
use Livewire\Component;

class ListingCreateVariaveisAmbiente extends Component
{
    public $selectedTab = 'utilities-tab';

    // VARIAVEIS ABA UTILIDADES
    public $taxa_comissao_shopee;

    public function render()
    {
        return view('livewire.configuracoes.listing-create-variaveis-ambiente');
    }

}
