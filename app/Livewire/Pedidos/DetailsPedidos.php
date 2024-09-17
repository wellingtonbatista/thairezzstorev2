<?php

namespace App\Livewire\Pedidos;

use App\Models\Deposito;
use App\Models\FaturasPedido;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\ProdutoPedido;
use Livewire\Component;
use Mary\Traits\Toast;

class DetailsPedidos extends Component
{
    use Toast;

    public $id_pedido;
    public $pedido;
    public $produtos_pedido;
    public $faturas;

    // MODAL
    public bool $myModal1 = false;
    public bool $myModal2 = false;
    public $selectedTab = 'detalhes-tab';

    // DADOS MODAL ADICIONAR PRODUTOS
    public $depositos;
    public $produtos;

    // DADOS RECEBIDOS DE MODAL PRODUTOS
    public $id_deposito_pedido;
    public $id_produto_pedido;
    public $quantidade_pedido;
    public $valor_venda_pedido;

    // DADOS RECEBIDOS DE MODAL FATURAS
    public $quantidade_parcelas;

    public float $valor_total_pedido = 0;

    public function render()
    {
        $this->valor_total_pedido = $this->CalcularValorTotal($this->id_pedido);

        return view('livewire.pedidos.details-pedidos');
    }

    public function mount()
    {
        $this->pedido = Pedido::find($this->id_pedido);
        $this->depositos = Deposito::all();
        $this->produtos = Produto::all();
    }

    public function CreateProdutoPedido()
    {
        ProdutoPedido::create([
            'pedido_id' => $this->id_pedido,
            'produto_id' => $this->id_produto_pedido,
            'deposito_id' => $this->id_deposito_pedido,
            'valor_venda' => $this->valor_venda_pedido,
            'quantidade' => $this->quantidade_pedido
        ]);

        $this->myModal1 = false;

        $this->reset(
            'id_deposito_pedido',
            'id_produto_pedido',
            'quantidade_pedido',
            'valor_venda_pedido'
        );

        $this->toast(
            type: 'success',
            title: 'Produto Adicionado ao Pedido com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1000'
        );
    }

    public function RemoverProdutoPedido($id)
    {
        if($this->pedido->estoque_lancado)
        {
            $this->toast(
                type: 'success',
                title: 'Estoque Ja Lancado, Extornar Estoque Para Continuar!',
                position: 'toast-top toast-end',
                css: 'alert-error',
                icon: 'o-x-mark',
                timeout: '1000'
            );
            
        } else {
            ProdutoPedido::find($id)->delete();

            $this->toast(
                type: 'success',
                title: 'Produto Removido do Pedido com Sucesso!',
                position: 'toast-bottom toast-end',
                css: 'alert-info',
                icon: 'o-check-badge',
                timeout: '1000'
            );
        }
    }

    public function CalcularValorTotal($id_pedido)
    {
        $produto_pedido = ProdutoPedido::where('pedido_id', $id_pedido)->get();
        $valor_total = 0;

        foreach($produto_pedido as $produto)
        {
            $valor_total = $valor_total + ($produto->valor_venda * $produto->quantidade);
        }

        return $valor_total;
    }

    public function AdicionarParcelaFatura()
    {
        $valor_parcela = $this->valor_total_pedido / $this->quantidade_parcelas;

        for($i = 1; $i <= $this->quantidade_parcelas; $i++)
        {
            $data_vencimento = date('Y-m-d', strtotime("+ ".'30'*$i." days", strtotime(date('Y-m-d'))));

            FaturasPedido::create([
                'pedido_id' => $this->id_pedido,
                'data_vencimento' => $data_vencimento,
                'valor_parcela' => $valor_parcela
            ]);
        }

        $this->reset(
            'quantidade_parcelas'
        );

        $this->myModal2 = false;
    }

    public function RemoverParcelaFatura()
    {
        if($this->pedido->conta_lancada)
        {
            $this->toast(
                type: 'success',
                title: 'Conta Ja Lancado, Extornar Contas Para Continuar!',
                position: 'toast-top toast-end',
                css: 'alert-error',
                icon: 'o-x-mark',
                timeout: '2000'
            );
        } else {
            FaturasPedido::where('pedido_id', $this->id_pedido)->delete();
        }
    }

    public function VerificacaoModalProdutos()
    {
        if(!$this->pedido->estoque_lancado)
        {
            $this->myModal1 = true;
        } else {
            $this->toast(
                type: 'success',
                title: 'Estoque Ja Lancado, Extornar Estoque Para Continuar!',
                position: 'toast-top toast-end',
                css: 'alert-error',
                icon: 'o-x-mark',
                timeout: '2000'
            );
        }
    }

    public function VerificarModalParcelas()
    {
        if(!$this->pedido->conta_lancada)
        {
            $this->myModal2 = true;
        } else {
            $this->toast(
                type: 'success',
                title: 'Conta Ja Lancado, Extornar Contas Para Continuar!',
                position: 'toast-top toast-end',
                css: 'alert-error',
                icon: 'o-x-mark',
                timeout: '2000'
            );
        }
    }
}
