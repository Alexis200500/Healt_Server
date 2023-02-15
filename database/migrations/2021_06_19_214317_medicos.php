<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos',function(Blueprint $table){
            $table->increments('idmedico');
            $table->string('nombre',50);
            $table->string('appaterno',50);
            $table->string('apmaterno',50);
            $table->string('sexo',1);
            $table->string('edad',2);
            $table->string('telefono',10);
            $table->string('correo',50);
            $table->string('password',50);
            $table->string('calle',80);
            $table->string('numint',30);
            $table->string('numext',30);

            $table->integer('idmun')->unsigned();
            $table->foreign('idmun')->references('idmun')->on('municipios');

            $table->string('colonia',50);

            $table->integer('idesp')->unsigned();
            $table->foreign('idesp')->references('idesp')->on('especialidades');

            $table->time('hora_entrada');
            $table->time('hora_salida');

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
        Schema::drop('medicos');
    }
}
