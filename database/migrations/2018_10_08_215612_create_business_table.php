<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');
            $table->string('nombre')->unique();
            $table->string('direccion');
            $table->string('descripcion');
            $table->string('telefono');
            $table->string('email');
            $table->string('web');
            $table->string('whatsapp')->nullable()->default('NO');
            $table->string('facebook')->nullable()->default('NO');
            $table->string('twitter')->nullable()->default('NO');
            $table->string('instagram')->nullable()->default('NO');
            $table->string('password');
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
        Schema::dropIfExists('business');
    }
}
