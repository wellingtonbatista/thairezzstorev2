<?php

namespace App\Livewire\Entradas;

use App\Models\Entradas;
use App\Models\EntradasProdutos;
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
    public $entrada;

    // MODAL
    public $myModal1 = false;

    // DADOS DE EXIBICAO DE INFORMAÇÃO
    public $valor_total_pedido;

    // DADOS CADASTRO DE PRODUTOS TABELA INTERMEDIARIA
    public $id_produto_entrada;
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
    }

    public function create_produto_entrada()
    {
        EntradasProdutos::create([
            'entrada_id' => $this->id_entrada,
            'produto_id' => $this->id_produto_entrada,
            'valor_compra' => $this->valor_compra_entrada,
            'quantidade' => $this->quantidade_entrada
        ]);

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

    public function remove_produto_entrada($id)
    {
        EntradasProdutos::find($id)->delete();

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
