<?php

namespace App\Livewire\Entradas;

use App\Models\Entradas;
use App\Models\EntradasProdutos;
use App\Models\Fornecedor;
use App\Models\NaturezaOperacao;
use App\Models\Produto;
use Livewire\Component;
use Mary\Traits\Toast;

class DetailsEntrada extends Component
{
    use Toast;

    public $id_entrada;

    public $fornecedores = [];
    public $natureza_operacao = [];
    public $produtos = [];
    public $produtos_pedido = [];

    public $id_fornecedor_entrada;
    public $data_compra_entrada;
    public $id_natureza_operacao;

    public $id_produto_entrada;
    public $valor_compra_entrada;
    public $quantidade_entrada;
    
    public function render()
    {
        $this->fornecedores = Fornecedor::all();
        $this->natureza_operacao = NaturezaOperacao::where('tipo_movimentacao', 0)->get();
        $this->produtos = Produto::all();
        $this->produtos_pedido = EntradasProdutos::where('entrada_id', $this->id_entrada)->get();

        return view('livewire.entradas.details-entrada');
    }

    public function mount()
    {
        $entrada = Entradas::find($this->id_entrada);

        $this->id_fornecedor_entrada = $entrada->fornecedor_id;
        $this->data_compra_entrada = $entrada->data_entrada;
        $this->id_natureza_operacao = $entrada->id_natureza_operacao;
    }

    public function create_produto_entrada()
    {
        EntradasProdutos::create([
            'entrada_id' => $this->id_entrada,
            'produto_id' => $this->id_produto_entrada,
            'valor_compra' => $this->valor_compra_entrada,
            'quantidade' => $this->quantidade_entrada
        ]);
    }
}
