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
        Schema::create('doenca_especies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_doenca');
            $table->unsignedBigInteger('id_especie');
            $table->timestamps();
    
            // Defina as chaves estrangeiras
            $table->foreign('id_doenca')->references('id_doenca')->on('doencas');
            $table->foreign('id_especie')->references('id_especie')->on('especies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doenca_especies');
    }
};
