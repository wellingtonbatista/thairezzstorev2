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
        Schema::table('natureza_operacao', function(Blueprint $table){
            $table->boolean('bonificacao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('natureza_operacao', function(Blueprint $table){
            $table->dropColumn('bonificacao');
        });
    }
};
