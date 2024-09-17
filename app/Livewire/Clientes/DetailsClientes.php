<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Clientes;
use App\Models\ContasReceber;
use Mary\Traits\Toast;
use App\Models\Pedido;

class DetailsClientes extends Component
{
    use Toast;

    public $id_cliente;

    public $nome_cliente;
    public $documento_cliente;
    public $contato_cliente;
    public $data_nascimento_cliente;

    public $selectedTab = 'faturas-tab';

    public function render()
    {
        return view('livewire.clientes.details-clientes', [
            'pedidos' => Pedido::where('cliente_id', $this->id_cliente)->orderBy('data_venda', 'desc')->paginate(5),
            'faturas' => Pedido::where('cliente_id', $this->id_cliente)->orderBy('data_venda', 'desc')->paginate(10)
        ]);
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
        $cliente->data_nascimento = $this->data_nascimento_cliente;

        $cliente->save();

        $this->toast(
            type: 'success',
            title: 'Cliente Atualizado com Sucesso!',
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
