<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratorialOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorial_ocorrencias', function (Blueprint $table) {
            $table->id();
            $table->integer('laboratorial');
            $table->unsignedBigInteger('ocorrencia_id');
            $table->foreign('ocorrencia_id')->references('id')->on('ocorrencia')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laboratorial_ocorrencias');
    }
}
