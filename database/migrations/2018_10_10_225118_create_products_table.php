<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id');
            $table->foreign('business_id')->references('id')->on('business');
            $table->string('tipo');
            $table->string('nombre');
            $table->string('codigo');
            $table->string('descripcion');
            $table->string('marca');
            $table->string('precio');
            $table->string('puntos');
            $table->string('stock');
            $table->string('comentario')->nullable();
            $table->string('status')->default('activo');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
