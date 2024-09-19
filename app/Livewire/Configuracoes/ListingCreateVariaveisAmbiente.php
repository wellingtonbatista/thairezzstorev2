<?php

namespace App\Livewire\Configuracoes;

use App\Models\VariaveisAmbiente;
use Livewire\Component;

class ListingCreateVariaveisAmbiente extends Component
{
    public $selectedTab = 'utilities-tab';

    // VARIAVEIS ABA UTILIDADES
    public $taxa_comissao_shopee;
    public $taxa_transporte_shopee;

    public function render()
    {
        return view('livewire.configuracoes.listing-create-variaveis-ambiente');
    }

    public function mount()
    {
        $variaveis_ambiente = VariaveisAmbiente::all();

        $teste = array();

        foreach($variaveis_ambiente as $variavel)
        {
            $teste[$variavel->chave] = $variavel->valor;
        }

        $this->taxa_comissao_shopee = $teste['taxa_comissao_shopee'];
        $this->taxa_transporte_shopee = $teste['taxa_transporte_shopee'];
    }
}
