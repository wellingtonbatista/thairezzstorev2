<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntradasProdutos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'entradas_produtos';
    protected $fillable = [
        'entrada_id',
        'produto_id',
        'valor_compra',
        'quantidade'
    ];
}
