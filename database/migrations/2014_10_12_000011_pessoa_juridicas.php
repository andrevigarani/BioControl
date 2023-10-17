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
        Schema::create('pessoa_juridicas', function (Blueprint $table) {
            $table->id('id_pessoa_juridica');
            $table->string('razao_social');
            $table->string('nome_fantasia')->nullable();
            $table->string('cnpj')->unique();
            $table->string('ie');
            $table->string('telefone');
            $table->string('whatsapp')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('id_municipio');
            $table->unsignedBigInteger('id_bairro');
            $table->unsignedBigInteger('id_rua');
            $table->string('numero_endereco')->nullable();
            $table->string('cep');
            $table->string('complemento')->nullable();
            $table->unsignedBigInteger('id_pessoa');
            $table->timestamps();

            $table->foreign('id_rua')->references('id_rua')->on('ruas');
            $table->foreign('id_bairro')->references('id_bairro')->on('bairros');
            $table->foreign('id_municipio')->references('id_municipio')->on('municipios');
            $table->foreign('id_estado')->references('id_estado')->on('estados');
            $table->foreign('id_pessoa')->references('id_pessoa')->on('pessoas');
        });

        Schema::create('pessoa_fisica_pessoa_juridica', function (Blueprint $table) {
            $table->id('id_pessoa_fisica_pessoa_juridica');

            $table->unsignedBigInteger('id_pessoa_fisica');
            $table->foreign('id_pessoa_fisica')->references('id_pessoa_fisica')->on('pessoa_fisicas');

            $table->unsignedBigInteger('id_pessoa_juridica');
            $table->foreign('id_pessoa_juridica')->references('id_pessoa_juridica')->on('pessoa_juridicas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoa_juridicas');
    }
};
