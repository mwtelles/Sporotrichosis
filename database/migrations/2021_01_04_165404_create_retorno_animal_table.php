<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetornoAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retorno_animal', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->integer('novo_estado');
            $table->unsignedBigInteger('ocorrencia_id');
            $table->foreign('ocorrencia_id')->references('id')->on('ocorrencia')->onDelete('cascade');
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
        Schema::dropIfExists('retorno_animal');
    }
}
