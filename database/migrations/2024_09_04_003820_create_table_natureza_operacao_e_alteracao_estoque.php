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
        Schema::create('natureza_operacao', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_movimentacao');
            $table->string('nome');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('estoques', function(Blueprint $table){
            $table->foreign('id_natureza_operacao')->references('id')->on('natureza_operacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('natureza_operacao');
    }
};
