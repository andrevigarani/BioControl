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
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->string('periodo');
            $table->timestamps();
        });

        Schema::create('animal_vacinas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_animal');
            $table->foreign('id_animal')->references('id')->on('animais');

            $table->unsignedBigInteger('id_vacina');
            $table->foreign('id_vacina')->references('id')->on('vacinas');

            $table->date('data_aplicacao');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacinas');
        Schema::dropIfExists('animal_vacinas');
    }
};
