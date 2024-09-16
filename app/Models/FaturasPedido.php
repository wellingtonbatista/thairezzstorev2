<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaturasPedido extends Model
{
    use HasFactory;

    protected $table = 'faturas_pedidos';
    protected $fillable = [
        'pedido_id',
        'data_vencimento',
        'valor_parcela',
    ];
}
