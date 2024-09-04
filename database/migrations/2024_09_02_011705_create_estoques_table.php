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
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produto');
            $table->string('id_natureza_operacao');
            $table->unsignedBigInteger('id_deposito');
            $table->integer('quantidade');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->foreign('id_deposito')->references('id')->on('depositos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};
