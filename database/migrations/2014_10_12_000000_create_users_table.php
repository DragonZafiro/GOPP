<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('nick')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('fecha_nac');
            $table->string('frase')->nullable();
            $table->string('direccion_num');
            $table->string('direccion_calle');
            $table->string('direccion_delegacion');
            $table->string('direccion_cp');
            $table->string('direccion_estado');
            $table->string('pais');
            $table->string('puntos')->default('0');
            $table->string('loggedAs')->default('vacio');
            $table->string('loggedAsBusiness')->default('vacio');
            $table->boolean('loggedIn')->default(false);
            $table->boolean('usuario')->default(true);
            $table->boolean('empresa')->default(false);
            $table->boolean('afiliador')->default(false);
            $table->boolean('repartidor')->default(false);
            $table->boolean('praemie')->default(false);
            $table->boolean('admin')->default(false);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
