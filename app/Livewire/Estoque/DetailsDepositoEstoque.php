<?php

namespace App\Livewire\Estoque;

use App\Models\Deposito;
use Livewire\Component;
use Mary\Traits\Toast;

class DetailsDepositoEstoque extends Component
{
    use Toast;

    public $id_deposito;

    public $nome_deposito;

    public function render()
    {
        return view('livewire.estoque.details-deposito-estoque');
    }

    public function mount()
    {
        $deposito = Deposito::find($this->id_deposito);

        $this->nome_deposito = $deposito->nome;
    }

    public function update_deposito()
    {
        $this->validate();

        $deposito = Deposito::find($this->id_deposito);

        $deposito->nome = $this->nome_deposito;

        $deposito->save();

        $this->toast(
            type: 'success',
            title: 'Deposito Alterado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1500'
        );

    }

    public function rules()
    {
        return [
            'nome_deposito' => 'required'
        ];
    }
}
