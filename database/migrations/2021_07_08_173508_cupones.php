<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cupones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupones', function(Blueprint $table){
            $table->increments('idcupon');

            $table->integer('idpaciente')->unsigned();
            $table->foreign('idpaciente')->references('idpaciente')->on('pacientes');

            $table->string('tipocupon',20);
            $table->string('porcentaje',20);
            $table->string('fecha',20);
            $table->string('fechavencimiento',20);
            $table->string('descripcion',255);
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
        Schema::drop('cupones');
    }
}
