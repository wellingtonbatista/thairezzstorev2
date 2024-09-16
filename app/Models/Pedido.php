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
        'estoque_lancado',
        'conta_lancada',
        'pedido_referencial'
    ];

    protected $with = [
        'cliente',
    ];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class);
    }

    public function natureza_operacao()
    {
        return $this->belongsTo(NaturezaOperacao::class, 'id_natureza_operacao');
    }

    public function produtos()
    {
        return $this->belongsToMany(
            Produto::class,
            'produto_pedidos',
            'pedido_id',
            'produto_id'
        )->withPivot(
            'id',
            'valor_venda',
            'quantidade',
            'deposito_id',
            'pedido_id'
        );
    }

    public function faturas()
    {
        return $this->hasMany(FaturasPedido::class);
    }
}
