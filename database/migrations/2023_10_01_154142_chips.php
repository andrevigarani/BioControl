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
        Schema::create('chips', function (Blueprint $table) {
            $table->id('id_chip');
            $table->String('código_chip')->notNullable();
            $table->unsignedBigInteger('id_fabricante_chip');
            $table->timestamps();

            $table->foreign('id_fabricante_chip')->references('id_pessoa_juridica')->on('pessoa_juridicas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chips');
    }
};
