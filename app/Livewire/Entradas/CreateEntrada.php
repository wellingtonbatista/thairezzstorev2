<?php

namespace App\Livewire\Entradas;

use App\Models\Entradas;
use App\Models\NaturezaOperacao;
use App\Models\Fornecedor;
use Livewire\Component;
use Mary\Traits\Toast;

class CreateEntrada extends Component
{
    use Toast;

    public $natureza_operacao = [];
    public $fornecedores = [];

    public $id_natureza_operacao_entrada;
    public $data_compra_entrada;
    public $id_fornecedor_entrada;

    public function render()
    {
        $this->natureza_operacao = NaturezaOperacao::where('tipo_movimentacao', '0')->get();
        $this->fornecedores = Fornecedor::all();

        return view('livewire.entradas.create-entrada');
    }

    public function rules()
    {
        return [
            'id_natureza_operacao_entrada' => 'required',
            'data_compra_entrada' => 'required',
            'id_fornecedor_entrada' => 'required'
        ];
    }

    public function create_entrada()
    {
        $this->validate();

        $entrada = Entradas::create([
            'fornecedor_id' => $this->id_fornecedor_entrada,
            'data_entrada' => $this->data_compra_entrada,
            'id_natureza_operacao' => $this->id_natureza_operacao_entrada
        ]);

        $this->reset();

        $this->toast(
            type: 'success',
            title: 'Pedido de Compra Criado com Sucesso!',
            position: 'toast-bottom toast-end',
            css: 'alert-success',
            icon: 'o-check-badge',
            timeout: '1500'
        );

        return redirect()->route('entrada.details', ['id_entrada' => $entrada->id]);
    }
}
