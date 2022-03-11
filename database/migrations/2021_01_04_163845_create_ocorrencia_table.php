<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->boolean('is_diagnostico_clinico');
            $table->boolean('is_primeira_vez_doenca');
            $table->integer('protocolo_inicial');
            $table->date('data_ocorrencia');
            $table->date('data_inicio_tratamento');
            $table->text('outros_protocolos')->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocorrencia');
    }
}
