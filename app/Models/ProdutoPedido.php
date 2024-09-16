<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutoPedido extends Model
{
    use HasFactory;

    protected $table = 'produto_pedidos';
    protected $fillable = [
        'pedido_id',
        'produto_id',
        'deposito_id',
        'valor_venda',
        'quantidade'
    ];
}
