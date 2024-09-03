<?php

namespace App\Livewire\Clientes;

use App\Models\Clientes;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateClientes extends Component
{
    use Toast;

    public $nome_cliente;
    public $documento_cliente;
    public $contato_cliente;
    public $data_nascimento_cliente;

    public function render()
    {
        return view('livewire.clientes.create-clientes');
    }

    public function create_cliente()
    {
        $this->validate();

        Clientes::create([
            'nome' => $this->nome_cliente,
            'documento' => $this->documento_cliente,
            'contato' => $this->contato_cliente,
            'data_nascimento' => $this->data_nascimento_cliente
        ]);

        $this->reset();

        $this->toast(
            type: 'success',
            title: 'Cliente Cadastrado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function rules()
    {
        return [
            'nome_cliente' => 'required'
        ];
    }
}
