<?php

namespace App\Livewire\Pedidos;

use App\Models\Clientes;
use App\Models\NaturezaOperacao;
use App\Models\Pedido;
use Livewire\Component;
use Mary\Traits\Toast;
use App\Http\Controllers\EstoqueController;
use App\Models\ContasReceber;
use App\Models\FaturasPedido;

class ListingPedidos extends Component
{
    use Toast;

    public $myModal1 = false;

    // DADOS FILTRO
    public $clientes;
    public $natureza_operacao;

    // FILTROS
    public $status_pedido;
    public $cliente_pedido;
    public $natureza_operacao_pedido;

    public $pedidos;

    public function render()
    {
        $this->pedidos = Pedido::query()->when($this->status_pedido, function($query){
            return $query->withTrashed()->onlyTrashed();
        })->when($this->cliente_pedido, function($query){
            return $query->where('cliente_id', $this->cliente_pedido);
        })->when($this->natureza_operacao_pedido, function($query){
            return $query->where('id_natureza_operacao', $this->natureza_operacao_pedido);
        })->orderBy('id', 'desc')->get();

        return view('livewire.pedidos.listing-pedidos');
    }

    public function mount()
    {
        $this->clientes = Clientes::all();
        $this->natureza_operacao = NaturezaOperacao::where('tipo_movimentacao', "1")->get();
    }

    public function ArquivarPedido($id)
    {
        Pedido::find($id)->delete();

        $this->toast(
            type: 'success',
            title: 'Pedido Arquivado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-warning',
            icon: 'o-check-badge',
            timeout: '1500'
        );
    }

    public function DesarquivarPedido($id)
    {
        Pedido::withTrashed()->where('id', $id)->restore();
    }

    public function LimparFiltroPedido()
    {
        $this->reset(
            'status_pedido',
            'cliente_pedido',
            'natureza_operacao_pedido'
        );
    }

    public function LancarEstoque($id_pedido)
    {
        $pedido = Pedido::find($id_pedido);

        $estoque = new EstoqueController();

        foreach($pedido->produtos as $produto)
        {
            $estoque->SaidaEstoque(
                $produto->id,
                $pedido->id_natureza_operacao,
                $produto->pivot->deposito_id,
                $produto->pivot->quantidade,
                $id_pedido
            );
        }

        $pedido->estoque_lancado = true;
        $pedido->save();

        $this->toast(
            type: 'success',
            title: 'Estoque Lancado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1000'
        );
    }

    public function ExtornarEstoque($id_pedido)
    {
        $pedido = Pedido::find($id_pedido);

        $estoque = new EstoqueController();
        
        foreach($estoque->EstoqueEspecifico('id_referencial_saida', $id_pedido) as $est)
        {
            $natureza_operacao = NaturezaOperacao::find($est->id_natureza_operacao);

            $estoque->ExtornarEstoque(
                $natureza_operacao->tipo_movimentacao,
                $natureza_operacao->bonificacao,
                $est->id,
                $est->id_produto,
                $est->quantidade
            );
        }

        $pedido->estoque_lancado = false;
        $pedido->save();

        $this->toast(
            type: 'success',
            title: 'Estoque Extornado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-error',
            icon: 'o-check-badge',
            timeout: '1000'
        );
            
    }

    public function LancarConta($id_pedido)
    {
        $pedido = Pedido::find($id_pedido);
        $parcelas_pedidos = FaturasPedido::where('pedido_id', $id_pedido)->get();

        foreach($parcelas_pedidos as $parcelas)
        {
            ContasReceber::create([
                'pedido_id' => $id_pedido,
                'data_vencimento' => $parcelas->data_vencimento,
                'valor_parcela' => $parcelas->valor_parcela,
                'pagamento' => false,
                'cliente_id' => $pedido->cliente_id
            ]);
        }

        $pedido->conta_lancada = true;
        $pedido->save();

        $this->toast(
            type: 'success',
            title: 'Contas Lancado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1000'
        );
    }

    public function ExtornarConta($id_pedido)
    {
        $pedido = Pedido::find($id_pedido);

        ContasReceber::where('pedido_id', $id_pedido)->delete();

        $pedido->conta_lancada = false;
        $pedido->save();

        $this->toast(
            type: 'success',
            title: 'Contas Extornado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1000'
        );
    }
}
