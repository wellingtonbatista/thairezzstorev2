<?php

namespace App\Livewire\Estoque;

use App\Models\Deposito;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateDepositEstoque extends Component
{
    use Toast;

    public $nome_deposito;

    public function render()
    {
        return view('livewire.estoque.create-deposit-estoque');
    }

    public function create_deposito()
    {
        $this->validate();

        Deposito::create([
            'nome' => $this->nome_deposito
        ]);

        $this->reset();

        $this->toast(
            type: 'success',
            title: 'Deposito Criado com Sucesso!',
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
