<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\NaturezaOperacao;
use App\Models\Produto;

class EstoqueController extends Controller
{
    public function EntradaEstoque($id_produto, $id_natureza_operacao = null, $id_deposito, $quantidade, $id_referencial_entrada)
    {
        $natureza_operacao = NaturezaOperacao::find($id_natureza_operacao);
        $produto = Produto::find($id_produto);

        Estoque::create([
            'id_produto' => $id_produto,
            'id_natureza_operacao' => $id_natureza_operacao,
            'id_deposito' => $id_deposito,
            'quantidade' => $quantidade,
            'id_referencial_entrada' => $id_referencial_entrada
        ]);

        // Verifica se a natureza de operacao e uma bonificacao
        if($natureza_operacao->bonificacao)
        {
            $produto->estoque_bonificacao = $produto->estoque_bonificacao + $quantidade;
        } else {
            $produto->estoque = $produto->estoque + $quantidade;
        }

        $produto->save();

    }

    public function SaidaEstoque($id_produto, $id_natureza_operacao, $id_deposito, $quantidade, $id_referencial_saida = null)
    {
        $natureza_operacao = NaturezaOperacao::find($id_natureza_operacao);
        $produto = Produto::find($id_produto);

        Estoque::create([
            'id_produto' => $id_produto,
            'id_natureza_operacao' => $id_natureza_operacao,
            'id_deposito' => $id_deposito,
            'quantidade' => $quantidade,
            'id_referencial_saida' => $id_referencial_saida
        ]);

        // Verifica se a natureza de operacao e uma bonificacao
        if($natureza_operacao->bonificacao)
        {
            $produto->estoque_bonificacao = $produto->estoque_bonificacao - $quantidade;
        } else {
            $produto->estoque = $produto->estoque - $quantidade;
        }

        $produto->save();
    }

    public function ExtornarEstoque($tipo, $bonificacao, $id_estoque, $id_produto, $quantidade)
    {
        $produto = Produto::find($id_produto);

        if($tipo == 0)
        {
            if($bonificacao)
            {
                $produto->estoque_bonificacao = $produto->estoque_bonificacao - $quantidade;
            } else {
                $produto->estoque = $produto->estoque - $quantidade;
            }
        } else {
            if($bonificacao)
            {
                $produto->estoque_bonificacao = $produto->estoque_bonificacao + $quantidade;
            } else {
                $produto->estoque = $produto->estoque + $quantidade;
            }
        }

        $produto->save();

        Estoque::find($id_estoque)->forceDelete();
    }

    public function Estoques()
    {
        return Estoque::all();
    }

    public function EstoqueEspecifico($campo_procurar, $dado)
    {
        return Estoque::where($campo_procurar, $dado)->get();
    }
}
