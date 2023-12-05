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
            $table->id();
            $table->String('nome');
            $table->text('descricao');
            $table->timestamps();
        });

        Schema::create('animal_doencas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_animal');
            $table->foreign('id_animal')->references('id')->on('animais');

            $table->unsignedBigInteger('id_doenca');
            $table->foreign('id_doenca')->references('id')->on('doencas');

            $table->date('data_inicio');
            $table->date('data_cura')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doencas');
        Schema::dropIfExists('animal_doencas');
    }
};
