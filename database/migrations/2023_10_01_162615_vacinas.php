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
        Schema::create('vacinas', function (Blueprint $table) {
            $table->id('id_vacina');
            $table->string('nome_vacina');
            $table->string('periodo');
            $table->timestamps();
        });

        Schema::create('vacina_clinica_veterina', function (Blueprint $table) {
            $table->id('id_vacina_clinica_veterina');

            $table->unsignedBigInteger('id_clinica_veterinaria');
            $table->foreign('id_clinica_veterinaria')->references('id_clinica_veterinaria')->on('clinica_veterinarias');

            $table->unsignedBigInteger('id_vacina');
            $table->foreign('id_vacina')->references('id_vacina')->on('vacinas');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacinas');
        Schema::dropIfExists('vacina_clinica_veterina');
    }
};
