<?php

namespace App\Livewire\Configuracoes;

use App\Models\NaturezaOperacao;
use Livewire\Component;
use Mary\Traits\Toast;

class ListingNaturezaOperacao extends Component
{
    use Toast;

    public $natureza_operacao = [];

    public function render()
    {
        $this->natureza_operacao = NaturezaOperacao::all();

        return view('livewire.configuracoes.listing-natureza-operacao');
    }

    public function apagar_natureza_operacao($id)
    {
        NaturezaOperacao::find($id)->delete();

        $this->toast(
            type: "error",
            title: "Natureza de Operação Apagado com Sucesso!",
            position: "toast-bottom toast-end",
            css: "alert-error",
            icon: "o-trash",
            timeout: '1500'
        );
    }
}
