<?php

namespace App\Livewire\Produtos;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Fornecedor;
use App\Models\Produto;
use Mary\Traits\Toast;

class CreateProduto extends Component
{
    use WithFileUploads;
    use Toast;

    public $fornecedores = [];

    public $id_fornecedor_produto;
    public $codigo_interno_produto;
    public $nome_produto;
    public $ean_produto;
    public $descricao_produto;
    public $valor_compra_produto;
    public $valor_venda_produto;
    public $imagem_produto;

    public function render()
    {
        $this->fornecedores = Fornecedor::all();

        return view('livewire.produtos.create-produto');
    }

    public function create_produto()
    {
        $this->validate();

        $this->imagem_produto->store(path: 'photos');

        Produto::create([
            'fornecedor_id' => $this->id_fornecedor_produto,
            'codigo_interno' => $this->codigo_interno_produto,
            'nome' => $this->nome_produto,
            'ean' => $this->ean_produto,
            'descricao' => $this->descricao_produto,
            'valor_compra' => $this->valor_compra_produto,
            'valor_venda' => $this->valor_venda_produto,
            'estoque' => 0,
            'estoque_bonificao' => 0,
            'img' => $this->imagem_produto->hashName()
        ]);
        
        $this->reset(
            'id_fornecedor_produto',
            'codigo_interno_produto',
            'nome_produto',
            'ean_produto',
            'descricao_produto',
            'valor_compra_produto',
            'valor_venda_produto',
            'imagem_produto'
        );

        $this->toast(
            type: 'success',
            title: 'Produto Cadastrado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function rules()
    {
        return [
            'id_fornecedor_produto' => 'required',
            'codigo_interno_produto' => 'required',
            'nome_produto' => 'required|min:3|max:255',
            'valor_compra_produto' => 'required|numeric',
            'valor_venda_produto' => 'required|numeric',
            'imagem_produto' => 'required'
        ];
    }
}
