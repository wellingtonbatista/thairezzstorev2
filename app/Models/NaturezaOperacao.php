<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NaturezaOperacao extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'natureza_operacao';
    protected $fillable = [
        'nome',
        'tipo_movimentacao'
    ];
}
