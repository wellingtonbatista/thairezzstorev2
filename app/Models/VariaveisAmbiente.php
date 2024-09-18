<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariaveisAmbiente extends Model
{
    use HasFactory;

    protected $table = 'variaveis_ambiente';
    protected $fillable = [
        'chave', 
        'valor'
    ];
}
