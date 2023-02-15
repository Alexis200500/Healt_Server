<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Status extends Migration
{

    public function up()
    {
      Schema::create('status', function(Blueprint $table){
        $table->increments('idstatus');
        $table->string('nombre',30);

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
        Schema::drop('status');
    }
}
