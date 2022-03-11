<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsavelAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsavel_animal', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_responsavel');
            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animal')->onDelete('cascade');
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
        Schema::dropIfExists('responsavel_animal');
    }
}
