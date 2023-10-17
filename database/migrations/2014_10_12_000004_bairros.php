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
        Schema::create('bairros', function (Blueprint $table) {
            $table->id('id_bairro');
            $table->String('nome_bairro')->notNullable();
            $table->unsignedBigInteger('id_municipio');
            $table->timestamps();

            $table->foreign('id_municipio')->references('id_municipio')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bairros');
    }
};
