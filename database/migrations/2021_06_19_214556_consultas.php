<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Consultas extends Migration
{

    public function up()
    {
      Schema::create('consultas', function(Blueprint $table){
        $table->increments('idconsulta');

        $table->integer('idmedico')->unsigned();
        $table->foreign('idmedico')->references('idmedico')->on('medicos');

        $table->integer('idesp')->unsigned();
        $table->foreign('idesp')->references('idesp')->on('especialidades');

        $table->string('fecha_consulta',20);
        $table->string('hora_consulta',20);
        $table->string('peso',20);
        $table->string('observacion',255);

        $table->integer('idstatus')->unsigned();;
        $table->foreign('idstatus')->references('idstatus')->on('status');


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
        Schema::drop('consultas');
    }
}
