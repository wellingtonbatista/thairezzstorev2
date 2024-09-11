<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pedidos';
    
    protected $fillable = [
        'cliente_id',
        'data_venda',
        'id_natureza_operacao',
        'estoque_lancado'
    ];
}
