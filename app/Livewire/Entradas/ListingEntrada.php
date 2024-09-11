<?php

namespace App\Livewire\Entradas;

use App\Models\Entradas;
use Livewire\Component;
use App\Http\Controllers\EstoqueController;
use App\Models\EntradasProdutos;
use App\Models\Fornecedor;
use App\Models\NaturezaOperacao;
use Mary\Traits\Toast;

class ListingEntrada extends Component
{
    use Toast;

    public $entradas = [];

    // FILTROS
    public $status_entrada;
    public $fornecedor_entrada;
    public $natureza_operacao_entrada;

    // OPÇOES DE FILTROS
    public $fornecedores;
    public $natureza_operacao;

    public function render()
    {
        $this->entradas = Entradas::query()->when($this->status_entrada, function($query){
            return $query->onlyTrashed();
        })->when($this->fornecedor_entrada, function($query){
            return $query->where('fornecedor_id', $this->fornecedor_entrada);
        })->when($this->natureza_operacao_entrada, function($query){
            return $query->where(''); // FALTANDO TERMINAR
        })->orderBy('id', 'desc')->get();

        return view('livewire.entradas.listing-entrada');
    }

    public function mount()
    {
        $this->fornecedores = Fornecedor::all();
        $this->natureza_operacao = NaturezaOperacao::where('tipo_movimentacao', 0)->get();
    }

    public function LancarEstoque($id_pedido)
    {
        $entrada = Entradas::find($id_pedido);

        $estoque = new EstoqueController();

        foreach($entrada->produtos as $produto)
        {   
            $estoque->EntradaEstoque(
                $produto->id,
                $entrada->id_natureza_operacao,
                $produto->pivot->deposito_id,
                $produto->pivot->quantidade,
                $entrada->id
            );
        }
        
        $entrada->estoque_lancado = true;
        $entrada->save();

        $this->toast(
            type: 'success',
            title: 'Estoque Lançado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function ExtornarEstoque($id_pedido)
    {
        $estoque = new EstoqueController();
        $entrada = Entradas::find($id_pedido);

        foreach($estoque->EstoqueEspecifico('id_referencial_entrada', $id_pedido) as $est)
        {
            $natureza_operacao = NaturezaOperacao::find($est->id_natureza_operacao);

            $estoque->ExtornarEstoque(
                $natureza_operacao->bonificacao,
                $est->id,
                $est->id_produto,
                $est->quantidade
            );
        }

        $entrada->estoque_lancado = false;
        $entrada->save();

        $this->toast(
            type: 'success',
            title: 'Estoque Extornado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function ArquivarPedido($id_pedido)
    {
        Entradas::find($id_pedido)->delete();

        $this->toast(
            type: 'success',
            title: 'Pedido Arquivado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function DesarquivarPedido($id)
    {
        Entradas::withTrashed()->where('id', $id)->restore();

        $this->toast(
            type: 'success',
            title: 'Pedido Desarquivado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-warning',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function LimparFiltroEntradas()
    {
        $this->reset(
            'status_entrada',
            'fornecedor_entrada',
            'natureza_operacao_entrada'
        );
    }
}
