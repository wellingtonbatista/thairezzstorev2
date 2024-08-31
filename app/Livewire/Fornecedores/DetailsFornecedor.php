<?php

namespace App\Livewire\Fornecedores;

use App\Models\Fornecedor;
use Livewire\Component;
use Mary\Traits\Toast;

class DetailsFornecedor extends Component
{
    use Toast;

    public $id;

    public $nome_fornecedor;
    public $limite_compra_fornecedor;
    public $descricao_fornecedor;

    public function render()
    {
        return view('livewire.fornecedores.details-fornecedor');
    }

    public function mount()
    {
        $fornecedor = Fornecedor::find($this->id);

        $this->nome_fornecedor = $fornecedor->nome;
        $this->limite_compra_fornecedor = $fornecedor->limite_compra ?? '';
        $this->descricao_fornecedor = $fornecedor->descricao ?? '';
    }

    public function update_fornecedor()
    {   
        $fornecedor = Fornecedor::find($this->id);

        $fornecedor->nome = $this->nome_fornecedor;
        $fornecedor->limite_compra = $this->limite_compra_fornecedor;
        $fornecedor->descricao = $this->descricao_fornecedor;

        $fornecedor->save();

        $this->toast(
            type: "success",
            title: "Fornecedor Atualizado com Sucesso!",
            position: "toast-bottom toast-end",
            css: "alert-info",
            icon: "o-check-badge",
            timeout: "1500"
        );
    }
}
