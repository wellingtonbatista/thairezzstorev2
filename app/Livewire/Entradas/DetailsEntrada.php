<?php

namespace App\Livewire\Entradas;

use App\Models\Deposito;
use App\Models\Entradas;
use App\Models\EntradasProdutos;
use App\Models\NaturezaOperacao;
use App\Models\Produto;
use Illuminate\Support\Number;
use Livewire\Component;
use Mary\Traits\Toast;
use App\Http\Controllers\EstoqueController;
use App\Models\Estoque;

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
            'quantidade' => $this->quantidade_entrada,
            'deposito_id' => $this->id_deposito_entrada
        ]);

        $this->myModal1 = false;

        $this->reset(
            'id_deposito_entrada',
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

    public function remove_produto_entrada($id)
    {   
        $entrada_produto = EntradasProdutos::find($id);

        $entrada_produto->delete();

        $this->toast(
            type: 'error',
            title: 'Produto Removido do Pedido com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-error',
            icon: 'o-trash',
            timeout: '1000'
        );
    }

    public function calcular_valor_total_pedido(Entradas $entrada = null)
    {
        if($entrada != null)
        {
            $valor_total_pedido = 0;

            foreach($entrada->produtos as $produto)
            {
                $valor_total_pedido = $valor_total_pedido + ($produto->pivot->valor_compra * $produto->pivot->quantidade);
            }

            return Number::currency($valor_total_pedido, in: "BRL");
        }
    }
}
