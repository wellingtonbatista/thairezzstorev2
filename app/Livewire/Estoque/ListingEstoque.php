<?php

namespace App\Livewire\Estoque;

use App\Models\Estoque;
use App\Models\Produto;
use Livewire\Component;
use Mary\Traits\Toast;

class ListingEstoque extends Component
{
    use Toast;

    public $estoques = [];

    public function render()
    {
        $this->estoques = Estoque::orderBy('id', 'desc')->get();

        return view('livewire.estoque.listing-estoque');
    }

    public function delete_estoque($id)
    {
        $estoque = Estoque::find($id);

        $produto = Produto::find($estoque->id_produto);
        
        if($estoque->tipo == 'entrada')
        {
            $produto->estoque = $produto->estoque - $estoque->quantidade;
        } else {
            $produto->estoque = $produto->estoque + $estoque->quantidade;
        }

        $produto->save();

        $estoque->delete();

        $this->toast(
            type: "error",
            title: "Movimentacao Apagado com Sucesso!",
            position: "toast-bottom toast-end",
            css: "alert-error",
            icon: "o-trash",
            timeout: '1500'
        );
    }
}
