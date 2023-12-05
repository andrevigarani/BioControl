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
        Schema::create('pessoas_juridicas', function (Blueprint $table) {
            $table->id();
            $table->char('cnpj',14)->unique();
            $table->string('razao_social');
            $table->string('nome_fantasia')->nullable();
            $table->string('fone');
            $table->string('email')->unique();
            $table->string('numero_endereco')->nullable();
            $table->string('complemento')->nullable();
            $table->unsignedBigInteger('id_rua');
            $table->unsignedBigInteger('id_pessoa_fisica');
            $table->timestamps();

            $table->foreign('id_rua')->references('id')->on('ruas');
            $table->foreign('id_pessoa_fisica')->references('id')->on('pessoas_fisicas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas_juridicas');
    }
};
