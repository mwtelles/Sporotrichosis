<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosRetornoAnimal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_retorno_animal', function (Blueprint $table) {
            $table->id();
            $table->string('imagem');
            $table->unsignedBigInteger('retorno_animal_id');
            $table->foreign('retorno_animal_id')->references('id')->on('retorno_animal')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotos_retorno_animal');
    }
}
