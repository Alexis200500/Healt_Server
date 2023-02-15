<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medicoslogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicoslogin',function(Blueprint $table){
            $table->increments('idmedlogin');
            $table->string('nombre',50);
            $table->string('appaterno',50);
            $table->string('apmaterno',50);
            $table->string('localidad',50);
            $table->string('telefono',10);
            $table->string('sexo',20);

            $table->integer('idesp')->unsigned();
            $table->foreign('idesp')->references('idesp')->on('especialidades');

            $table->string('cedula',20);
            $table->string('horainicio',30);
            $table->string('horafin',30);
            $table->string('foto',100);
            $table->string('email',80);
            $table->string('password',80);

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
        Schema::drop('medicosactual');
    }
}
