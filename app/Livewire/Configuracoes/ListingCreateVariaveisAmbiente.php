<?php

namespace App\Livewire\Configuracoes;

use App\Models\VariaveisAmbiente;
use Livewire\Component;
use Mary\Traits\Toast;

class ListingCreateVariaveisAmbiente extends Component
{
    use Toast;

    public $selectedTab = 'utilities-tab';

    // VARIAVEIS ABA UTILIDADES
    public $taxa_comissao_shopee;
    public $taxa_transporte_shopee;
    public $taxa_transacao_shopee;
    public $taxa_fixa_item_shopee;

    public function render()
    {
        return view('livewire.configuracoes.listing-create-variaveis-ambiente');
    }

    public function mount()
    {
        $variaveis_ambiente = VariaveisAmbiente::first();

        $this->taxa_comissao_shopee = $variaveis_ambiente->taxa_comissao_shopee;
        $this->taxa_transporte_shopee = $variaveis_ambiente->taxa_transporte_shopee;
        $this->taxa_transacao_shopee = $variaveis_ambiente->taxa_transacao_shopee;
        $this->taxa_fixa_item_shopee = $variaveis_ambiente->taxa_fixa_item_shopee;
    }

    public function SalvarVariavelShopee()
    {
        $variaveis = VariaveisAmbiente::find(1);

        $variaveis->taxa_comissao_shopee = $this->taxa_comissao_shopee;
        $variaveis->taxa_transporte_shopee = $this->taxa_transporte_shopee;
        $variaveis->taxa_transacao_shopee = $this->taxa_transacao_shopee;
        $variaveis->taxa_fixa_item_shopee = $this->taxa_fixa_item_shopee;

        $variaveis->save();

        $this->toast(
            type: "error",
            title: "Variaveis de Ambiente Atualizadas com Sucesso!",
            position: "toast-bottom toast-end",
            css: "alert-success",
            icon: "o-check-badge",
            timeout: '1500'
        );
    }
}
