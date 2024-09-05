<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entradas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'entradas';
    protected $fillable = [
        'fornecedor_id',
        'data_entrada',
        'id_natureza_operacao'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }

    public function natureza_operacao()
    {
        return $this->belongsTo(NaturezaOperacao::class, 'id_natureza_operacao');
    }
}
