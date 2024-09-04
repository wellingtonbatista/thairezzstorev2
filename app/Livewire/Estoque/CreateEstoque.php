<?php

namespace App\Livewire\Estoque;

use App\Models\Deposito;
use App\Models\Estoque;
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

        $natureza_operacao = NaturezaOperacao::find($this->id_natureza_operacao);
        $produto = Produto::find($this->id_produto);

        // CRIAÇÃO DE REGISTRO NA TABELA DE ESTOQUE
        Estoque::create([
            'id_produto' => $this->id_produto,
            'id_natureza_operacao' => $this->id_natureza_operacao,
            'id_deposito' => $this->id_deposito_estoque,
            'quantidade' => $this->quantidade_estoque
        ]);

        // VERIFICAR SE O PRODUTO E UMA BONIFICACAO
        if($natureza_operacao->bonificacao)
        {
            // ALTERACAO DE QUANTIDADE DE ESTOQUE CADASTRO DO PRODUTO (BONIFICACAO)
            if($natureza_operacao->tipo_movimentacao == "0")
            {
                $produto->estoque_bonificacao = $produto->estoque_bonificacao + $this->quantidade_estoque;
            } else {
                $produto->estoque_bonificacao = $produto->estoque_bonificacao - $this->quantidade_estoque;
            }

            $produto->save();

        } else {
            // ALTERACAO DE QUANTIDADE DE ESTOQUE CADASTRO DO PRODUTO (COMPRA PAGA)

            if($natureza_operacao->tipo_movimentacao == "0")
            {
                $produto->estoque = $produto->estoque + $this->quantidade_estoque;
            } else {
                $produto->estoque = $produto->estoque - $this->quantidade_estoque;
            }

            $produto->save();
        }        

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
