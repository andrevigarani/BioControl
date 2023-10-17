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
        Schema::create('castracaos', function (Blueprint $table) {
            $table->id('id_castracao');
            $table->unsignedBigInteger('id_animal');
            $table->date('data_castracao');
            $table->unsignedBigInteger('id_acao_castracao')->Nullable();
            $table->timestamps();

            $table->foreign('id_animal')->references('id_animal')->on('animals');
            $table->foreign('id_acao_castracao')->references('id_acao_castracao')->on('acao_castracaos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('castracaos');
    }
};
