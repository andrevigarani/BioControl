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
        Schema::create('veterinarios', function (Blueprint $table) {
            $table->id('id_veterinario');
            $table->string('regesitro_veterianrio');
            $table->unsignedBigInteger('id_pessoa');
            $table->timestamps();

            $table->foreign('id_pessoa')->references('id_pessoa')->on('pessoa_fisicas');
         
         });

         Schema::create('veterinario_acao_castracao', function (Blueprint $table) {
            $table->id('id_veterinario_acao_castracao');

            $table->unsignedBigInteger('id_veterinario');
            $table->foreign('id_veterinario')->references('id_veterinario')->on('veterinarios');

            $table->unsignedBigInteger('id_acao_castracao');
            $table->foreign('id_acao_castracao')->references('id_acao_castracao')->on('acao_castracaos');
         
            $table->timestamps();
         });
    } 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veterinarios');
    }
};
