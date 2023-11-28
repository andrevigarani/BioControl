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
        Schema::create('animais', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('nascimento');
            $table->date('falecimento')->nullable();
            $table->date('castracao')->nullable();

            $table->unsignedBigInteger('id_raca');
            $table->unsignedBigInteger('id_chip')->nullable();
            $table->unsignedBigInteger('id_abrigo')->nullable();
            $table->unsignedBigInteger('id_clinica_veterinaria')->nullable();
            $table->unsignedBigInteger('id_responsavel_animal');
            $table->timestamps();

            $table->foreign('id_raca')->references('id')->on('racas');
            $table->foreign('id_chip')->references('id')->on('chips');
            $table->foreign('id_abrigo')->references('id')->on('abrigos');
            $table->foreign('id_clinica_veterinaria')->references('id')->on('clinicas_veterinarias');
            $table->foreign('id_responsavel_animal')->references('id')->on('pessoas_fisicas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
