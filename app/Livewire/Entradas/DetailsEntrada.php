<?php

namespace App\Livewire\Entradas;

use App\Models\Deposito;
use App\Models\Entradas;
use App\Models\EntradasProdutos;
use App\Models\Estoque;
use App\Models\Fornecedor;
use App\Models\NaturezaOperacao;
use App\Models\Produto;
use Illuminate\Support\Number;
use Livewire\Component;
use Mary\Traits\Toast;

class DetailsEntrada extends Component
{
    use Toast;

    public $id_entrada;

    // DADOS PARA FUNCIONAMENTO
    public $produtos = [];
    public $depositos = [];
    public $entrada;
    public $natureza_operacao = [];

    // MODAL
    public $myModal1 = false;
    public $myModal2 = false;

    // DADOS PARA REMOVER PRODUTOS DE ENTRADAS_PRODUTOS
    public $id_entrada_produto_remover;
    public $id_natureza_operacao_remover;
    public $id_depositos_remover;

    // DADOS DE EXIBICAO DE INFORMAÇÃO
    public $valor_total_pedido;

    // DADOS CADASTRO DE PRODUTOS TABELA INTERMEDIARIA
    public $id_produto_entrada;
    public $id_deposito_entrada;
    public $valor_compra_entrada;
    public $quantidade_entrada;
    
    public function render()
    {
        $this->valor_total_pedido = $this->calcular_valor_total_pedido($this->entrada);

        return view('livewire.entradas.details-entrada');
    }

    public function mount()
    {
        $this->entrada = Entradas::find($this->id_entrada);
        $this->produtos = Produto::all();
        $this->depositos = Deposito::all();
        $this->natureza_operacao = NaturezaOperacao::where('tipo_movimentacao', 1)->get();
    }

    public function create_produto_entrada()
    {
        EntradasProdutos::create([
            'entrada_id' => $this->id_entrada,
            'produto_id' => $this->id_produto_entrada,
            'valor_compra' => $this->valor_compra_entrada,
            'quantidade' => $this->quantidade_entrada
        ]);

        // MOVIMENTAÇÃO DE ESTOQUE
        Estoque::create([
            'id_produto' => $this->id_produto_entrada,
            'id_natureza_operacao' => $this->entrada->natureza_operacao->id,
            'id_deposito' => $this->id_deposito_entrada,
            'quantidade' => $this->quantidade_entrada
        ]);

        // ADICIONAR ESTOQUE AO PRODUTO
        $produto = Produto::find($this->id_produto_entrada);

        if($this->entrada->natureza_operacao->bonificacao)
        {
            $produto->estoque_bonificacao = $produto->estoque_bonificacao + $this->quantidade_entrada; 
        } else {
            $produto->estoque = $produto->estoque + $this->quantidade_entrada;
        }

        $produto->save();
        

        $this->reset(
            'id_produto_entrada',
            'valor_compra_entrada',
            'quantidade_entrada'
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

    public function remove_produto_entrada()
    {
        $entrada_produto = EntradasProdutos::find($this->id_entrada_produto_remover);

        // MOVIMENTACAO DE ESTOQUE
        Estoque::create([
            'id_produto' => $entrada_produto->produto_id,
            'id_natureza_operacao' => $this->id_natureza_operacao_remover,
            'id_deposito' => $this->id_depositos_remover,
            'quantidade' => $entrada_produto->quantidade
        ]);

        // REMOVENDO ESTOQUE PRODUTO
        $produto = Produto::find($entrada_produto->produto_id);

        if($this->entrada->natureza_operacao->bonificacao)
        {
            $produto->estoque_bonificacao = $produto->estoque_bonificacao - $entrada_produto->pivot->quantidade;
        } else {
            $produto->estoque = $produto->estoque - $entrada_produto->quantidade;
        }

        $produto->save();

        $entrada_produto->delete();

        $this->myModal2 = false;

        $this->toast(
            type: 'error',
            title: 'Produto Removido do Pedido com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-error',
            icon: 'o-trash',
            timeout: '1000'
        );
    }

    public function calcular_valor_total_pedido(Entradas $entrada)
    {
        $valor_total_pedido = 0;

        foreach($entrada->produtos as $produto)
        {
            $valor_total_pedido = $valor_total_pedido + ($produto->pivot->valor_compra * $produto->pivot->quantidade);
        }

        return Number::currency($valor_total_pedido, in: "BRL");
    }
}
