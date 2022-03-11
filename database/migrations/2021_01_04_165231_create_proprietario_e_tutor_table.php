<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprietarioETutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietario_e_tutor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('municipio_id');
            $table->unsignedBigInteger('bairro_id');
            $table->string('nome');
            $table->string('endereco');
            $table->string('referencia')->nullable();
            $table->string('telefone');
            $table->unsignedBigInteger('responsavel_animal_id');
            $table->foreign('responsavel_animal_id')->references('id')->on('responsavel_animal')->onDelete('cascade');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->foreign('bairro_id')->references('id')->on('bairros');
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
        Schema::dropIfExists('proprietario_e_tutor');
    }
}
