<?php

namespace App\Livewire\Produtos;

use App\Models\Produto;
use Livewire\Component;
use Mary\Traits\Toast;

class ListingProduto extends Component
{
    use Toast;

    public $produtos = [];

    // FILTROS
    public $status_produto;
    public $nome_produto;
    public $codigo_interno_produto;

    public function render()
    {
        $this->produtos = Produto::query()->when($this->status_produto, function($query){
            return $query->onlyTrashed();
        })->when($this->nome_produto, function($query){
            return $query->where('nome', 'LIKE', '%'.$this->nome_produto.'%');
        })->when($this->codigo_interno_produto, function($query){
            return $query->where('codigo_interno', 'LIKE', '%'.$this->codigo_interno_produto.'%');
        })->get();

        return view('livewire.produtos.listing-produto');
    }

    public function ArquivarProduto($id)
    {
        Produto::find($id)->delete();

        $this->toast(
            type: 'success',
            title: 'Produto Arquivado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-warning',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function DesarquivarProduto($id)
    {
        Produto::withTrashed()->where('id', $id)->restore();

        $this->toast(
            type: 'success',
            title: 'Produto Desarquivado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-warning',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function LimparFiltroProduto()
    {
        $this->reset(
            'status_produto',
            'nome_produto',
            'codigo_interno_produto'
        );
    }
}
