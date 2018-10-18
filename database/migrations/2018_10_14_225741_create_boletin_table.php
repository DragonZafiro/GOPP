<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletinTable extends Migration
{
    public function up()
    {
        Schema::create('boletin', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id');
            $table->foreign('business_id')->references('id')->on('business');
            $table->string('enlace');
            $table->string('titulo');
            $table->string('contenido');
            $table->string('plantilla');
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
        });
    }
    public function down()
    {
        Schema::dropIfExists('boletin');
    }
}
