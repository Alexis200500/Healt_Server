<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function(Blueprint $table){
            $table->Increments('idpaciente');
            $table->string('nombre',40);
            $table->string('apellidop',40);
            $table->string('apellidom',40);
            $table->string('sexo',1);
            $table->string('edad',3);
            $table->string('tiposangre');
            $table->string('telefono',10);
            $table->string('correo',40);
            $table->rememberToken();
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
        Schema::drop('pacientes');
    }
}
