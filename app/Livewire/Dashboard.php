<?php

namespace App\Livewire;

use App\Models\ContasReceber;
use App\Models\EntradasProdutos;
use App\Models\Produto;
use App\Models\Pedido;
use Livewire\Component;

class Dashboard extends Component
{
    public $produtos_cadastrados;
    public $valor_total_estoque = 0;
    public $valot_total_investido = 0;
    public $lucro_total_estoque = 0;
    public $contas_aberto = 0;
    public $valor_vendido_ultimos_dias = 0;

    public $data_inicial_vendas;
    public $data_final_vendas;

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

        // CALCULAR CONTAS EM ABERTO
        $contas = ContasReceber::where('pagamento', 0)->get();

        foreach($contas as $conta)
        {
            $this->contas_aberto = $this->contas_aberto + $conta->valor_parcela;
        }

        // CALCULANDO TOTAL VENDIDO NOS ULTIMOS 30 DIAS
        $this->data_inicial_vendas = date('Y-m-d');
        $this->data_final_vendas = date('Y-m-d', strtotime('- 30 days', strtotime($this->data_inicial_vendas)));

        $pedidos = Pedido::where('data_venda', '<', $this->data_inicial_vendas)
            ->where('data_venda', '>', $this->data_final_vendas)
            ->get();

        foreach($pedidos as $pedido)
        {
            foreach($pedido->contas_receber as $conta)
            {
                $this->valor_vendido_ultimos_dias = $this->valor_vendido_ultimos_dias + $conta->valor_parcela;
            }
        }
            
    }
}
