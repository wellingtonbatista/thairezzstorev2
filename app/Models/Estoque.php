<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estoque extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'estoques';
    protected $fillable = [
        'id_produto',
        'id_deposito',
        'quantidade',
        'id_natureza_operacao',
        'id_referencial_entrada',
        'id_referencial_saida'
    ];

    public function deposito()
    {
        return $this->belongsTo(Deposito::class, 'id_deposito');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto');
    }

    public function natureza_operacao()
    {
        return $this->belongsTo(NaturezaOperacao::class, 'id_natureza_operacao');
    }
}
