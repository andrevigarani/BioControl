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
        Schema::create('doencas', function (Blueprint $table) {
            $table->id('id_doenca');
            $table->String('nome_doenca')->notNullable();
            $table->unsignedBigInteger('id_letalidade');
            $table->unsignedBigInteger('id_situacao_doenca');
            $table->timestamps();

            $table->foreign('id_letalidade')->references('id_letalidade')->on('letalidades');
            $table->foreign('id_situacao_doenca')->references('id_situacao_doenca')->on('situacao_doencas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doencas');
    }
};
