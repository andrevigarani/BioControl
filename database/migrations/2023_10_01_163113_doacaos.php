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
        Schema::create('doacaos', function (Blueprint $table) {
            $table->id('id_doacao');
            $table->unsignedBigInteger('id_animal');
            $table->unsignedBigInteger('id_abrigo');
            $table->unsignedBigInteger('id_pessoa_fisica');
            $table->date('data_doacao');
            $table->timestamps();

            $table->foreign('id_animal')->references('id_animal')->on('animals');
            $table->foreign('id_abrigo')->references('id_abrigo')->on('abrigos');
            $table->foreign('id_pessoa_fisica')->references('id_pessoa_fisica')->on('pessoa_fisicas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doacaos');
    }
};
