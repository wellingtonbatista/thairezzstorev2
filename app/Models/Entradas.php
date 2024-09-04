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
}
