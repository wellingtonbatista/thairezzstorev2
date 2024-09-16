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
        Schema::create('entradas_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entrada_id');
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('deposito_id');
            $table->float('valor_compra');
            $table->integer('quantidade');
            $table->timestamps();

            $table->foreign('entrada_id')->references('id')->on('entradas');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('deposito_id')->references('id')->on('depositos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas_produtos');
    }
};
