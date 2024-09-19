<?php

namespace App\Livewire\Utilitarios\Calc;

use App\Models\VariaveisAmbiente;
use Livewire\Component;

class ShopeeIndex extends Component
{
    public $variaveis_ambiente;

    // DADOS PARA CALCULO
    public $valor_bruto;
    public $valor_custo;

    public $valores_parciais;

    public function render()
    {
        return view('livewire.utilitarios.calc.shopee-index');
    }

    public function mount()
    {
        $this->variaveis_ambiente = VariaveisAmbiente::first();
    }

    public function CalcularValorLiquido()
    {
        $valores_parciais = [];

        // CALCULANDO VALOR COMISSAO VENDA
        $valores_parciais['comissao'] = ($this->valor_bruto * $this->variaveis_ambiente->taxa_comissao_shopee) / 100;

        // CALCULA VALOR TRANSAÇÃO DE VENDA
        $valores_parciais['transacao'] = ($this->valor_bruto * $this->variaveis_ambiente->taxa_transacao_shopee) / 100;

        // CALCULA VALOR TRANSPORTE
        $valores_parciais['transporte'] = ($this->valor_bruto * $this->variaveis_ambiente->taxa_transporte_shopee) / 100;

        // CUSTO POR ITEM
        $valores_parciais['taxa_item'] = intval($this->variaveis_ambiente->taxa_fixa_item_shopee);

        // VALOR TOTAL DESCONTO
        $valores_parciais['total_desconto'] = $valores_parciais['comissao'] + $valores_parciais['transacao'] + $valores_parciais['transporte'] + $valores_parciais['taxa_item'];

        // VALOR LUCRO LIQUIDO
        $valores_parciais['lucro_liquido'] = $this->valor_bruto - ($valores_parciais['total_desconto'] + $this->valor_custo);

        $this->valores_parciais = $valores_parciais;
    }
}
