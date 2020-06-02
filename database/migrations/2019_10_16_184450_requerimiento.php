<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Requerimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_producto', 140);
            $table->enum('metrica',['M','PZA','SAL','M2','SERV','M3','ML','KG','Otros']);
            $table->string('cantidad',20);
            $table->unsignedBigInteger('levantamiento_id');

            $table->foreign('levantamiento_id')->references('id')->on('levantamiento');

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
        Schema::dropIfExists('requerimiento');
    }
}
