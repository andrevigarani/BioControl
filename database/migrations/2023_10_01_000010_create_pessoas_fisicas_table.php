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
        Schema::create('pessoas_fisicas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->char('cpf',11)->unique();
            $table->date('nascimento');
            $table->string('fone')->nullable();
            $table->string('numero_endereco')->nullable();
            $table->string('complemento')->nullable();
            $table->unsignedBigInteger('id_rua')->nullable();

            $table->timestamps();

            $table->foreign('id_rua')->references('id')->on('ruas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas_fisicas');
    }
};
