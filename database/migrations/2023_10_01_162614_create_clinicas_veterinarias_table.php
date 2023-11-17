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
        Schema::create('clinicas_veterinarias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pessoa_juridica');
            $table->timestamps();

            $table->foreign('id_pessoa_juridica')->references('id')->on('pessoas_juridicas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinica_veterinarias');
    }
};
