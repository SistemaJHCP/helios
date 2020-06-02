<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Levantamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levantamiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('descripcion',1000);
            $table->unsignedBigInteger('asignacion_id');

            $table->foreign('asignacion_id')->references('id')->on('asignacion');
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
        Schema::dropIfExists('levantamiento');
    }
}
