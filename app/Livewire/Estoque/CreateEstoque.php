<?php

namespace App\Livewire\Estoque;

use App\Models\Deposito;
use App\Http\Controllers\EstoqueController;
use App\Models\NaturezaOperacao;
use App\Models\Produto;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateEstoque extends Component
{
    use Toast;

    public $produtos = [];
    public $depositos = [];
    public $natureza_operacao = [];

    public $id_produto;
    public $id_natureza_operacao;
    public $id_deposito_estoque;
    public $quantidade_estoque;

    public function render()
    {
        $this->produtos = Produto::all();
        $this->depositos = Deposito::all();
        $this->natureza_operacao = NaturezaOperacao::orderBy('tipo_movimentacao', 'asc')->get();

        return view('livewire.estoque.create-estoque');
    }

    public function create_estoque()
    {
        $this->validate();

        // CRIAÇÃO DE REGISTRO NA TABELA DE ESTOQUE
        $estoque = new EstoqueController();

        $estoque->EntradaEstoque(
            $this->id_produto,
            $this->id_natureza_operacao,
            $this->id_deposito_estoque,
            $this->quantidade_estoque,
            ''
        );        

        $this->reset();

        $this->toast(
            type: 'success',
            title: 'Movimentacao Criado comn Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function rules()
    {
        return [
            'id_produto' => 'required',
            'id_natureza_operacao' => 'required',
            'id_deposito_estoque' => 'required',
            'quantidade_estoque' => 'required',
        ];
    }
}
