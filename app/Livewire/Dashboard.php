<?php

namespace App\Livewire;

use App\Models\EntradasProdutos;
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
        $entradas = EntradasProdutos::all();

        //QUANTIDADE TOTAL DE PRODUTOS CADASTRADOS
        $this->produtos_cadastrados = $produtos->count();

        // CALCULAR VALOR TOTAL DO ESTOQUE
        foreach($produtos as $produto)
        {
            $this->valor_total_estoque = $this->valor_total_estoque + ($produto->valor_venda * $produto->estoque);
        }

        // CALCULAR VALOR TOTAL INVESTIDO
        foreach($entradas as $entrada)
        {
            $this->valot_total_investido = $this->valot_total_investido + ($entrada->valor_compra * $entrada->quantidade);
        }

        // CALCULAR LUCRO TOTAL
        $this->lucro_total_estoque = $this->valor_total_estoque - $this->valot_total_investido;
    }
}
