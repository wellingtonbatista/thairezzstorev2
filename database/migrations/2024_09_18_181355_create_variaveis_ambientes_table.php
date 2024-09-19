<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('variaveis_ambiente', function (Blueprint $table) {
            $table->id();
            $table->string('taxa_comissao_shopee')->nullable();
            $table->string('taxa_transporte_shopee')->nullable();
            $table->string('taxa_transacao_shopee')->nullable();
            $table->string('taxa_fixa_item_shopee')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variaveis_ambiente');
    }
};
