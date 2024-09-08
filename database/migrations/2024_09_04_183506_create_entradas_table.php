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
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fornecedor_id');
            $table->date('data_entrada');
            $table->unsignedBigInteger('id_natureza_operacao');
            $table->boolean('estoque_lancado');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
            $table->foreign('id_natureza_operacao')->references('id')->on('natureza_operacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
