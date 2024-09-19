<?php

namespace Database\Seeders;

use App\Models\VariaveisAmbiente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariaveisAmbienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VariaveisAmbiente::create([
            'chave' => 'taxa_comissao_shopee',
            'valor' => "16.5"
        ]);

        VariaveisAmbiente::create([
            'chave' => 'taxa_transporte_shopee',
            'valor' => "6"
        ]);
    }
}
