<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "produtos";

    protected $fillable = [
        'fornecedor_id',
        'codigo_interno',
        'nome',
        'ean',
        'descricao',
        'valor_compra',
        'valor_venda',
        'estoque',
        'img',
        'estoque_bonificacao'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function pedidos()
    {
        return $this->belongsToMany(
            Pedido::class,
            'produto_pedidos',
            'produto_id',
            'pedido_id'
        );
    }
}
