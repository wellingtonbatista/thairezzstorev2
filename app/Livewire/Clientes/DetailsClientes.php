<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Clientes;
use Mary\Traits\Toast;

class DetailsClientes extends Component
{
    use Toast;

    public $id_cliente;

    public $nome_cliente;
    public $documento_cliente;
    public $contato_cliente;
    public $data_nascimento_cliente;

    public function render()
    {
        return view('livewire.clientes.details-clientes');
    }

    public function mount()
    {
        $cliente = Clientes::find($this->id_cliente);

        $this->nome_cliente = $cliente->nome;
        $this->documento_cliente = $cliente->documento;
        $this->contato_cliente = $cliente->contato;
        $this->data_nascimento_cliente = $cliente->data_nascimento;
    }

    public function update_cliente()
    {
        $cliente = Clientes::find($this->id_cliente);

        $cliente->nome = $this->nome_cliente;
        $cliente->documento = $this->documento_cliente;
        $cliente->contato = $this->contato_cliente;
        $cliente->data_nascimento = $this->data_nascimento;

        $cliente->save();

        $this->toast(
            type: 'success',
            title: 'Cliente Apagado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-error',
            icon: 'o-trash',
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
