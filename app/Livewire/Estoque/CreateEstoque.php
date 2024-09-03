<?php

namespace App\Livewire\Estoque;

use App\Models\Deposito;
use App\Models\Estoque;
use App\Models\Produto;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateEstoque extends Component
{
    use Toast;

    public $produtos = [];
    public $depositos = [];

    public $id_produto;
    public $tipo_estoque;
    public $natureza_operacao;
    public $id_deposito_estoque;
    public $quantidade_estoque;

    public function render()
    {
        $this->produtos = Produto::all();
        $this->depositos = Deposito::all();

        return view('livewire.estoque.create-estoque');
    }

    public function create_estoque()
    {
        $this->validate();

        Estoque::create([
            'id_produto' => $this->id_produto,
            'tipo' => $this->tipo_estoque,
            'id_deposito' => $this->id_deposito_estoque,
            'quantidade' => $this->quantidade_estoque
        ]);

        // ALTERACAO DE QUANTIDADE DE ESTOQUE CADASTRO DO PRODUTO

        $produto = Produto::find($this->id_produto);

        if($this->tipo_estoque == 'entrada')
        {
            $produto->estoque = $produto->estoque + $this->quantidade_estoque;
        } else {
            $produto->estoque = $produto->estoque - $this->quantidade_estoque;
        }

        $produto->save();

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
            'tipo_estoque' => 'required',
            'id_deposito_estoque' => 'required',
            'quantidade_estoque' => 'required',
        ];
    }
}
