<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosOcorrenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_ocorrencia', function (Blueprint $table) {
            $table->id();
            $table->string('extensao');
            $table->unsignedBigInteger('ocorrencia_id');
            $table->foreign('ocorrencia_id')->references('id')->on('ocorrencia');
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
        Schema::dropIfExists('fotos_ocorrencia');
    }
}
