<?php

namespace App\Livewire\Fornecedores;

use Livewire\Component;
use App\Models\Fornecedor;
use Mary\Traits\Toast;

class CreateFornecedor extends Component
{

    use Toast;

    public $nome_fornecedor;
    public $limite_compra_fornecedor;
    public $descricao_fornecedor;

    public function render()
    {
        return view('livewire.fornecedores.create-fornecedor');
    }

    public function create_fornecedor()
    {

        $this->validate();

        Fornecedor::create([
            'nome' => $this->nome_fornecedor,
            'descricao' => $this->descricao_fornecedor,
            'limite_compra' => $this->limite_compra_fornecedor
        ]);

        $this->reset();

        $this->toast(
            type: "success",
            title: "Fornecedor Cadastrado com Sucesso!",
            position: "toast-bottom toast-end",
            css: "alert-success",
            icon: "o-check-badge",
            timeout: "1500"
        );
    }

    public function rules()
    {
        return [
            'nome_fornecedor' => 'required|min:3|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nome_fornecedor.required' => 'O campo nome é de preenchimento obrigatorio!',
            'nome_fornecedor.min' => 'O campo nome deve ter pelo menos 3 caracteres!',
            'nome_fornecedor.max' => 'O campo nome deve ter menos de 255 caracteres!'
        ];
    }
}
