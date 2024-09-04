<?php

namespace App\Livewire\Produtos;

use Illuminate\Support\Facades\Storage;
use App\Models\Fornecedor;
use App\Models\Produto;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class DetailsProduto extends Component
{
    use WithFileUploads;
    use Toast;

    public $id_produto;
    public $fornecedores = [];

    public $id_fornecedor_produto;
    public $codigo_interno_produto;
    public $nome_produto;
    public $ean_produto;
    public $descricao_produto;
    public $valor_compra_produto;
    public $valor_venda_produto;
    public $imagem_produto;
    public $estoque_produto;
    public $estoque_produto_bonificacao;

    public function render()
    {
        $this->fornecedores = Fornecedor::all();

        return view('livewire.produtos.details-produto');
    }

    public function mount()
    {
        $produto = Produto::find($this->id_produto);

        $this->id_fornecedor_produto = $produto->fornecedor_id;
        $this->codigo_interno_produto = $produto->codigo_interno;
        $this->nome_produto = $produto->nome;
        $this->ean_produto = $produto->ean;
        $this->descricao_produto = $produto->descricao;
        $this->valor_compra_produto = $produto->valor_compra;
        $this->valor_venda_produto = $produto->valor_venda;
        $this->estoque_produto = $produto->estoque;
        $this->estoque_produto_bonificacao = $produto->estoque_bonificacao;
    }

    public function update_produto()
    {
        $this->validate();

        $produto = Produto::find($this->id_produto);

        if($this->imagem_produto != '')
        {
            Storage::delete('photos/'.$produto->img);

            $this->imagem_produto->store(path: 'photos');
            $produto->img = $this->imagem_produto->hashName();
        }

        $produto->fornecedor_id = $this->id_fornecedor_produto;
        $produto->codigo_interno = $this->codigo_interno_produto;
        $produto->nome = $this->nome_produto;
        $produto->ean = $this->ean_produto;
        $produto->descricao = $this->descricao_produto;
        $produto->valor_compra = $this->valor_compra_produto;
        $produto->valor_venda = $this->valor_venda_produto;
        
        $produto->save();

        $this->toast(
            type: 'success',
            title: 'Produto Atualizado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-info',
            icon: "o-check-badge",
            timeout: "1500"
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
        ];
    }
}
