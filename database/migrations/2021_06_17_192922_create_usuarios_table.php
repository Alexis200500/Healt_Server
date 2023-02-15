<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('idusuario')->comment('Identificador');
            $table->string('nombre',80)->comment('Nombre del usuario');
            $table->string('apellidos',80)->comment('Apellidos del usuario');
            // $table->string('sexo',80)->comment('Sexo del usuario');
            $table->string('email',50)->unique()->comment('E-mail del usuario');
            $table->string('password',50)->comment('Password del usuario');

            $table->integer('idmun')->unsigned();
            $table->foreign('idmun')->references('idmun')->on('municipios');

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
        Schema::dropIfExists('usuarios');
    }
}
