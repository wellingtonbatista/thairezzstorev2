<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariaveisAmbiente extends Model
{
    use HasFactory;

    protected $table = 'variaveis_ambiente';
    protected $fillable = [
        'taxa_comissao_shopee', 
        'taxa_transporte_shopee',
        'taxa_transacao_shopee',
        'taxa_fixa_item_shopee'
    ];
}
