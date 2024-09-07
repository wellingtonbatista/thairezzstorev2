<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\NaturezaOperacao;
use App\Models\Produto;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function CreateEstoque($id_produto, $id_natureza_operacao, $id_deposito, $quantidade)
    {
        $natureza_operacao = NaturezaOperacao::find($id_natureza_operacao);
        $produto = Produto::find($id_produto);

        Estoque::create([
            'id_produto' => $id_produto,
            'id_natureza_operacao' => $id_natureza_operacao,
            'id_deposito' => $id_deposito,
            'quantidade' => $quantidade
        ]);

        // Verifica se a natureza de operacao e uma bonificacao
        if($natureza_operacao->bonificacao)
        {
            // Alteracao na quantidade de produtos bonificados
            // Verifica se entrada ou saida de produto

            if($natureza_operacao->tipo_movimentacao == 0){
                $produto->estoque_bonificacao = $produto->estoque_bonificacao + $quantidade;
            } else {
                $produto->estoque_bonificacao = $produto->estoque_bonificacao - $quantidade;
            }
        } else {
            // Alteracao na quantidade de produtos comprados
            // Verifica se entrada ou saida de produto

            if($natureza_operacao->tipo_movimentacao == 0)
            {
                $produto->estoque = $produto->estoque + $quantidade;
            } else {
                $produto->estoque = $produto->estoque - $quantidade;
            }
        }

        $produto->save();

    }

    public function Estoques()
    {
        return Estoque::all();
    }

    public function DeleteEstoque($id)
    {
        $estoque = Estoque::find($id);

        
    }
}
