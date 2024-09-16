<?php

namespace App\Livewire\Pedidos;

use App\Models\Clientes;
use App\Models\NaturezaOperacao;
use App\Models\Pedido;
use Livewire\Component;
use Mary\Traits\Toast;

class CreatePedidos extends Component
{
    use Toast;

    // DADOS PARA OPÇÕES DO FORMULARIO
    public $clientes;
    public $natureza_operacao;

    // DADOS PREENCHIDOS NO FORMULARIO
    public $id_cliente_pedido;
    public $data_pedido;
    public $id_natureza_operacao_pedido;
    public $pedido_referencial;

    public function render()
    {
        return view('livewire.pedidos.create-pedidos');
    }

    public function mount()
    {
        $this->clientes = Clientes::all();
        $this->natureza_operacao = NaturezaOperacao::where('tipo_movimentacao', '1')->get();
    }

    public function AdicionarPedido()
    {
        Pedido::create([
            'cliente_id' => $this->id_cliente_pedido,
            'data_venda' => $this->data_pedido,
            'id_natureza_operacao' => $this->id_natureza_operacao_pedido,
            'estoque_lancado' => false,
            'conta_lancada' => false,
            'pedido_referencial' => $this->pedido_referencial
        ]);

        $this->toast(
            type: "success",
            title: "Pedido Cadastrado com Sucesso!",
            position: "toast-bottom toast-end",
            css: "alert-success",
            icon: "o-check-badge",
            timeout: "1500"
        );

        return $this->redirect('listing', navigate: true);
    }
}
