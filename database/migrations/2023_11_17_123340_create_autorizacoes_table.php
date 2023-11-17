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
        Schema::create('autorizacoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_inicial');
            $table->date('data_final');
            $table->text('licenca');
            $table->timestamps();
        });

        Schema::create('pessoa_juridica_autorizacoes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_pessoa_juridica');
            $table->foreign('id_pessoa_juridica')->references('id')->on('pessoas_juridicas');

            $table->unsignedBigInteger('id_autorizacao');
            $table->foreign('id_autorizacao')->references('id')->on('autorizacoes');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorizacoes');
        Schema::dropIfExists('pessoa_juridica_autorizacoes');
    }
};
