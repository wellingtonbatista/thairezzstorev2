<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContasReceber extends Model
{
    use HasFactory;

    protected $table = 'contas_receber';
    protected $fillable = [
        'pedido_id',
        'data_vencimento',
        'valor_parcela',
        'pagamento'
    ];
}
