<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas', function(Blueprint $table){
            $table->increments('idreceta',15);
            $table->string('fecha',12);
            $table->string('paciente',120);
            $table->string('medico',120);
            $table->string('tipomedicamento',50);
            $table->string('medicamento',100);
            $table->string('informacion',50);
            $table->string('dosis',100);
            $table->string('periodo',100);
            $table->string('observacion',255);
            $table->string('preciocon',255);
            $table->string('costoadicional',30);
            $table->string('preciomed',30);
            $table->string('totalpagar',30);
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
        Schema::drop('recetas');
    }
}
