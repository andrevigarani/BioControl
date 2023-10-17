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
        Schema::create('animals', function (Blueprint $table) {
            $table->id('id_animal');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->date('data_falecimento');

            $table->unsignedBigInteger('id_especie');
            $table->unsignedBigInteger('id_raca');
            $table->unsignedBigInteger('id_chip')->Nullable();
            $table->unsignedBigInteger('id_responsavel_animal');
            $table->timestamps();

            $table->foreign('id_especie')->references('id_especie')->on('especies');
            $table->foreign('id_raca')->references('id_raca')->on('racas');
            $table->foreign('id_chip')->references('id_chip')->on('chips');
            $table->foreign('id_responsavel_animal')->references('id_pessoa')->on('pessoas');
        });

        Schema::create('animal_doenca', function (Blueprint $table) {
            $table->id('id_animal_doente');

            $table->unsignedBigInteger('id_animal');
            $table->foreign('id_animal')->references('id_animal')->on('animals');

            $table->unsignedBigInteger('id_doenca');
            $table->foreign('id_doenca')->references('id_doenca')->on('doencas');

            $table->date('data_inicial_animal_doenca');
            $table->date('data_final_animal_doenca');

            $table->timestamps();
        });

        Schema::create('animal_vacina', function (Blueprint $table) {
            $table->id('id_animal_doente');

            $table->unsignedBigInteger('id_animal');
            $table->foreign('id_animal')->references('id_animal')->on('animals');

            $table->unsignedBigInteger('id_vacina');
            $table->foreign('id_vacina')->references('id_vacina')->on('vacinas');

            $table->date('data_animal_vacina');

            $table->timestamps();
        });

            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
        Schema::dropIfExists('animal_doenca');
        Schema::dropIfExists('animal_vacina');
    }
};
