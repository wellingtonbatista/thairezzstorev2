<?php

namespace App\Livewire\Configuracoes;

use App\Models\NaturezaOperacao;
use Livewire\Component;
use Mary\Traits\Toast;

class DetailsNaturezaOperacao extends Component
{
    use Toast;

    public $id_natureza_operacao;

    public $tipo_natureza_operacao;
    public $nome_natureza_operacao;
    public $bonificacao;

    public function render()
    {
        return view('livewire.configuracoes.details-natureza-operacao');
    }

    public function mount()
    {
        $natureza_operacao = NaturezaOperacao::find($this->id_natureza_operacao);

        $this->tipo_natureza_operacao = $natureza_operacao->tipo_movimentacao;
        $this->nome_natureza_operacao = $natureza_operacao->nome;
        $this->bonificacao = $natureza_operacao->bonificacao;
    }

    public function update_natureza_operacao()
    {
        $natureza_operacao = NaturezaOperacao::find($this->id_natureza_operacao);

        $natureza_operacao->tipo_movimentacao = $this->tipo_natureza_operacao;
        $natureza_operacao->nome = $this->nome_natureza_operacao;
        $natureza_operacao->bonificacao = $this->bonificacao;

        $natureza_operacao->save();

        $this->toast(
            type: 'success',
            title: 'Natureza de Operação Atualizado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-info',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }
}
