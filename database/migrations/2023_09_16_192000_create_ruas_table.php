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
        Schema::create('ruas', function (Blueprint $table) {
            $table->id();
            $table->String('nome')->notNullable();
            $table->unsignedBigInteger('id_bairro');
            $table->timestamps();

            $table->foreign('id_bairro')->references('id')->on('bairros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruas');
    }
};
