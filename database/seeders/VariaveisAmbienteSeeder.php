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
            'taxa_comissao_shopee' => '1',
            'taxa_transporte_shopee' => '1',
            'taxa_transacao_shopee' => '1',
            'taxa_fixa_item_shopee' => '1'
        ]);
    }
}
