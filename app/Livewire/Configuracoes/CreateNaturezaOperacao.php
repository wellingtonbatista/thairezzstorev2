<?php

namespace App\Livewire\Configuracoes;

use Livewire\Component;
use App\Models\NaturezaOperacao;
use Mary\Traits\Toast;

class CreateNaturezaOperacao extends Component
{
    use Toast;

    public $tipo_natureza_operacao;
    public $nome_natureza_operacao;

    public function render()
    {
        return view('livewire.configuracoes.create-natureza-operacao');
    }

    public function create_natureza_operacao()
    {
        $this->validate();

        NaturezaOperacao::create([
            'tipo_movimentacao' => $this->tipo_natureza_operacao,
            'nome' => $this->nome_natureza_operacao
        ]);

        $this->reset();

        $this->toast(
            type: 'success',
            title: 'Natureza de Operaçâo Cadastrado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1500'
        );

    }

    public function rules()
    {
        return [
            'tipo_natureza_operacao' => 'required',
            'nome_natureza_operacao' => 'required',
        ];
    }
}
