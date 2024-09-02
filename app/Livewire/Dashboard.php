<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;

class Dashboard extends Component
{
    public $produtos_cadastrados;
    public $valor_total_estoque = 0;
    public $valot_total_investido = 0;
    public $lucro_total_estoque = 0;

    public function render()
    {
        return view('dashboard');
    }

    public function mount()
    {
        $produtos = Produto::all();

        //QUANTIDADE TOTAL DE PRODUTOS CADASTRADOS
        $this->produtos_cadastrados = $produtos->count();

        //VALOR TOTAL DE PRODUTOS EM ESTOQUE
        foreach($produtos as $produto)
        {
            $valor_total_produto_venda = $produto->valor_venda * $produto->estoque;

            $this->valor_total_estoque = $this->valor_total_estoque + $valor_total_produto_venda;
        }

        //VALOR TOTAL DE INVESTIMENTO GASTO PARA COMPRA DO ESTOQUE
        foreach($produtos as $produto)
        {
            $valor_total_produto_compra = $produto->valor_compra * $produto->estoque;

            $this->valot_total_investido = $this->valot_total_investido + $valor_total_produto_compra;
        }

        //LUCRO TOTAL DO ESTOQUE
        $this->lucro_total_estoque = $this->valor_total_estoque - $this->valot_total_investido;
    }
}
